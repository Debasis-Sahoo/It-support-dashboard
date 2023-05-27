<?PHP
    
   
    include ("connect.php");
    $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `admindata` WHERE id= $user_id";
        $result=$conn->query($sql); 
        
        $user=$result->fetch_assoc();


        
?>