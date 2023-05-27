<?php
include("connect.php");
if (isset($_POST["create"])) {
    $name= $_POST["emp_name"];
    $email= $_POST["email"];
    $mob= $_POST["mob_number"];
    $dob= $_POST["emp_dob"];
    $section= $_POST["c_section"];
    $desk_no= $_POST["desk_no"];
    $sql="INSERT INTO employees (empname,email,cno,dob,section,deskno) VALUES('$name','$email','$mob','$dob','$section','$desk_no')";
    if ($conn->query($sql)) {
        header('location:emp_list.php');
    } else {
        die("Something went worng!");
    }
    
}
?>