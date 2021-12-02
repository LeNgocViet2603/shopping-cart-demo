<?php
    $host='mysql:host=localhost;dbname=thwebnc';
    $username='root';
    $pass='';
    try {
        $conn= new PDO($host,$username,$pass);

    } catch (PDOException $e) {
        die($e->getMessage());
    }

?>