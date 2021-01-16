<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// funkcja zabezpieczająca, zwracająca łańcuch znaków bez znaków charakterystycznych dla HTML'a
function escape($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
