<?php 
    include ("connect.php");
    require_once ("process-signin.php");

?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Sign In</title>
</head>

<body>
    <main>
        <div class="form-cont">

            <form method="post">
                <h1>Sign In</h1>
                <br>
               
                <?php if($is_invalid){?>
                    <em>Invalid login</em>
                <?php }?>
                
                
                <div class="input-fild">
                    
                    <input type="text" class="input-sec" placeholder="Enter your email" name="email" required autocomplete="off" value="<?= htmlspecialchars($_POST["email"] ?? ""); ?>">
                </div>
                <div class="input-fild Password">
                  
                    <input type="password" class="input-sec" placeholder="Password" name="password" required autocomplete="off">
                </div>
                <br>
                <div  id="submit">
                    <input type="submit" class="submit-btn" name="submit" value="SignIn">
                </div>
                <br><br>
                <div>

                    <h4>Create an account &nbsp;&nbsp;<a href="signup.php">SignUp</a></h4>
                </div>
            </div>
        </form>
        </div>
    </main>

</body>

</html>