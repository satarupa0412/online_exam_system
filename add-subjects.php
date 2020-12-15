<?php
include ('connectiondb.php');
$message="";
 if(isset($_POST['sub'])){
     $subject_name= $_POST['subject_name'];
     $ins = "SELECT SUBJECT_NAME FROM SUBJECTS WHERE SUBJECT_NAME='$subject_name'";
     $query = mysqli_query($conn,$ins);
     $num = mysqli_num_rows($query);
    if($num > 0){
        $message = "Already exists!! Please enter new Subject.";    
    }
    else{
        $data = "INSERT INTO subjects(SUBJECT_NAME) VALUES('$subject_name')";
        mysqli_query($conn,$data);
        $message = "Subject Added Successfully.";
        echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='admin-edit.php'>Back</button>";
    }
}
?>


<html>
    <head>
        <title>Add Subjects</title>
        <style>
            body{
   margin: 0;
   padding: 0;
   text-align: center;
   background-color: lightsteelblue;
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
.add-subject-form
{
    background-color: maroon;
    opacity: 0.8;
    width: 500px;
    margin: auto;
    padding-top: 0;
    padding-left: 0;
    margin-top: 5%;
}
.add-subject-form input[type=submit]
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
.add-subject-form input[type=submit]:hover
{
    cursor: pointer;
    background-color: green;
}
h3
{
    font-size: 25px;
    background-color: darkseagreen;
}
        </style>
    </head>
    <body>
        <div class = "add-subject-form">
        <form id = "add-subject-form" name="add-admin" method="post" action="" >
       <br>
       <br>
       <h3 class="no-account">ENTER SUBJECT NAME TO ADD.</h3>
       <input name = "subject_name" id="subject_name" type="text" class="form-control" placeholder="Subject Name" required />
        <br>
        <br>
        <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
        </form>
            </div>
        <p style='font-size:30px;color:maroon;'> <?php echo $message; ?> </p>
    </body>
</html>