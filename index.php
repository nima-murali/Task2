<?php
 	require 'config.php';
    session_start();
    if (isset($_SESSION['email'])) {
        header("location:home.php");
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php
 			if (isset($_POST['login'])) {

 				$email 		= $_POST['email'];
 				$password 	= $_POST['password'];

 				$sqlfetch = " SELECT email,password FROM users.usertable;";
 				$result = $connect->query($sqlfetch);
 				$found = False;
 				foreach ($result as $userdata) {
 					#echo $userdata['Email'];
                    #echo $userdata['password'];
 					if($userdata['email'] == $email){
 						$found = True;
 						if (password_verify($password,$userdata['password'])) {
                            session_start();
                            $_SESSION['email']  = $email;
 							header("location:home.php");
 						}
 						else{
                            $loginerror = "Incorrect Password try again !";
 							break;
 						}
 					}
 				}
 				if($found == False){
                    $loginerror     ="This email id is not registered";
 				}
 			}

 		?>

        <div class="col-left">
            <h2>Login</h2>
            <div class="header-icon">
                <div class="fb-icon">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </div>
                <div class="twitter-icon">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </div>
            </div>
            <div class="login-t-p">
                <p>or use your account</p>
            </div>
            <form action="index.php" name="loginform" method="post">
                <div class="form-group">
                    <input type="email" id="mail" name="email" placeholder="Email">
                    <input type="password" id="pswd" name="password" placeholder="Password">
                </div>        
                <div class="login-b-p">
                    <?php 
                        if (isset($loginerror)) { 
                            echo "<p>$loginerror</p>";
                        }
                    ?>
                    <p>New User?<a href="register.php">Register</a></p>
                </div>
                <button type="submit" name="login" class="btn-cls">Log in</button>
            </form>
        </div>
        <div class="col-right">        
        </div>
    </div>
</body>
</html>