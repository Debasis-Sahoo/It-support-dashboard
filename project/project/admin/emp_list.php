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
    <title>Employee List</title>
    <style>
        main{
            margin-left: 7%;
        }
        .logo .span{
            margin-top: 25px;
        }
        .emp{
            background-color: #2f4661;
        }
    </style>
</head>
<body>
    <nav>
        <div class="containe">
            <ul>
                <li>
                    <<div class="logo">
                            <img src="../logo.png" alt="logo" >
                            <div class="nav-item span">Doc Sof</div>
                    </div>
                </li>
                <li><a href="home.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="profile.php" >
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
    <main class="cent">
        <div class="container">
            <header class="d-flex justify-content-between my-4">
                <h1>
                    Employee List
                </h1>
                <div>
                    <a href="emp_reg.php" class="btn btn-primary w-100">Add</a>
                </div>
            </header>
            </table>
                    <?php
                        include("connect.php");
                        $sql= "SELECT * FROM employees";
                        $result=$conn->query($sql);
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered'>
                            <thead>
                                <tr class='table-active'>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>contact No</th>
                                    <th>Section</th>
                                    <th>Desk No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $counter=0;
                            while ( $row = $result -> fetch_assoc()) {
                                $counter++;
                                ?>
                                
                                        <tr class='table-light'>
                                            <td><?=$counter;?></td>
                                            <td><?=$row["empname"];?></td>
                                            <td><?=$row["email"];?></td>
                                            <td><?=$row["cno"];?></td>
                                            <td><?=$row["section"];?></td>
                                            <td><?=$row["deskno"];?></td>
                                            <td class="d-flex">
                                                <a href="emp_edit.php?empid=<?php echo $row["empid"];?>" class="btn btn-warning w-50">Edit</a>
                                                <span>&nbsp;&nbsp;</span>
                                                <a href="emp_delete.php?delete=<?=$row['empid'];?>" class="btn btn-danger w-50" onclick="return confirm('Are you sure you want to delete')">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                            }
                        }else {
                        ?>
                            <div style="color: red;text-align:center;background-color:rgb(255, 203, 203);margin:0 20vw">
                                <h2>No Data Found</h2>
                            </div>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>