<?php

    $title = $_POST["title"];
    $description = $_POST["description"];
    $deskno = $_POST["deskno"];
    $empcode = $_POST["empcode"];    
    $techcian = $_POST["select"];    
    $title_ln=strlen($title);
    if ($title_ln < 6) 
    {

        die("Title: Minimum 6 character required");
    }
    $description_ln=strlen($description);
    if ($description_ln < 10) 
    {
        
        die("Description: Minimum 10 character required");
    }
    
    $deskno_ln = strlen($deskno);
    
    if($deskno_ln != 6)
    {
        die("Desk Number must be 6 digit");
    }  
    $codelen = strlen($empcode);
    
    if($codelen != 6)
    {
        die("Employee code must be 6 digit");
    }  
     include ('connect.php');
        
    $sql = "INSERT INTO problemlist (title, description, deskno, empcode, forward) 
            VALUES (?,?,?,?,?)";

    $stmt = $conn->stmt_init();

    if( ! $stmt->prepare($sql))
    {
    
        die("SQL error" . $conn->error);
    
    }
    $stmt->bind_param("sssss",  $title, $description, $deskno, $empcode,$techcian);

    if($stmt->execute())
    {

        header("location:home.php");
        exit;

    }else{
        
        die("Some thing went wrong");
    }
    
    
    ?>