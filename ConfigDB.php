<?php

$host = "localhost";
$user = "root";
$password = "iloveapple80";
$database = "hr system";
$connect_to_DB = mysqli_connect($host,$user,$password,$database); //Build-in Function
//if($connect_to_DB) echo "Done conneting to DataBase";
//else echo "Failed conneting to DataBase";

session_start();

function print_message($text){
    echo "<div style='text-align:center;' class = 'alert alert-primary' role = 'alert' >". $text . "</div>";
    
    }

?>
