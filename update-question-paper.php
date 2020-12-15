<?php
include('connectiondb.php');
$message="";
if(isset($_POST['sub'])){
    $qp_id = $_POST['qp_id'];
    $query = "SELECT QP_ID FROM QUESTION_PAPER WHERE QP_ID = '$qp_id'";
    $query_run = mysqli_query($conn,$query); 
    $num = mysqli_num_rows($query_run);
    if($num > 0){
        $qp_name = $_POST['qp_name'];
        $no_of_questions = $_POST['no_of_questions'];
        $duration = $_POST['duration'];
        $subject_id = $_POST['subject_id'];
        $query2 = "UPDATE QUESTION_PAPER SET QP_NAME = '$qp_name',NO_OF_QUESTIONS='$no_of_questions',DURATION='$duration',SUBJECT_ID='$subject_id' WHERE QP_ID ='$qp_id'";
        mysqli_query($conn,$query2);
        echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='question-paper-edit.php'>Back</button>";
        $message="UPDATED SUCCESSFULLY";
    }
    else
    {
        $message="QP_ID DOESN'T EXISTS. ENTER AN EXISTING ID AND THEN UPDATE.";
    }
        
}
?>
<html>
    <head><title>Update Question Paper</title>
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
.sub-heading
{
    font-size: 30px;
    color: mediumblue;
}
.update-question-paper-form
            {
                background-color: rgba(128,0,0,0.5);
                margin-left: 250px;
                margin-right: 250px;
            }
        </style>
    </head>
    <body>
        <div class="heading">Enter the data to Update.</div>
        <div class = update-question-paper-form>
        <form id = "update-question-paper-form" name="xyz" method="post" action="" >
       <br>
       <br>
            <p class="sub-heading">Enter the QP_ID you want to update.</p>
       <input name = "qp_id" id="qp_id" type="text" class="form-control" placeholder="Question Paper Id" required />
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
        <p style="font-size:28px;color:maroon;"> <?php echo $message ; ?></p>
    </body>
</html>
