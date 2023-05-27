<?php include('connect.php');

include ("connect.php");

if (isset($_SESSION["user_id"])) {


  
}
else{
    
    header("location:signin.php");
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deskno = $_POST['deskno'];
    $empcode = $_POST['empcode'];
    

    $sql = "UPDATE `problemlist` SET title='$title' ,description ='$description', deskno='$deskno', empcode ='$empcode' WHERE id = $id";
    $res = $conn->query($sql);
    if ($res) {
        header('location:home.php');
    }
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
    <title>Edit</title>
    <style>
        main{
            margin-left: 35%;
        }
        .home{
            background-color: #2f4661;
        }
    </style>
    
</head>
<body >
    
        <nav>
            <div class="containe">
                <ul>
                    <li>
                        <div class="logo">
                            <img src="../logo.png" alt="logo" >
                            <div class="nav-item span">Doc Sof</div>
                        </div>
                    </li>
                    <li><a href="home.php" class="home">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                    <li><a href="profile.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a></li>
                    <li><a href="emp_list.php">
                    <i class="fas fa-solid fa-users"></i>
                    <span class="nav-item">Employees</span>
                    </a></li>
                    <li><a href="vfyuser.php">
                        <i class="fas fa-solid fa-wrench"></i>
                        <span class="nav-item">Technician</span>
                    </a></li>
                    <li><a href="signout.php">
                        <i class="fas fa-solid fa-right-from-bracket" ></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
                </ul>
            </div>
        </nav>

        <main >
            <div class="container ">
                <header class="d-flex justify-content-between my-4 w-50">
                    
                    <h1 id="top-title">Adding Problems </h1>
                </header>


            <?php
                include("connect.php");
                if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $sql = "SELECT *FROM problemlist WHERE id=$id";
                $result = $conn -> query($sql);
                $row = $result -> fetch_assoc();

            ?>
                <form  method="post">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <div class="form-element my-4 w-50">
                        <input type="text" class="form-control" name="title" value="<?= $row['title']?>" required>
                    </div>
                    <div class="form-element my-4 w-50">
                        <textarea name="description" id="" cols="30" rows="5" class="form-control" value=""><?= $row['description']?></textarea>
                    </div>
                    <div class="form-element my-4 w-50">
                        <input type="text" class="form-control" name="deskno"  value="<?= $row['deskno']?>" required>
                    </div>
                    
                    <div class="form-element my-4 w-50">
                        <input type="text" class="form-control" name="empcode" value="<?= $row['empcode']?>" required>
                    </div>
                    
                    <div class="form-element my-4 ">
                        <input type="reset" class="btn btn-primary mx-2 " value="Reset">
                
                        <input type="submit" class="btn btn-success mx-2" name="update" value="Update">
                    </div>
                </form>
                <?php
                }
                ?>
            </div>
        </main>
           
    
</body>
</html>