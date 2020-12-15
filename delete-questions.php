<?php
include('connectiondb.php');
$message="";
if(isset($_POST['sub'])){
    $question_no = $_POST['question_no'];
    $qp_id = $_POST['qp_id'];
    $query = "SELECT QUESTION_NO AND QP_ID FROM QUESTIONS WHERE QUESTION_NO ='$question_no' AND QP_ID = '$qp_id'";
    $query_run = mysqli_query($conn,$query); 
    $num = mysqli_num_rows($query_run);
    if($num > 0){
        $query1 = "DELETE FROM QUESTIONS WHERE QUESTION_NO='$question_no' AND QP_ID='$qp_id'";
        mysqli_query($conn,$query1);
         echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='questions-edit.php'>Back</button>";
        $message="QUESTION DELETED SUCCESSFULLY";
    }
    else
    {
        $message="NO SUCH QUESTION NUMBER OR QP_ID TO DELETE.ENTER AN EXISTING DATA TO DELETE.";
    }
}
?>
<html>
    <head><title>Delete Question</title>
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
.delete-question-form
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
    color: black;
} 
        </style>
    </head>
    <body>
        <div class="heading">Enter the Question Number and QP_ID to Delete.</div>
        <div class="delete-question-form">
        <form id = "delete-question-form" name="xyz" method="post" action="" >
       <br>
       <br>
       <input name = "question_no" id="question_no" type="text" class="form-control" placeholder="Question Number" required />
            <br><br>
        <input name = "qp_id" id="qp_id" type="text" class="form-control" placeholder="Question Paper Id" required />
            <br><br>
       <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
      <br>
        </form>
        </div>
        <p><?php echo $message; ?></p>
    </body>
</html>