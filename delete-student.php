<?php
include ('connectiondb.php');
$message="";
 if(isset($_POST['sub'])){
     $email_id = $_POST['email_id'];
     $ins = "SELECT EMAIL_ID FROM STUDENT WHERE EMAIL_ID='$email_id'";
     $query = mysqli_query($conn,$ins);
     $num = mysqli_num_rows($query);
    if($num > 0){
       $query1= "DELETE FROM STUDENT WHERE EMAIL_ID = '$email_id'";
        mysqli_query($conn,$query1);
        $message = "DELETED SUCCESSFULLY.";
        echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='admin-edit.php'>Back</button>";
    }
    else{
        $message = "STUDENT DOESN'T EXISTS TO DELETE.ENTER AN EXISTING ID.";
    }
}
?>

<html>
    <head>
        <title> Add New Admin </title>
        <link rel="stylesheet" type="text/css" href="">
        <style>
            body
            {
   margin: 0;
   padding: 0;
   text-align: center;
   background-color:palegoldenrod;
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
.delete-student-form
{
    background-color: darkgreen;
    opacity: 0.8;
    width: 500px;
    margin: auto;
    padding-top: 0;
    padding-left: 0;
    margin-top: 5%;
}
.delete-student-form input[type=submit]
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
.delete-student-form input[type=submit]:hover
{
    cursor: pointer;
    background-color: deepskyblue;
}
h3
{
    font-size: 25px;
    background-color: lightpink;
}</style>
    </head>
    <body>
        <div class = "delete-student-form">
        <form id = "delete-student-form" name="add-admin" method="post" action="" >
       <br>
       <br>
       <h3 class="no-account">ENTER EMAIL-ID TO DELETE.</h3>
       <input name = "email_id" id="email_id" type="text" class="form-control" placeholder="Email Id" required />
        <br>
        <br>
        <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
        </form>
            </div>
        <p style='font-size:30px;color:maroon;'> <?php echo $message; ?> </p>
    </body>
</html>