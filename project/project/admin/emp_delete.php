<?php
    include('connect.php');
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $sql="DELETE FROM `employees` WHERE empid=$delete_id";
        $qry=$conn->query($sql);
        if($qry){
            header('location:emp_list.php');
        }
        else{
            header('location:emp_list.php');

        }
    }


?>