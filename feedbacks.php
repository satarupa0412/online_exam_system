<?php
include('connectiondb.php');
$message="";
if(isset($_POST['sub'])){
    $email_id = $_POST['email_id'];
    $name = $_POST['name'];
    $experience = $_POST['experience'];
    $change = $_POST['change_system'];
    $query = "INSERT INTO FEEDBACK(EMAIL_ID,NAME,EXPERIENCE,CHANGE_SYSTEM) VALUES('$email_id','$name','$experience','$change')";
    mysqli_query($conn,$query);
    $message="FEEDBACK RECORDED SUCCESSFULLY. THANKS FOR YOUR RESPONSE.";
    echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='login%20and%20signup.phpques'>Back</button>";
}
?>
<html>
    <head><title>Feedback Form</title>
        <style>
              body{
   margin: 0;
   padding: 0;
   text-align: center;
   background-image: url(pic10.png);
   background-size: cover;
   background-position: center;
   font-family: sans-serif;
}
.container
{
    background-color: rgba(128,128,128,0.8);
    opacity: 0.8;
    width: 500px;
    margin: auto;
    padding-top: 0;
    padding-left: 0;
    margin-top: 5%;
}
            
.heading
{
    font-size: 50px;
    color: beige;
}
    .form-control
{
    width: 400px;
    height: 30px;
    border-bottom: 2px solid gray;
    background: transparent;
    background-color: aliceblue;
    margin-bottom: 16px;
    color:black;
}
form .submit
{
    background: #fff;
    color: cornflowerblue;
    font-weight: bold;
    height: 25px;
    font-size: 20px;
    margin-top: 20px;
    width: 100px;
}
form .submit:hover
{
    background-color: darkgreen;
    cursor: pointer;
}            
.label
{
   font-size: 20px;
}
.change
{
    width:400px;
    height:100px;
}
       </style>
    </head>
    <body>
        <div class="heading">FEEDBACK FORM</div>
        <div class="container">
            <form action="" method="post">
                <label class="label">Email-Id</label><br>
                <input type="email" name="email_id" id="email_id" class="form-control" placeholder="Email-Id" required><br>
                <label class="label">Name</label><br>
                <input type="text" name="name" id="name" class="form-control"placeholder="Your full name"><br>
                <label class="label">Experience:</label><br>
                <input type="radio" name="experience" class="option" id="bad" value="Bad"/>BAD
                <input type="radio" name="experience" class="option" id="average" value="Average"/>AVERAGE
                <input type="radio" name="experience" class="option" id="good" value="Good"/>GOOD
                <br>
                <input type="text" name="change_system" class="change" id="change_system" placeholder="Anything you want us to change"><br><br>
                <input type="submit" name="sub" id="sub" class="form-control submit"placeholder="Submit"><br>
            </form>
        </div>
        <p><?php echo $message; ?></p>
    </body>
</html>