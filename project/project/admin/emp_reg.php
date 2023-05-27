<?php
session_start();
session_reset();
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
    <title>Employ Registration</title>
    <style>
        main{
            margin-left: 35%;
        }
        .emp{
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
                    <li><a href="" class="emp">
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

        <main>
            <div class="container ">
                <header class="d-flex justify-content-between my-4 w-50">
                    
                    <h1 id="top-title">Add Empolyee: </h1>
                    <div>
                        <a href="emp_list.php" class="btn btn-primary w-100">Back</a>
                    </div>
                </header>
                <form action="process.php" method="post">
                    <div class="form-element my-4 w-50">
                        <input type="text" class="form-control" name="emp_name" placeholder="Name" required>
                    </div>
                    <div class="form-element my-4 w-50">
                        <input type="email" class="form-control" name="email" placeholder="Email"required>
                    </div>
                    <div class="form-element my-4 w-50">
                        <input type="number" class="form-control" name="mob_number" placeholder="+91 xxxxxxxxxx"required>
                    </div>
                    
                    <div class="form-element my-4 w-50">
                        <input type="date" class="form-control" name="emp_dob">
                    </div>
                    <div class="form-element my-4 w-50">
                        <select name="c_section" class="form-control" id=""required>
                            <option value="">select</option>
                            <option value="development">Development</option>
                            <option value="manegment">Manegment</option>
                            <option value="hr">HR</option>
                            <option value="accounting">Accounting</option>
                        </select>
                    </div>
                    <div class="form-element my-4 w-50">
                        <input type="number" class="form-control" name="desk_no" placeholder="Desk Number"required>
                    </div>
                    <div class="form-element my-4 ">
                        <input type="reset" class="btn btn-primary mx-2 " value="Reset">
                
                        <input type="submit" class="btn btn-success mx-2" name="create" value="Create">
                    </div>
                </form>
            </div>
        </main>
    
</body>
</html>