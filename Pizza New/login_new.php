<?php

session_start();
// ob_start();
include_once("db.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
if (!preg_match ($pattern, $email) ){  
  echo'<script>alert("Enter Valid Email!")</script>';  
}
  // echo $email."<br>";
  // echo $pass;
  
  if (empty($_POST['email'])){ 
    echo'<script>alert("Email cannot be empty!")</script>';
  }
  if (empty($_POST['password'])){ 
    echo'<script>alert("Please enter Password!")</script>';
  }
  $query ="SELECT * FROM user WHERE email = '$email'";
  $res = mysqli_query($conn,$query);
  if(mysqli_num_rows($res) == 0){
    echo '<script>alert("Not found!")</script>';
  }else{
    $row = mysqli_fetch_assoc($res);
    if($pass == $row['password']){
      if(isset($_POST['rememberme'])){
               setcookie("username",$email,time()+(7*24*60*60));
                setcookie("password",$pass,time()+(7*24*60*60));
               }else{
                 setcookie("username","");
                 setcookie("password","");
               }
               session_start();
        
               $_SESSION['loggedin'] = true;
               $_SESSION['id'] = $row['user_id'];
               $_SESSION['Email'] = $row['email'];
               header("location: index.php");
    }
  }
}
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: index.php");
    
// }
// if($_SERVER['REQUEST_METHOD']=="POST"){
//   $username = $_POST['email'];
//   $password = $_POST['password'];
  
  
//   $query = "SELECT * FROM user where email='$username'" ;
//   $res = mysqli_query($conn,$query);
//   if(mysqli_num_rows($res)==0){
//     echo "<script>alert('Email does not exist!');</script>";
//   }else{
//     $row = mysqli_fetch_assoc($res);
//     if(password_verify($password,$row['password'])){
//       if(isset($_POST['rememberme'])){
//         setcookie("username",$username,time()+(7*24*60*60));
//         setcookie("password",$password,time()+(7*24*60*60));
//       }else{
//         setcookie("username","");
//         setcookie("password","");
//       }
//       session_start();

//       $_SESSION['loggedin'] = true;
//       $_SESSION['id'] = $row['user_id'];
//       $_SESSION['email'] = $row['email'];
//       header("location: index.php");
//     }

      
//       // header("location: index.php");
//   }
// }


// // if(isset($_POST['rememberme'])){
// //   setcookie('emailcookie',$username,time()+86400);
// //   setcookie('passwordcookie',$password,time()+86400);
// //   header('location:index.php');
// // }else{
// //   header('location:index.php');
// // }



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="stylesheet" href="css/login.css" /> -->
    <title>Pizzeria</title>
<style>
body {
	color: #999 ;
	background: #f5f5f5;
	font-family: 'Roboto', sans-serif;
}
.form-control, .form-control:focus, .input-group-addon {
	border-color: #e1e1e1;
	border-radius: 0;
}
.signup-form {
	width: 390px;
	margin: 0 auto;
	padding: 30px 0;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	text-align: center;
}
.signup-form .lead {
	font-size: 14px;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {		
	border-radius: 1px;
	margin-bottom: 15px;
	background: #fff;
	border: 1px solid #f3f3f3;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 13px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
	border-width: 0 0 1px 0;
}	
.signup-form .input-group-addon {
	max-width: 42px;
	text-align: center;
	background: none;
	border-bottom: 1px solid #e1e1e1;
	padding-left: 5px;
}
.signup-form .btn, .signup-form .btn:active {
    width:100%;        
	font-size: 16px;
	font-weight: bold;
	background: #0d47a1 !important;
	border-radius: 3px;
	border: none;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #0d47a1!important;
}
.signup-form a {
	color: #0d47a1;
	text-decoration: none;
}	
.signup-form a:hover {
	text-decoration: underline;
}
.signup-form .fa {
	font-size: 21px;
	position: relative;
	top: 8px;
}
.signup-form .fa-paper-plane {
	font-size: 17px;
}
.signup-form .fa-check {
	color: #fff;
	left: 9px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}
</style> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><h2>Pizzeria🍕</h2></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link text-white" aria-current="page" href="menu.php"
              >Menu</a
            >
            <a class="nav-link text-white" href="cart.php">Cart</a>
            
            <div class=" d-grid gap-2 d-md-flex justify-content-md-end">
                <!-- <a class="btn btn-warning" href="login_new.php" role="button">Login</a> -->
                <!-- </div> -->
              </div>
            </div>
          </div>
          <a class="btn btn-danger" href="signup_new.php" role="button">Sign-Up</a>
        </div>
    </nav>

<div class="signup-form">	
    <form action="" method="post">
		<h2>Welcome!!!</h2>
		
        
       
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="email" class="form-control" name="email" placeholder="Email Address"
        value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username']; }  ?>"
        >
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" name="password" placeholder="Password"
        value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password']; }  ?>"
        >
			</div>
        </div>

        <div class="form-group">
         <input type="checkbox" name="rememberme"> Remember Me
       </div>

		       
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
        </div>
		
    </form>
	<div class="text-center">Dont have an account? <a href="signup_new.php">Signup here</a>.</div>
  
</div>

<div class="container-fluid" id="footer-container">
      <!-- <div class="container"> -->
      <footer class="py-3 bg-dark">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-white">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-white">Features</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-white">Pricing</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-white">FAQs</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-white">About</a>
          </li>
        </ul>
        <p class="text-center text-white text-">&copy;Pizzeria🍕</p>
      </footer>
      <!-- </div> -->
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>