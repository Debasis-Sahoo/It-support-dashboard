<?php
    include('connect.php');
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $sql="DELETE FROM `user` WHERE id=$delete_id";
        $qry=$conn->query($sql);
        if($qry){
            header('location:vfyuser.php');
        }
        else{
            header('location:vfyuser.php');

        }
    }


?>