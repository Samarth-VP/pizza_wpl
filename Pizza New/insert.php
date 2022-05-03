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
    <link rel="stylesheet" href="css/login.css" />
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
        <a class="navbar-brand" href="index.php
        "><h2>Pizzeria🍕</h2></a>
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
           
              
              
              </div>
            </div>
          </div>
          <a class="btn btn-warning" href="login_new.php" role="button">Login</a>
      </div>
    </nav>
    <div class="b-example-divider"></div>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "samarth";


$conn = mysqli_connect($servername, $username, $password,$database);


if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


if($_SERVER['REQUEST_METHOD']=="POST"){
 $firstname =  $_POST['fname']; 
 $lastname = $_POST['lname']; 
 $email =  $_POST['email'];
 $password = $_POST['password'];} 

$select = mysqli_query($conn, "SELECT * FROM user WHERE email = '".$_POST['email']."'");
if(mysqli_num_rows($select)) {
  echo '<div class="alert alert-warning" role="alert">
  Email already exists!
  </div> ';
  // header("Location: insert.php");
}
else{

if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['password'])){ 
  echo'<script>alert("All Fields should be entered!")</script>';
}
else{
$sql = "INSERT INTO user (firstname, lastname,email,password)
VALUES ( '$firstname', '$lastname', '$email','$password')";
mysqli_query($conn,$sql);
echo '<div class="alert alert-success" role="alert">
Data entered successfully!
</div> ';
}
}




  
?>

<div class="signup-form">	
    <form
        name= "valid" 
        action="" 
        method="post"
        onsubmit="return formValidation()" >
		<h2>Create Account</h2>
		
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="fname" placeholder="Firstname">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="lname" placeholder="Lastname">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="text" class="form-control" name="email" placeholder="email">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="text" class="form-control" name="password" placeholder="password">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" name="cpass" placeholder="password">
			</div>
        </div>    
		<div class="form-group">
            <button 
              type="submit" 
              class="btn btn-primary btn-block btn-lg"
              onsubmit="formValidation()"
            >
               Sign Up</button>
        </div>
		<p class="small text-center">By clicking the Sign Up button, you agree to our <br><a href="#">Terms &amp; Conditions</a>, and <a href="#">Privacy Policy</a>.</p>
    </form>
	<div class="text-center">Already have an account? <a href="#">Login here</a>.</div>
</div>

<div class="container-fluid" id="footer-container">
     
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
      
    </div>
    <script src="js/sign.js"></script>
</body>
</html>
