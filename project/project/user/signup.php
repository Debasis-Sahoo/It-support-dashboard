<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Sign Up</title>
</head>
<body>
<main>
        <div class="form-cont"> 

            <form action="process-signup.php" method="post">
                <h1>Sign Up</h1>
                <div class="input-fild f-name">
        
                    <input type="text" class="input-sec" name="name" placeholder="Name" required autocomplete="off">
                </div>
                
                <div class="input-fild">
        
                    <input type="email" class="input-sec" placeholder="Enter your email" name="email" required autocomplete="off">
                </div>
                
                <div class="input-fild cno">
                    <input type="number" class="input-sec" placeholder="Ex :+91 xxxxxxxxxx" name="cno" required autocomplete="off" >
                </div>
                <div class="input-fild code">
        
                    <input type="text" class="input-sec" name="empcode" placeholder="Employee Code" required autocomplete="off">
                </div>
                <div class="input-fild Password">

                    <input type="password" class="input-sec" placeholder="Password" name="password" required autocomplete="off">
                </div>
                <div class="input-fild Password">
                    
                    <input type="password" class="input-sec" name="conpwd"placeholder="Confirm Password"required autocomplete="off">
                </div>
                <div id="submit">
                
                    <input type="submit" class="submit-btn" name="submit" value="SignUp">
                </div>
                <div >
                
                    <h4>Alredy have an account &nbsp;&nbsp;<a href="signin.php">SignIn</a></h4>
                </div>
            </form>
        </div>
    </main>
    
</body>
</html>