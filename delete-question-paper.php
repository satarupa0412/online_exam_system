<?php
include('connectiondb.php');
$message="";
if(isset($_POST['sub'])){
    $qp_id = $_POST['qp_id'];
    $query = "SELECT QP_ID FROM QUESTION_PAPER WHERE QP_ID = '$qp_id'";
    $query_run = mysqli_query($conn,$query); 
    $num = mysqli_num_rows($query_run);
    if($num > 0){
        $query1 = "DELETE FROM QUESTION_PAPER WHERE QP_ID='$qp_id'";
        mysqli_query($conn,$query1);
         echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='question-paper-edit.php'>Back</button>";
        $message="QUESTION PAPER DELETED SUCCESSFULLY";
    }
    else
    {
        $message="NO SUCH QP_ID TO DELETE.ENTER AN EXISTING QP_ID TO DELETE";
    }
}
?>
<html>
    <head><title>Delete Question Paper</title>
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
.delete-question-paper-form
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
    color: darkslategray;
}    
    </style>
    </head>
    <body>
        <div class="heading">Enter the QP_ID to Delete.</div>
        <form id = "delete-question-paper-form" name="xyz" method="post" action="" >
       <br>
       <br>
       <input name = "qp_id" id="qp_id" type="text" class="form-control" placeholder="Question Paper Id" required />
            <br><br>
       <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
      <br>
        </form>
        <p style="font-size:28px;color:maroon;"><?php echo $message; ?></p>
    </body>
</html>