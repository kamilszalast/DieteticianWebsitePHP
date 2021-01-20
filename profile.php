<?php

include_once 'core/init.php';

function delete($table, $conditions = array()) {
    //tutaj wstawiamy znaki zapytania aby potem w funkcji execute uzupełnić je tabelą conditions
    $db = Database::getInstance();
    $sql = 'DELETE FROM ' . $table . ' WHERE user_id = 17';
    if ($db->get_pdo()->exec($sql)) {
        echo $sql;
        return true;
    }
    return false;
}

delete('logged_in_users', array('user_id', '=', 17));
?>