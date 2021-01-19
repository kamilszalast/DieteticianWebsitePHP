<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author kamil
 */
class Database {

    //w poniższej klasie zastosowano wzorzec projektowy Singleton
    //aby połączenie z Bazą Danych odbywało się tylko raz a nie wieloktornie

    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/databaseName'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // używamy słowa kluczowego self, gdyż odwołujemy się do statycznego pola klasy
    //sprawdzamy, czy ustawione jest pole _instance , jeżeli nie to tworzymy nowy obiekt
    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    // funkcja przyjmująca zapytanie sql (ze znakami zapytania) oraz parametry podstawiane pod znaki zapytania
    private function query($sql, $params = array()) {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $i = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    //przypisuje wartości (podane jako tablica parametrów) do znaków zapytania umieszczonychch w zapytaniu SQL
                    $this->_query->bindValue($i, $param);
                    $i++;
                }
            }
            //jeżeli zapytanie sql nie ma błędu
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount(); // ilośc wierszy zwróconych rpzez zapytanie SQL
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    public function getError() {
        return $this->_error;
    }

    // funkcja zwracająca obiekt tej klasy, jednocześnie pilnując, by podane zostały 3 parametry wyszukiwania
    //np WHERE age = 24
    private function action($action, $table, $conditions = array()) {
        if (count($conditions) === 3) {
            $operators = array('=', '<', '>', '=<', '=>', '!=');
            $field = $conditions[0];
            $operator = $conditions[1];
            $value = $conditions[2];

            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                if (!$this->query($sql, [$value])->getError()) {
                    return $this;
                }
            }
        }
        return false;
    }

    //funkcja wykorzystująca funkcje action do pobierania informacji z bazy danych
    public function get($table, $conditions) {
        return $this->action('SELECT *', $table, $conditions);
    }

    //funkcja wykorzystujaca funkcje action do usuwania rekordów
    //tutaj nie usuwa nam z tabeli logged_in_users
    public function delete($table, $conditions = array()) {
        //tutaj wstawiamy znaki zapytania aby potem w funkcji execute uzupełnić je tabelą conditions
        echo $sql = "DELETE FROM {$table} WHERE " . '? ' . '? ' . '?';
        if ($this->_pdo->prepare($sql)->execute($conditions)) {
            return true;
        }
        return false;
    }

    //funkcja wstawiająca wiersz do bazy danych
    public function insert($table, $fields = array()) {
        $keys = array_keys($fields);
        $values = array_values($fields);
        $questionMarks = '';
        $i = 1;
        // utworzenie łańcucha znaków ze znakami zapytania i przecinkami
        foreach ($fields as $field) {
            $questionMarks .= '?';
            if ($i < count($fields)) {
                $questionMarks .= ', ';
            }
            $i++;
        }

        $sql = "INSERT INTO `{$table}` (`" . implode("`, `", $keys) . "`) VALUES ({$questionMarks})";
        if ($this->_pdo->prepare($sql)->execute($values)) {
            return true;
        }

        return false;
    }

    //funkcja edytująca rekord o zadanym id, edytowane są pola zawarte w parametrze fields
    public function update($table, $recordID, $fields = array()) {
        $i = 1;
        $setParams = '';
        $values = array_values($fields);
        foreach ($fields as $key => $value) {
            $setParams .= ($key . ' = ' . '?');
            if ($i < count($fields)) {
                $setParams .= ', ';
            }
            $i++;
        }

        $sql = "UPDATE {$table} SET {$setParams} WHERE id = {$recordID}";

        if ($this->_pdo->prepare($sql)->execute($values)) {
            return true;
        }
        return false;
    }

    //funkcja zwracająca ilość wierszy z zapytania SQL
    public function getCount() {
        return $this->_count;
    }

    //getter do wyników w postaci tablicy obiektow zapytania SQL
    public function getResults() {
        return $this->_results;
    }

    // getter do pierwszego wiersza wyników zapytania SQL
    public function getFirstResult() {
        return $this->getResults()[0];
    }

}
