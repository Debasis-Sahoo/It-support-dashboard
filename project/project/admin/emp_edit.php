<?php
session_start();
session_reset();
include ("connect.php");

if (isset($_SESSION["user_id"])) {

}
else{
    
    header("location:signin.php");
}
if (isset($_POST['update'])) {
    $data_id = $_POST['empid'];
    $empname = $_POST['emp_name'];
    $email = $_POST['email'];
    $cnumber = $_POST['mob_number'];
    $dob = $_POST['emp_dob'];
    $section = $_POST['c_section'];
    $deskno = $_POST['desk_no'];

    $sql = "update `employees` set empname='$empname' ,email='$email', cno='$cnumber', dob='$dob', section='$section', deskno='$deskno' where empid=$data_id";
    $res = $conn->query($sql);
    if ($res) {
        header('location:emp_list.php');
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
    <title>Edit Employee</title>
    <style>
        main {
            margin-left: 30%;
        }
    </style>
</head>

<body>
    <nav>
        <div class="containe">
            <ul>
                <li>
                    <div class="logo">
                        <img src="../logo.png" alt="logo">
                        <div class="nav-item span">Doc Sof</div>
                    </div>
                </li>
                </li>
                <li><a href="home.php">
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


                <li><a href="">
                        <i class="fas fa-solid fa-right-from-bracket"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="container">
            <header class="d-flex justify-content-between my-4 w-50">

                <h1 id="top-title">Edit Empolyee: </h1>
                <div>
                    <a href="emp_list.php" class="btn btn-primary w-100">Back</a>
                </div>
            </header>
            <!--.............. PHP................ -->
            <?php
            include("connect.php");
            if (isset($_GET["empid"])) {
                $id = $_GET["empid"];
                $sql = "SELECT *FROM employees WHERE empid=$id";
                $result = $conn -> query($sql);
                $row = $result -> fetch_assoc();

            ?>
                <form action="" method="post">
                    <input type="hidden" name="empid" value="<?= $row['empid']; ?>">
                    <div class="form-element my-4 w-50">
                        <input type="text" class="form-control" name="emp_name" value="<?= $row['empname']; ?>" placeholder="Name" required>
                    </div>
                    <div class="form-element my-4 w-50">
                        <input type="email" class="form-control" value="<?= $row['email']; ?>" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-element my-4 w-50">
                        <input type="number" class="form-control" name="mob_number" value="<?= $row['cno']; ?>" placeholder="+91 xxxxxxxxxx" required>
                    </div>

                    <div class="form-element my-4 w-50">
                        <input type="date" value="<?= $row['dob']; ?>" class="form-control" name="emp_dob">
                    </div>
                    <div class="form-element my-4 w-50">
                        <select name="c_section" class="form-control" id="" required>
                            <option value="">select</option>
                            <option value="development" <?php if ($row['section'] == "development") {
                                                            echo "selected";
                                                        } ?>>Development</option>
                            <option value="manegment" <?php if ($row['section'] == "manegment") {
                                                            echo "selected";
                                                        } ?>>Manegment</option>
                            <option value="hr" <?php if ($row['section'] == "hr") {
                                                    echo "selected";
                                                } ?>>HR</option>
                            <option value="accounting" <?php if ($row['section'] == "accounting") {
                                                            echo "selected";
                                                        } ?>>Accounting</option>
                        </select>
                    </div>
                    <div class="form-element my-4 w-50">
                        <input type="number" class="form-control" value="<?= $row['deskno']; ?>" name="desk_no" placeholder="Desk Number" required>
                    </div>
                    <div class="form-element my-4">
                        <input type="submit" class="btn btn-success" name="update" value="Update">
                    </div>
                </form>
            <?php
            }
            ?>

        </div>
    </main>
</body>

</html>