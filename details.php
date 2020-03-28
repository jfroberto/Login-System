<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){
    echo "Welcome " .$_SESSION['UserLogin'];
}else {
    echo header ("Location: index.php");
    
}

include_once("connections/connection.php");

$con = connection();

$id = $_GET['ID'];


$sql = "SELECT * FROM studentList WHERE id = '$id'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();


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
    <h2><?php echo $row['firstName'];?> <?php echo $row['lastName'];?></h2>

</body>
</html>