<?php
include('connectiondb.php');
$message="";
$email = $_GET['v'];
if(isset($_POST['sub'])){
    $new_password=$_POST['new_password'];
$query = "UPDATE STUDENT SET PASSWORD='$new_password' WHERE EMAIL_ID='$email'";
    mysqli_query($conn,$query);
 $message = "Password updated successfully.";
}
  
?>


<html>
    <head><title>New Password</title>
        <style>
        body{
   margin: 0;
   padding: 0;
   text-align: center;
   background-image: url(pic40.jpg);
   background-size: cover;
   background-position: center;
   font-family: sans-serif;
}
.form-control
{
    width: 400px;
    height: 60px;
    border-bottom: 2px solid gray;
    background: transparent;
    margin-bottom: 16px;
    color: black;
    text-align: center;
    background-color: aliceblue;
    font-size: 18px;
    margin: 20px;
}
.new_password_form
{
    background-color:rgba(135,206,235,0.3);
    margin:-18 240 20 240;
    border: 1px solid black;
}
.new_password_form input[type=submit]
{
    border: none;
    outline: none;
    height: 40px;
    background-color: lightcoral;
    color: black;
    font-size: 14px;
    font-weight: bold;
    width: 200px;
}
.new_password_form input[type=submit]:hover
{
    cursor: pointer;
    background-color: pink;
}
.heading{
    background-color:rgba(0,128,0,0.8);
    margin:10% 240 20 240;
    border:1px solid black;
    padding:2%;
    font-size:25px;
    border-radius: 15px;
    font-weight: bolder;
}
        </style>
    </head>
    <body>
        <div class="heading">Enter your new password.</div>
        <div class="new_password_form">
            <form action="" method="post">
                <input name = "new_password" type="password" class="form-control" placeholder="New Password" required />
                <br>
                <br>
                <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
                <br>
            </form>
        </div>
        <p><?php echo $message; ?></p>
    </body>
</html>