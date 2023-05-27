<?php
    $is_invalid = false;

    if ($_SERVER["REQUEST_METHOD"]=== "POST") {

        include ("connect.php");

        $sql = sprintf("SELECT * FROM user 
                        WHERE email = '%s' and status='active'", 
                        $conn->real_escape_string($_POST["email"]));

        $result=$conn->query($sql); 

        $user=$result->fetch_assoc();

        if($user){

            if(password_verify($_POST["password"], $user["password_hash"])){

                session_start();

                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];
                
                header("location: index.php");
                exit;
            }
        }

        $is_invalid=true;
    }

?>