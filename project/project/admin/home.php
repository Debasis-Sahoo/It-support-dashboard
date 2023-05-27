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
    <title>Home</title>
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
                    <li><a href="" class="home">
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
                <form action="process-pro.php" method="post">
                    <div class="form-element my-4 w-50">
                        <input type="text" class="form-control" name="title" placeholder="Title" required>
                    </div>
                    <div class="form-element my-4 w-50">
                        <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Discription"></textarea>
                    </div>
                    <div class="form-element my-4 w-50">
                        <input type="text" class="form-control" name="deskno" placeholder="Desk Number"required>
                    </div>
                    
                    <div class="form-element my-4 w-50">
                        <input type="text" class="form-control" name="empcode" placeholder="Employee Code"required>
                    </div>
                    <div class="form-element my-4 w-50">
                        
                        <select name="select" id=""  class="form-control">
                            <option value="">Select Technician</option>
                            <?php
                             $qry="SELECT * FROM user where status ='active'" ;
                             $rse=$conn->query($qry);
                             foreach($rse as $var){
                                ?>
                                <option value="<?= $var["id"];?>"><?= $var["name"];?></option>
                                <?php 
                             }
                            
                            ?>
                        </select>
                        
                    </div>
                    
                    <div class="form-element my-4 ">
                        <input type="reset" class="btn btn-primary mx-2 " value="Reset">
                
                        <input type="submit" class="btn btn-success mx-2" name="create" value="Create">
                    </div>
                </form>
            </div>
        </main>
            <div class="container">
            <header class="d-flex justify-content-between my-4">
                <h2>
                    Problem List
                </h2>
                
            </header>
            </table>
                    <?php
                        $sql= "SELECT problemlist.*, user.name FROM problemlist INNER JOIN user ON user.id = problemlist.forward " ;
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
                                    <th>Forward To</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $counter=0;
                            // var_dump($result);
                            // exit;
                            while ( $row = $result -> fetch_assoc()) {
                                
                                $counter++;
                                ?>
                                
                                
                                        <tr class='table-light'>
                                            <td><?=$counter;?></td>
                                            <td><?=$row["title"];?></td>
                                            <td><?=$row["description"];?></td>
                                            <td><?=$row["deskno"];?></td>
                                            <td><?=$row["empcode"];?></td>
                                            <td><?=$row["name"];?></td>
                                            <td><?php
                                            if($row["status"] == 'pending'){ ?>
                                            <p class="badge badge-danger">Pending</p>
                                           <?php } else{ ?>
                                            <p class="badge badge-success">Resolved</p>
                                          <?php }
                                            ?></td>
                                
                                            <td class="d-flex">
                                                <a href="pro_edit.php?id=<?php echo $row["id"];?>" class="btn btn-warning w-50">Edit</a>
                                                <span>&nbsp;&nbsp;</span>
                                                <a href="pro_delete.php?delete=<?=$row['id'];?>" class="btn btn-danger w-50" onclick="return confirm('Are you sure you want to delete')">Delete</a>
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
    
</body>
</html>