<?php
    include('connect.php');
    if(isset($_GET['remove'])){
        $remove_id=$_GET['remove'];
        $sql="DELETE FROM `user` WHERE id=$remove_id";
        $qry=$conn->query($sql);
        if($qry){
            header('location:vfyuser.php');
        }
        else{
            header('location:vfyuser.php');

        }
    }

?>