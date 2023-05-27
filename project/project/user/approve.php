<?php
    include('connect.php');
    if(isset($_GET['approve'])){
        $approve_id=$_GET['approve'];
        $sql="UPDATE `problemlist` SET `status` = 'resolve' WHERE `id` = $approve_id";
        $qry=$conn->query($sql);
        if($qry){
            header('location:index.php');
        }
        else{
            header('location:index.php');

        }
    }
?>
