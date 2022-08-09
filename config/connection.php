<?php
     function connect(){
        $conn = mysqli_connect($servername="localhost", $username="root", $password="", $dbname="income_expense manager");
        if(!$conn) die("connection failed");
        return $conn;
    }
?>