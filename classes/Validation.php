<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validation
 *
 * @author kamil
 */
class Validation {

    private $passed = false,
            $errors = array(),
            $database = null;

    function __construct() {
        $this->database = Database::getInstance();
    }

    //put your code here
    private function validateData() {

        $args = array(
            'name' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[A-ZĄĘŁŃŚĆŹŻÓ-]{1}[a-ząęłńśćźżó-]{1,25}$/']],
            'surname' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[A-ZĄĘŁŃŚĆŹŻÓ-]{1}[a-ząęłńśćźżó-]{1,25}$/']],
            'age' => ['filter' => FILTER_VALIDATE_INT,
                'options' => array('min_range' => 12, 'max_range' => 110)],
            'weight' => ['filter' => FILTER_VALIDATE_INT,
                'options' => array('min_range' => 12, 'max_range' => 300)],
            'height' => ['filter' => FILTER_VALIDATE_INT,
                'options' => array('min_range' => 120, 'max_range' => 300)],
            'password' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{3,}$/']],
            // hasło minimum 3 znaków w tym jedna cyfra, bez polskich znaków
            'email' => ['filter' => FILTER_VALIDATE_EMAIL]
        );
        $dane = filter_input_array(INPUT_POST, $args);

        foreach ($dane as $key => $value) {
            if ($value === false or $value === NULL) {
                $this->errors[] = $key;
            }
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    private function checkIfEmailIsRegistered() {
        //sprawdzamy czy uzytkownik o danym adresie email juz istnieje
        $isEmailRegistered = $this->database->get(('users'), ['email', '=', "{$_POST['email']}"])->getCount();
        if ($isEmailRegistered > 0) {
            $this->errors[] = 'Użytkownik o podanym adresie e-mail już istnieje';
            return false;
        } else {
            return true;
        }
    }

    private function checkIfPasswordsAreIdentical() {
        if ($_POST['password'] === $_POST['password2']) {
            return true;
        } else {
            $this->errors[] = 'Podałeś dwa różne hasła, spróbuj ponownie';
            return false;
        }
    }

    public function isRegisterFormValid() {
        if ($this->validateData() && $this->checkIfEmailIsRegistered() && $this->checkIfPasswordsAreIdentical()) {
            $this->passed = true;
        }
    }

    public function isLoginFormValid() {
        return (null !== (Input::get('username')) && null !== (Input::get('passwd')));
    }

    function getPassed() {
        return $this->passed;
    }

    function getErrors() {
        return $this->errors;
    }

}
