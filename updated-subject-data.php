<?php
include ('connectiondb.php');
$message="";
$subject_name = $_GET['v'];
if(isset($_POST['sub'])){
            $updated_subject_name = $_POST['update-subject-name'];
            $query1 = "UPDATE SUBJECTS SET SUBJECT_NAME= '$updated_subject_name' WHERE SUBJECT_NAME='$subject_name'";
            mysqli_query($conn,$query1);
            echo   "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='subjects-edit.php'>Back</button>";
            $message = "Subject Name Updated Successfully.";
        }
?>
         
<html>
    <head>
    <title>Subject Update Data</title>
        <style>
            body
            {
   margin: 0;
   padding: 0;
   text-align: center;
   background-color:antiquewhite;
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
.update-subject-data-form
{
    background-color: darkgreen;
    opacity: 0.8;
    width: 500px;
    margin: auto;
    padding-top: 0;
    padding-left: 0;
    margin-top: 5%;
}
.update-subject-data-form input[type=submit]
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
.update-subject-data-form input[type=submit]:hover
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
        <div class = "update-subject-data-form">
        <form id = "update-subject-data-form" name="add-admin" method="post" action="" >
       <br>
       <br>
       <h3 class="no-account">ENTER NEW DATA TO UPDATE.</h3>
       <input name = "update-subject-name" id="update-subject-name" type="text" class="form-control" placeholder="Subject Name" required />
        <br>
        <br>
        <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
        </form>
            </div>
        <p style='font-size:30px;color:maroon;'> <?php echo $message; ?> </p>
    </body>
</html>