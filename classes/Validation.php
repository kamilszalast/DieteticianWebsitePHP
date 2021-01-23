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
            $translatedErrors = array(),
            $database = null;
    private static $registrationFilters = array(
        'name' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-ZĄĘŁŃŚĆŹŻÓ-]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'surname' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-ZĄĘŁŃŚĆŹŻÓ-]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'age' => ['filter' => FILTER_VALIDATE_INT,
            'options' => array('min_range' => 12, 'max_range' => 110)],
        'weight' => ['filter' => FILTER_VALIDATE_FLOAT,
            'options' => array('min_range' => 12, 'max_range' => 300)],
        'height' => ['filter' => FILTER_VALIDATE_FLOAT,
            'options' => array('min_range' => 120, 'max_range' => 300)],
        'password' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^.{3,}$/']],
        // hasło minimum 3 znaki dowolne
        'email' => ['filter' => FILTER_VALIDATE_EMAIL]
    );
    private static $updateAccountFilters = array(
        'name' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-ZĄĘŁŃŚĆŹŻÓ-]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'surname' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-ZĄĘŁŃŚĆŹŻÓ-]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'age' => ['filter' => FILTER_VALIDATE_INT,
            'options' => array('min_range' => 12, 'max_range' => 110)],
        'weight' => ['filter' => FILTER_VALIDATE_FLOAT,
            'options' => array('min_range' => 12, 'max_range' => 300)],
        'height' => ['filter' => FILTER_VALIDATE_FLOAT,
            'options' => array('min_range' => 120, 'max_range' => 300)]
    );
    private static $updatePasswordFilters = array(
        'password' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^.{3,}$/']]
    );

    function __construct() {
        $this->database = Database::getInstance();
    }

//put your code here
    private function validateData($args) {
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
        if (Input::get('password') === Input::get('password2')) {
            $this->passed = true;
            return true;
        } else {
            $this->errors[] = 'Podałeś dwa różne hasła, spróbuj ponownie';
            return false;
        }
    }

    public function isRegisterFormValid() {
        if ($this->validateData(self::$registrationFilters) && $this->checkIfEmailIsRegistered() && $this->checkIfPasswordsAreIdentical()) {
            $this->passed = true;
        }
    }

    public function isUpdateFormValid() {
        if ($this->validateData(self::$updateAccountFilters)) {
            $this->passed = true;
        }
    }

    public function isPasswordUpdateFormValid() {
        if ($this->validateData(self::$updatePasswordFilters) && $this->checkIfPasswordsAreIdentical()) {
            $this->passed = true;
        }
    }

    public function isLoginFormValid() {
        return (null !== (Input::get('username')) && null !== (Input::get('passwd')));
    }

    function getPassed() {
        return $this->passed;
    }

    public function translateErrors() {
        foreach ($this->errors as &$error) {
            switch ($error) {
                case 'name':$error = 'Błędne imie (powinno zaczynać się z dużej liitery)';
                    break;
                case 'surname':$error = 'Błędne nazwisko (powinno zaczynać się z dużej liitery)';
                    break;
                case 'age':$error = 'Błędny wiek (zakres między 12 a 110)';
                    break;
                case 'weight':$error = 'Błędna waga (zakres między 12 kg a 300 kg)';
                    break;
                case 'height':$error = 'Błędny wzrost (zakres między 120 cm a 300 cm)';
                    break;
                case 'password':$error = 'Błędne hasło (powinno zawierać minimum 3 znaki)';
                    break;
                case 'email':$error = 'Błędny email (przykład: kamil12345678@gmail.com)';
                    break;
                default:
                    break;
            }
        }
        return $this;
    }

    function getErrors() {
        return $this->errors;
    }

    public function printErrors() {
        echo '<h5 class="mt-3" style="color:red;">Niepoprawne dane: </h5>';
        foreach ($this->errors as $error) {
            echo $error . '<br>';
        }
    }

}
