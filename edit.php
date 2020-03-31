<?php

include_once("connections/connection.php");
$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM studentList WHERE id = '$id'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){

   // echo "Submitted";
   //sql query of submit
   // get this code in xamp localhost sql

   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $gender = $_POST['gender'];
   
   $sql = "UPDATE studentlist SET firstName='$firstName', lastName='$lastName', gender='$gender' WHERE id='$id'";

   $con->query($sql) or die ($con->error);

   echo header ("Location: details.php?ID=".$id);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="design/style.css">
</head>
<body>

    <form action="" method="post">

        <label for="">First Name</label>
        <input type="text" name = "firstName" id="firstName" value="<?php echo $row['firstName'];?>" >
        <label for="">Last Name</label>
        <input type="text" name = "lastName" id="lastName" value="<?php echo $row['lastName'];?>" >
        <label for="">Gender</label>

        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['gender'] == "Male")?'selected':'';?>>Male</option>
            <option value="Female" <?php echo ($row['gender']== "Female")?'selected':'';?>>Female</option>
        </select>

        <input type="submit" name="submit" value="Update">
    
    </form>
    
</body>
</html>