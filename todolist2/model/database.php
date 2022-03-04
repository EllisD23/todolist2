<?php
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $username = 'mgs_user';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../todolist2/view/databaseerror.php');
        exit();
    }
?>