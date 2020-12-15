<?php
include('connectiondb.php');
$message="";
if(isset($_POST['sub'])){
    $qp_name = $_POST['qp_name'];
    $no_of_questions = $_POST['no_of_questions'];
    $duration = $_POST['duration'];
    $subject_id = $_POST['subject_id'];
    $ins = "SELECT SUBJECT_ID FROM QUESTION_PAPER WHERE SUBJECT_ID='$subject_id'";
    $query = mysqli_query($conn,$ins);
    $num = mysqli_num_rows($query);
    if($num > 0){
        $query1 = "INSERT INTO QUESTION_PAPER(QP_NAME,NO_OF_QUESTIONS,DURATION,SUBJECT_ID,START_TIME) VALUES('$qp_name','$no_of_questions','$duration','$subject_id','0')";
        mysqli_query($conn,$query1);
        echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='question-paper-edit.php'>Back</button>";
        $message = "INSERTED SUCCESSFULLY";
    }
    else
    {
        $message = "Sorry!!! Can't add question paper. First add Subject and get Subject-Id.";
    }
    
}
?>
<html>
    <head>
        <title>Add Question Paper</title>
        <style>
body{
   margin: 0;
   padding: 0;
   text-align: center;
   background-color: lightcyan;
   background-size: cover;
   background-position: center;
   font-family: sans-serif;
}
.form-control
{
    width: 400px;
    height: 30px;
    border-bottom: 2px solid gray;
    background: transparent;
    background-color: aliceblue;
    margin-bottom: 16px;
    color:darkblue;
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
.add-question-form
{
       background-color: rgba(0, 0, 0, 0.4); 
       margin-left: 250px;
       margin-right: 250px; 
}
form .submit:hover
{
    background-color: darkgreen;
    cursor: pointer;
}
.heading
{
    font-size: 40px;       
}
</style>
    </head>
    <body>
        <div class="heading">Enter Details to Add Question Paper</div>
        <div class = "add-question-form">
   <form id = "add-question-form" name="xyz" method="post" action="">
       <br>
       <br>
       <input name = "qp_name" id="qp_name" type="text" class="form-control" placeholder="Question Paper Name" required />
        <br>
        <br>
        <input name = "no_of_questions" id="no_of_questions" type="text" class="form-control" placeholder="Number of Questions" required  />
        <br>
        <br>
        <input name = "duration" id="duration" type="text" class="form-control" placeholder="Duration" required />
        <br>
        <br>
        <input name = "subject_id" id="subject_id" type="text" class="form-control" placeholder="Subject Id" required />
        <br>
        <br>
        <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
        <br>
    </form>           
   </div>
        <p style="font-size:28px;color:maroon;"> <?php echo $message; ?></p>
    </body>
</html>