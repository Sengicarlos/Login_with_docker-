<?php

$name= "localhost";
$uname= "root";
$password = "";

$db_name = "login_db";
$conn = mysqli_connect($name,$uname,$password,$db_name);

if(!$conn){
    echo "connection failed";
}