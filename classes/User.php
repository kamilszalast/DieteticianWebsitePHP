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
    private $isLoggedIn;

    function __construct($user = null) {
        $this->database = Database::getInstance();
        $this->sessionName = Config::get('session/session_name');
        //jeżeli nie podamy parametru user
        if (!$user) {
            //sprawdzamy czy sesja istnieje
            if (Session::exists($this->sessionName)) {
                $user = Session::get($this->sessionName);
                if ($this->find($user)) {
                    $this->isLoggedIn = true;
                } else {
                    //wylogowywanie
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
                $this->data = $data->getFirstResult();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $passwd = null) {
        $userByEmail = $this->find($username);
        if ($userByEmail) {
            if ($this->getData()->password === Hash::make($passwd)) {
                //do tablicy $_SESSION do klucza 'user' wstawiamy ID danego usera z bazy danych
                Session::put($this->sessionName, $this->getData()->id);
                return true;
            }
        }
        return false;
    }

    public function getData() {
        return $this->data;
    }

    public function isLoggedIn() {
        return $this->isLoggedIn;
    }

}
