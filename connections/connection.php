<?php

function connection(){
    
    $host ="localhost";
    $username ="root";
    $password = "12345";
    $database = "studentSystem";

    $con = new mysqli($host,$username,$password,$database);

// OOP Format needed in PHP 7
    if($con -> connect_error){
    echo $con->connect_error;
//}else{
//    echo "connected";
    }else {

    return $con;
    }

}
?>