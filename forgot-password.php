<?php
include 'connectiondb.php';
$message = "";
 if(isset($_POST['sub'])){
     $email= $_POST['email'];
     $pin_entered = $_POST['secret_pin'];
     $ins = "SELECT EMAIL_ID FROM STUDENT WHERE EMAIL_ID='$email'";
     $query = mysqli_query($conn,$ins);
     $num = mysqli_num_rows($query);
    if($num > 0){
         $query2="SELECT SECRET_PIN FROM STUDENT WHERE EMAIL_ID='$email'";
         $query_run = mysqli_query($conn,$query2);
         $row = mysqli_fetch_array($query_run);
         $secret_pin = $row[0];
         if($secret_pin == $pin_entered)
         {
          echo "<script>
          window.location='reset_password.php?v=$email';
          </script>";
         }
    }
    else{
        $message = "Your Email_id is not registered.";
    }
}
?>
<html>
    <head><title>Forget Password</title>
        <style>
body{
   margin: 0;
   padding: 0;
   text-align: center;
   background-image: url(pic9.jpg);
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
}
.email_id_form
{
    background-color:rgba(135,206,235,0.3);
    margin:-18 240 20 240;
    border: 1px solid black;
}
.email_id_form input[type=submit]
{
    border: none;
    outline: none;
    height: 40px;
    background-color: yellow;
    color: black;
    font-size: 14px;
    font-weight: bold;
    width: 200px;
}
.email_id_form input[type=submit]:hover
{
    cursor: pointer;
    background-color: green;
}
.heading{
    background-color:rgba(128,0,0,0.8);
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
        <div class="heading">Enter your Email_id to recover your password.</div>
        <div class="email_id_form">
            <form id="email_id_form" action="" method="post">
                  <br><br>
                <label>Enter your Email_id</label>
              <br>
                  <input name = "email" id="email" type="email" class="form-control" placeholder="Your Email" required />
                  <br>
                  <br>
                <label>Enter your Secret Pin</label>
                <br>
                  <input name = "secret_pin" id="secret_pin" type="password" class="form-control" placeholder="Your Secret Pin" required />
                <br>
                <br>
                <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
                  <br>
                </form>
        </div>
        <p><?php echo $message; ?> </p>
    </body>
</html>