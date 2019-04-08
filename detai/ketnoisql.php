<?php
    function connect(){
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = "detai";
        $conn = mysqli_connect($hostname, $username, $password,$dbname);
        return $conn;
    }
?>