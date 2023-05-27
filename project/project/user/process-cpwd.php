<?PHP
    $is_invalid = false;
    
    session_start();
    
    session_regenerate_id();
    if ($_SERVER["REQUEST_METHOD"]=== "POST") {  
        include ("connect.php");

        $newpassword= $_POST["newpassword"];
        $cpwd= $_POST["cpwd"];
        $password= $_POST["password"];

        
    $user_id = $_SESSION['user_id'];
    
        $sql = "SELECT * FROM `user` WHERE id= $user_id";
        $result=$conn->query($sql); 
        
        $user=$result->fetch_assoc();
        

        if($user){                
            if(password_verify( $password, $user["password_hash"])){

                $password_hash=password_hash($newpassword, PASSWORD_DEFAULT);

               $nsql = "UPDATE `admindata` SET `password_hash` = '$password_hash' WHERE `id` = $user_id";
               $result=$conn->query($nsql); 
                header("location: profile.php");
                exit;
            }
        }
      
        $is_invalid=true;
    }
        
?>