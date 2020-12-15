<?php
include('connectiondb.php');
$message="";
if(isset($_POST['sub'])){
    $question_no = $_POST['question_no'];
    $qp_id = $_POST['qp_id'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer = $_POST['answer'];
    $ins = "SELECT QP_ID FROM QUESTION_PAPER WHERE QP_ID='$qp_id'";
    $query = mysqli_query($conn,$ins);
    $num = mysqli_num_rows($query);
    if($num > 0){
        $query1 = "INSERT INTO QUESTIONS(QUESTION_NO,QP_ID,QUESTION,OPTION1,OPTION2,OPTION3,OPTION4,ANSWER) VALUES('$question_no',$qp_id','$question','$option1','$option2','$option3','$option4','$answer')";
        mysqli_query($conn,$query1);
        echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='questions-edit.php'>Back</button>";
        $message = "INSERTED SUCCESSFULLY";
    }
    else
    {
        $message = "Sorry!!! Can't add question. Check Question Paper table and get a valid QP_ID.";
    }
    
}
?>
<html>
    <head><title>Add Question</title>
    <style>
        body{
   margin: 0;
   padding: 0;
   text-align: center;
   background-color: lightblue;
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
        <div class="heading">Enter Details to Add Subjects</div>
        <div class="add-question-form">
         <form id = "add-question-form" name="xyz" method="post" action="" >
       <br>
       <br>
        <input name = "question_no" id="question_no" type="text" class="form-control" placeholder="Question number" required />
        <br><br>
       <input name = "qp_id" id="qp_id" type="text" class="form-control" placeholder="Question Paper_id" required />
        <br>
        <br>
        <input name = "question" id="question" type="text" class="form-control" placeholder="Question" required  />
        <br>
        <br>
        <input name = "option1" id="option1" type="text" class="form-control" placeholder="Option 1" required />
        <br>
        <br>
        <input name = "option2" id="option2" type="text" class="form-control" placeholder="Option 2" required />
        <br>
        <br>
        <input name = "option3" id="option3" type="text" class="form-control" placeholder="Option 3" required />
             <br><br>
        <input name = "option4" id="option4" type="text" class="form-control" placeholder="Option 4" required />
             <br><br>
        <input name = "answer" id="answer" type="text" class="form-control" placeholder="Answer Number" required />
             <br><br>
        <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
        <br>
       </form> 
        </div>
        <p style="font-size:28px;color:maroon;"> <?php echo $message; ?></p>
    </body>
</html>