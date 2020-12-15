<?php
include 'connectiondb.php';
$error="";
$password_mismatch = "";
 if(isset($_POST['sub'])){
     $servername = "localhost:6564";
     $username = "root";
     $password="";
     $dbname = "onlineexam";
     $conn = mysqli_connect($servername,$username,$password,$dbname);
     $name = $_POST['name'];
     $email= $_POST['email'];
     $password= $_POST['password'];
     $confirm_passowrd = $_POST['password-confirm'];
     $secret_pin=$_POST['secret_pin'];
     $ins = "SELECT EMAIL_ID FROM STUDENT WHERE EMAIL_ID='$email'";
     $query = mysqli_query($conn,$ins);
     $num = mysqli_num_rows($query);
    if($num > 0){
        $error = "Already registered!! Please Sign in.";    
    }
    else{
        if($password == $confirm_passowrd){
        $data = "INSERT INTO STUDENT(NAME,EMAIL_ID,PASSWORD,SECRET_PIN) VALUES('$name','$email','$password','$secret_pin')";
        mysqli_query($conn,$data);
        echo "<script>
        window.location='welcomenewusers.php?v=$email';
        </script>";
        }
        else
        {
            $password_mismatch="Password and Confirm Password are not matching.";
        }
    }
}
?>
<html>
<head>
<title> Login and SignUp </title>
<link rel="stylesheet" type="text/css" href="style_login_signup.css">
</head>
<body>
    <header>
        <div class="logo" align = "right">Exam Ground</div>
        <div align= "right">
            <nav>
                <ul>
                    <li><a href= "#" onclick="window.location.href='aboutUs.php'">About Us</a></li>
                    <li><a href= "#" onclick="window.location.href='admin-login.php'">Admin Login</a></li>
                    <li><a href= "#" onclick="window.location.href='feedbacks.php'">Feedback</a></li>
                </ul>   
            </nav>
        </div>
    </header>
   <div class = "page-title">
      <h1>Welcome</h1>
      <h2 class="tag-line"> Now Exams Will Be Easy<br> </h2>
      <h3> <?php echo $error; ?> </h3>
       <h4 style="color:red;"><?php echo $password_mismatch; ?></h4>
   </div>
   <div class = "signup-form">
   <form id = "signup-form" name="xyz" method="post" action="" >
       <br>
       <br>
       <div style="font-size:20px;color:white;padding:20px;">Don't have an account? Register Now.</div>
       <h5 class="registered">Already Registered?</h5>
       <input name = "name" id="name" type="text" class="form-control" placeholder="Your Name" required />
        <br>
        <br>
        <input name = "email" id="email" type="email" class="form-control" placeholder="Your email" required  />
        <br>
        <br>
        <input name = "password" id="password" type="password" class="form-control" placeholder="Password" required />
        <br>
        <br>
        <input name = "password-confirm" type="password" class="form-control" placeholder="Confirm Password" required />
        <br>
        <br>
       <label style="color:red;">Enter a 4 digit pin that will be used if you forget the password.</label>
       <br>
       <input name = "secret_pin" type="password" class="form-control" placeholder="Your Secret Pin" required />
        <br>
        <br>
        <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
        <br>
    </form>           
   </div>
   <button class="button1" onclick="window.location.href='signin-fresh.php'">Sign In</button>
</body>
</html>
