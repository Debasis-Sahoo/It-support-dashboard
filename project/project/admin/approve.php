<?php
    include('connect.php');
    if(isset($_GET['approve'])){
        $approve_id=$_GET['approve'];
        $sql="UPDATE `user` SET `status` = 'active' WHERE `user`.`id` = $approve_id";
        $qry=$conn->query($sql);
        if($qry){
            header('location:vfyuser.php');
        }
        else{
            header('location:vfyuser.php');

        }
    }
?>
