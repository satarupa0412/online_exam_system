<?php
include('connectiondb.php');
$message="";
if(isset($_POST['sub'])){
    $question_no = $_POST['question_no'];
    $qp_id=$_POST['qp_id'];
    $query = "SELECT QUESTION_NO AND QP_ID FROM QUESTIONS WHERE QUESTION_NO = '$qp_no' AND QP_ID='$qp_id'";
    $query_run = mysqli_query($conn,$query); 
    $num = mysqli_num_rows($query_run);
    if($num > 0){
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $answer = $_POST['answer'];
        $query2 = "UPDATE QUESTIONS SET QUESTION_NO='$question_no',QP_ID='$qp_id',QUESTION='$question',OPTION1='$option1',OPTION2='$option2',OPTION3='$option3',OPTION4='$option4',ANSWER='$answer' WHERE QUESTION_NO ='$qp_no' AND QP_ID='$qp_id'";
        mysqli_query($conn,$query2);
        echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='question-paper-edit.php'>Back</button>";
        $message="UPDATED SUCCESSFULLY";
    }
    else
    {
        $message="QUESTION NUMBER OR QP_ID DOESN'T EXISTS. ENTER AN EXISTING QUESTION NUMBER AND THEN UPDATE.";
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
   background-color: powderblue;
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
.update-question-form
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
        <div class="heading">Enter the data to Update.</div>
        <div class="update-question-form">
        <form id = "update-question-form" name="xyz" method="post" action="" >
       <br>
       <br>
        <p style="font-size:25px;color:darkblue;">Enter the Question Number And QP_ID you want to update.</p>
       <input name = "question_no" id="question_no" type="text" class="form-control" placeholder="Question Number" required />
        <br>
        <br>
        <input name = "qp_id" id="qp_id" type="text" class="form-control" placeholder="Question Paper Id" required />
        <br>
        <br>    
        <input name = "question" id="question" type="text" class="form-control" placeholder="Question" required />
            <br>
            <br>
        <input name = "option1" id="option1" type="text" class="form-control" placeholder="Option 1" required  />
        <br>
        <br>
        <input name = "option2" id="option2" type="text" class="form-control" placeholder="Option 2" required />
        <br>
        <br>
        <input name = "option3" id="option3" type="text" class="form-control" placeholder="Option 3" required />
        <br>
        <br> 
        <input name = "option4" id="option4" type="text" class="form-control" placeholder="Option 4" required />
        <br><br>
        <input name = "answer" id="answer" type="text" class="form-control" placeholder="Answer" required />
        <br><br>
        <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
        <br>
        </form>
        </div>
        <p style="font-size:28px;color:maroon;"> <?php echo $message ; ?></p>
    </body>
</html>
