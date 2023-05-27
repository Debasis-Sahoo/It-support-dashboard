<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conpwd = $_POST["conpwd"];
    
    $namelen=strlen($name);
    if ($namelen < 3) 
    {

        die("Minimum 3 character required");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        
        die("Valid email is reqired");
    }
    
    $pwdlen=strlen($password);
    
    if ($pwdlen < 6)
    {
        
        die("Password must be greter than 6 charecter");
    }
    
    if(!preg_match("/[a-z]/i", $password))
    {
        die("Password must contain at least one letter");
    }
    
    if(!preg_match("/[0-9]/i", $password))
    {
        
        die("Password must contain at least one number");
        
    }
    
    
    if ($password !== $conpwd)
    {
        
        die("Password must match");
        
    }
    
    $password_hash=password_hash($password, PASSWORD_DEFAULT);

    include ('connect.php');
    
    
    $sql = "INSERT INTO admindata (name, email, password_hash) 
            VALUES (?,?,?)";

    $stmt = $conn->stmt_init();

    if( ! $stmt->prepare($sql))
    {
    
        die("SQL error" . $conn->error);
    
    }
    $stmt->bind_param("sss",  $name, $email, $password_hash);

    if($stmt->execute())
    {

        header("location:signup-success.php");
        exit;

    }else{
        
        die("Some thing went wrong");
    }
    
    
    ?>