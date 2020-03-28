<?php

include_once("connections/connection.php");

$con = connection();

$sql = "SELECT * FROM studentList";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){

   // echo "Submitted";
   //sql query of submit
   // get this code in xamp localhost sql

   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $gender = $_POST['gender'];
   
   $sql = "INSERT INTO `studentlist`(`firstName`, `lastName`, `gender`) VALUES ('$firstName','$lastName','$gender')";

   $con->query($sql) or die ($con->error);

   echo header ("Location: index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <form action="" method="post">

        <label for="">First Name</label>
        <input type="text" name = "firstName" id="firstName" >
        <label for="">Last Name</label>
        <input type="text" name = "lastName" id="lastName" >
        <label for="">Gender</label>

        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <input type="submit" name="submit" value="Submit Form">
    
    </form>
    
</body>
</html>