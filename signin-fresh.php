<?php
include('connectiondb.php');
 $error="";
 if(isset($_POST['sign-in'])){
    $email = $_POST['email-id'];
    $password = $_POST['pass'];
    $ins = "SELECT * FROM STUDENT WHERE EMAIL_ID='$email' AND PASSWORD='$password'";
    $query = mysqli_query($conn,$ins);
    $num = mysqli_num_rows($query);
     if($num > 0){
         echo "<script>
         window.location='subjects.php?v=$email';
         </script>";
     }
     else
     {
         $error = "Invalid email or password";
     }
 }
?>


<html>
   <head>
       <title> Sign in </title>
       <link rel="stylesheet" type="text/css" href="style_signin.css">
    </head> 
    <body>
         <h2>Sign in</h2>
         <h3 style=""> <?php echo $error; ?> </h3>
        <div class="wrapper">
            <form action="" method="post">
                <input type="email" name=email-id placeholder="Email id" required>
                <input type="password" placeholder="password"name=pass required >
                <input type="submit" value="Sign in" name="sign-in" id="sign-in">
            </form>
          <div class = "button-text">
              <a href="#" onclick="window.location.href='forgot-password.php'">Forgot Password?</a>
            </div>
        </div>
    </body>
    
</html>