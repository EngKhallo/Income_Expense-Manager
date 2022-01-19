<?php
     function connect(){
        $conn = mysqli_connect($servername="localhost", $username="root", $password="", $dbname="daily_income_expense_manager");
        if(!$conn) die("connection failed");
        return $conn;
    }
?>