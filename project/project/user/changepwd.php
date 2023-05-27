<?PHP
include("process-cpwd.php");
include ("connect.php");

if (isset($_SESSION["user_id"])) {


  
}
else{
    
    header("location:signin.php");
}

?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2832a52e0e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/navstyle.css">
    
    <title>Profile</title>
    <style>
        main {
            margin-left: 7%;
        }

        .logo .span {
            margin-top: 25px;
        }

        .profile {
            background-color: #2f4661;
        }
    </style>
</head>

<body>
    <nav>
        <div class="containe">
            <ul>
                <li>
                    <div class="logo">
                            <img src="../logo.png" alt="logo" >
                            <div class="nav-item span">Doc Sof</div>
                    </div>
                </li>
                <li><a href="index.php" >
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="profile.php" class="home">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a></li>
                
                <li><a href="emplist.php">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">List</span>
                </a></li>
                
                <li><a href="signout.php">
                    <i class="fas fa-solid fa-right-from-bracket" ></i>
                    <span class="nav-item">Log out</span>
                </a></li>
            </ul>
        </div>
    </nav>
    <main class="cent">
        <div class="container">
            <header class="d-flex justify-content-center my-4">
                <h1>
                    User Profile
                </h1>
            </header>
            
            <div class="d-flex justify-content-center my-4">
                <form method="post">
                    <?php if ($is_invalid) { ?>
                        <em>Invalid Password</em>
                    <?php } ?>
                    <div class="form-element my-4 w-50">
                        <input type="password" class="input-sec" placeholder="Old Password" name="password" required autocomplete="off">
                    </div>
                    
                    <div class="form-element my-4 w-50">
                        <input type="password" class="input-sec" placeholder="New Password" name="newpassword" required autocomplete="off">
                    </div>
                    
                    <div class="form-element my-4 w-50">
                        <input type="password" class="input-sec" placeholder="Confirm Password" name="cpwd" required autocomplete="off">
                    </div>
                    <div class="form-element my-4 ">
                        <input type="reset" class="btn btn-primary mx-2 " value="Reset">
                
                        <input type="submit" class="btn btn-success mx-2" name="create" value="Change">
                    </div>
            </form>
        </div>
        </div>
    </main>
</body>

</html>
