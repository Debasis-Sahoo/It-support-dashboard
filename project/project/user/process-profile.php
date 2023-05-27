<?PHP
    
    session_start();

    session_regenerate_id();
    include ("connect.php");
    $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `user` WHERE id= $user_id";
        $result=$conn->query($sql); 
         
        $user=$result->fetch_assoc();


        
?>