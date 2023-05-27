<?php
    include('connect.php');
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $sql="DELETE FROM `problemlist` WHERE id=$delete_id";
        $qry=$conn->query($sql);
        if($qry){
            header('location:home.php');
        }
        else{
            header('location:home.php');

        }
    }


?>