<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author kamil
 */
class User {

    private $database;
    private $data;
    private $sessionName;
    private $cookieName;
    private $isLoggedIn;

    function __construct($user = null) {
        $this->database = Database::getInstance();
        $this->sessionName = Config::get('session/session_name');
        $this->cookieName = Config::get('remember/cookie_name');
        //jeżeli nie podamy parametru user
        if (!$user) {
            //sprawdzamy czy sesja istnieje
            if (Session::exists($this->sessionName)) {
                $user = Session::get($this->sessionName);
                if ($this->find($user)) {
                    $this->isLoggedIn = true;
                } else {
                    //tutaj nie musi być nic
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function create($fields = array()) {
        if (!$this->database->insert('users', $fields)) {
            throw new Exception('Nie udało się utworzyć konta');
        }
    }

//sprawdzamy czy istnieje użytkownik o adresie email zadanym jako parametr
    public function find($userID = null) {
        if ($userID) {
            $field = (is_numeric($userID)) ? 'id' : 'email';
            $data = $this->database->get('users', array($field, '=', $userID));
            if ($data->getCount()) {
                //tutaj do zmiennej dane wstawiamy dane z jednego wiesza, w którym email zgadza się z wpisanym w formularzu
                $this->data = $data->getFirstResult();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $passwd = null, $remember = false) {
        if (!$username && !$passwd && $this->exists()) {
            Session::put($this->sessionName, $this->getData()->id);
        } else {
            $userByEmail = $this->find($username);
            if ($userByEmail) {
                if ($this->getData()->password === Hash::make($passwd)) {
                    //do tablicy $_SESSION do klucza 'user' wstawiamy ID danego usera z bazy danych
                    Session::put($this->sessionName, $this->getData()->id);
                    //jezeli uzytkownik ma byc zapamietany
                    if ($remember) {
                        //generujemy dowolny hash metodą statyczną klasy hash
                        $hash = Hash::unique();
                        //z tabeli logged_in_users bierzemy rekordy, w których pole user_id = (id usera ktory sie loguje)
                        $hashCheck = $this->database->get('logged_in_users', array('user_id', '=', $this->getData()->id));
                        //jeżeli nie istnieje żaden rekord z zapytania powyżej,czyli użytkownik nie jest już zapamiętany w tabeli logged_in_users
                        if (!$hashCheck->getCount()) {
                            //wstawiamy rekord do tabeli logged_in_users z id tego uzytkownika
                            //oraz z wygenerowanym hashem
                            $this->database->insert('logged_in_users', array(
                                'user_id' => $this->getData()->id,
                                'hash' => $hash
                            ));
                        } else {
                            $hash = $hashCheck->getFirstResult()->hash;
                        }
                        //ustawiamy w tabeli $_Cookies dla klucza 'hash' wartość zmiennej $hash ustawioną powyżej, a długość życia ciasteczka jako 604800 czyli tydzien w sekundach
                        Cookie::put($this->cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }

                    return true;
                }
            }
        }
        return false;
    }

    //sprawdzanie czy obiekt posiada dane pobrane z tablicy users
    private function exists() {
        return (!empty($this->getData())) ? true : false;
    }

//to sie nie wykonuje dobrze, nie usuwa rekordu
    public function logout() {
        $userID = $this->getData()->id;
        $this->database->delete('logged_in_users', array('user_id', '=', $userID));
        Session::delete($this->sessionName);
        Cookie::delete($this->cookieName);
    }

    public function updateData($fields = array()) {
        $this->database->update('users', $this->getData()->id, $fields);
    }

    public function deleteAccount() {
        $this->database->delete('users', array('id', '=', $this->getData()->id));
        $this->database->delete('logged_in_users', array('user_id', '=', $this->getData()->id));
    }

    public function getData() {
        return $this->data;
    }

    public function isLoggedIn() {
        return $this->isLoggedIn;
    }

    public function isAdmin() {
        return ($this->getData()->groupType == 1) ? true : false;
    }

}
