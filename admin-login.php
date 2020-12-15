<?php
include('connectiondb.php');
 $error="";
 if(isset($_POST['submit'])){
    $adminId = $_POST['adminId'];
    $password = $_POST['password'];
    $ins = "SELECT * FROM ADMIN WHERE ADMIN_ID='$adminId' AND PASSWORD='$password' AND IS_ACTIVE=1";
    $query = mysqli_query($conn,$ins);
    $num = mysqli_num_rows($query);
     if($num > 0){
         echo "<script>
         window.location='admin-edit.php';
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
       <title> Admin Login </title>
       <link rel="stylesheet" type="text/css" href="admin-login-style.css">
    </head>
    <body>
        <div class = "heading">Admin Login</div>
        <h3> <?php echo $error; ?> </h3>
        <div class="admin-login-form">
        <form id = "admin-login-form" name="xyz" method="post" action="" >
       <br>
       <br> 
            <input name = "adminId" id="adminId" type="text" class="form-control" placeholder="AdminId" required />
        <br>
        <br>
        <input name = "password" id="password" type="password" class="form-control" placeholder="Password" required  />
            <br>
            <br>
            <input type="submit" style="padding:1%; font-size:18px; font-weight:bold; width: 200px; height: 50px; background-color:pink;border: 1px solid black;" value="Submit" name="submit" id="submit">
        <br>
        <br>
        </form>
        </div>
    </body>
</html>