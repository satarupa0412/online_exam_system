<?php
include ('connectiondb.php');
$message="";
 if(isset($_POST['sub'])){
     $subject_name = $_POST['subject_name'];
     $ins = "SELECT SUBJECT_NAME FROM SUBJECTS WHERE SUBJECT_NAME='$subject_name'";
     $query = mysqli_query($conn,$ins);
     $num = mysqli_num_rows($query);
    if($num > 0){
        echo "<script>
        window.location='updated-subject-data.php?v=$subject_name' ;
        </script>";
    }
    else{
        $message = "SUBJECT DOESN'T EXISTS TO DELETE.ENTER AN EXISTING SUBJECT.";
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
   background-color:lightsteelblue;
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
.update-subject-form
{
    background-color: darkgreen;
    opacity: 0.8;
    width: 500px;
    margin: auto;
    padding-top: 0;
    padding-left: 0;
    margin-top: 5%;
}
.update-subject-form input[type=submit]
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
.update-subject-form input[type=submit]:hover
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
        <div class = "update-subject-form">
        <form id = "update-subject-form" name="add-admin" method="post" action="" >
       <br>
       <br>
       <h3 class="no-account">ENTER SUBJECT NAME TO UPDATE.</h3>
       <input name = "subject_name" id="email_id" type="text" class="form-control" placeholder="Subject Name" required />
        <br>
        <br>
        <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
        </form>
            </div>
        <p style='font-size:30px;color:maroon;'> <?php echo $message; ?> </p>
    </body>
</html>