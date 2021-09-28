<?php
	include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register</title>
</head>
<body>
    <div>
		<?php
		#echo "hai";
		#var_dump($_POST);
		if(isset($_POST['create'])){
			#echo "Hao";
			#$name 				= $_POST['name'];
			$varemail 				= $_POST['email'];
			$varpassword 			= $_POST['password'];
			#$confirmpassword	=$_POST['confirmpassword'];

			$hash_password = password_hash($varpassword,PASSWORD_BCRYPT);

			$sql 		= "INSERT INTO users.usertable(email,password) VALUES('$varemail','$hash_password');";
			$result		= $connect->query($sql);
			if ($result) {
				# code...
				header("location:login.php");
			}else{
				echo '<script>alert("This email id is already registered")</script>';
			}
			
		}
		?>
    </div>
    <div class="container">
        <div class="col-left">
            <h2>Register</h2>
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
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <input type="password" id="paswd" name="password" placeholder="Password">
                </div>        
                <div class="login-b-p">
                    <p>Already have an account?<a href="login.php">Login</a></p>
                </div>
                <button type="submit" name="create" class="btn-cls">Register</button>
            </form>
        </div>
        <div class="col-right">        
        </div>
    </div>
</body>
</html>