<?php

session_start();
session_reset();
include ("connect.php");

if (isset($_SESSION["user_id"])) {


    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
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
    <title>Home</title>
    <style>
        main{
            margin-left: 7%;
        }
        .logo .span{
            margin-top: 10px;
        }
        .home{
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
                <li><a href="" class="home">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="profile.php">
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
            <header class="d-flex justify-content-between my-4">
                <h2>
                    Problem List
                </h2>
                
            </header>
            </table>
                    <?php
                        include ("connect.php");
                        $sql= "SELECT * FROM problemlist WHERE status='pending' and forward='".$_SESSION['user_id']."'" ;
                        $result=$conn->query($sql);
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered'>
                            <thead>
                                <tr class='table-active'>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Discription</th>
                                    <th>Desk Number</th>
                                    <th>Employee Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $counter=0;
                            while ($row=$result->fetch_assoc()) {
                                $counter++;
                                ?>
                                
                                        <tr class='table-light'>
                                            <td><?=$counter;?></td>
                                            <td><?=$row["title"];?></td>
                                            <td><?=$row["description"];?></td>
                                            <td><?=$row["deskno"];?></td>
                                            <td><?=$row["empcode"];?></td>
                                
                                            <td class="d-flex">
                                                 <a href="approve.php?approve=<?= $row['id'];?>"
                                                 class="btn btn-danger w-100" onclick="return confirm('Are you sure the problem has resolved?')">Pending</a>
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
            <div class="container">
            <header class="d-flex justify-content-between my-4">
                <h1>
                    Resolved List
                </h1>
                
            </header>
            </table>
                    <?php
                       
                       $sql= "SELECT * FROM problemlist WHERE status='resolve' and forward='".$_SESSION['user_id']."'" ;
                        $result=$conn->query($sql);
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered'>
                            <thead>
                                <tr class='table-active'>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Discription</th>
                                    <th>Desk Number</th>
                                    <th>Employee Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $counter=0;
                            while ($row=$result->fetch_assoc()) {
                                $counter++;
                                ?>
                                
                                            <tr class='table-light'>
                                            <td><?=$counter;?></td>
                                            <td><?=$row["title"];?></td>
                                            <td><?=$row["description"];?></td>
                                            <td><?=$row["deskno"];?></td>
                                            <td><?=$row["empcode"];?></td>
                                
                                            <td class="d-flex">
                                                <button class="btn btn-success w-100" >Resolved</button>
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