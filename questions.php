<?php
 include 'connectiondb.php';
 $score="";
 $wrong_answer = "";
 $qp_id = $_GET['v'];
 $noOfQuestions = $_GET['count'];
 $email = $_GET['e'];
 $question_array = array();
 $answers = array();
 $query1 = "SELECT * FROM  QUESTIONS WHERE QP_ID='$qp_id'";
 $query3 = "SELECT * FROM  QUESTIONS WHERE QP_ID='$qp_id'";
 $query_run= mysqli_query($conn,$query1);
 $query_run3 = mysqli_query($conn,$query3);
 while($row_answers = mysqli_fetch_array($query_run3)){
      $question_array[] = $row_answers;
 }
 $answers = array_column($question_array, 'answer');
 $query2 = "SELECT * FROM QUESTION_PAPER WHERE QP_ID='$qp_id'";
 $query_run2= mysqli_query($conn,$query2);
 $row = mysqli_fetch_array($query_run2);
 $duration = $row[3];
 $startTime = $row[5];
 $hms = explode(":", $startTime);
 $h = $hms[0];
 $m = $hms[1];
 $s = $hms[2];
 if(isset($_POST['result'])) {
     $score = $_POST['hiddenScore'];
     $wrong_answer = $_POST['hiddenWrong'];
     $query4 = "UPDATE USER_RESULT SET SCORE = '$score' WHERE START_TIME = '$startTime'";
     $query_run4 = mysqli_query($conn,$query4);
     $score = "Total Score:".$score;
     $wrong_answer = "Wrong Answer: QNo".$wrong_answer;
 }
?>
<html>
    <head>
       <title> Questions </title>
       <link rel="stylesheet" type="text/css" href="questions-style.css">
    </head>
    <body>
        <h1>Let's Start.Choose one option for each question.</h1>
        <div><span id = "warning" style="color:red"></span></div>
        <form id="question-paper"action="result.php?v=<?php echo $qp_id ?>&n=<?php echo $noOfQuestions?>&st=<?php echo $startTime ?>&e=<?php echo $email ?>" method="POST">
        <?php
           while($rows= mysqli_fetch_array($query_run)) {
              $qp_number = $rows[0];
              $question = $rows[2];
              $option1 = $rows[3];
              $option2 = $rows[4];
              $option3 = $rows[5];
              $option4 = $rows[6]; 
              echo "<div style='font-size:18px;background-color:rgba(255,255,0,0.5);margin:10px;padding:15px;display: inline-block;' id='question'>".$qp_number.". ".$question."<br>
              <select name=".$qp_number.">
              <option>Select your answer</option>
              <option>".$option1."</option> 
              <option>".$option2."</option> 
              <option>".$option3."</option> 
              <option>".$option4."</option> 
              </select></div><br>";  
           }
        ?> 
            <input type="submit" id = "result" name = "result" onclick="check()" value="Submit" style="height:30px; width:80px;font-size:15px;"/>
            <input type="text" style="display:none" id="hiddenScore" name="hiddenScore"/> 
            <input type="text" style="display:none" id="hiddenWrong" name = "hiddenWrong"/>
        <br><br>
            </form>
            
        <div class="timerx">
            <p id="timer"></p>
        </div>
        <script type="text/javascript">
            var allAnswer = <?php echo json_encode($answers); ?>;
            var st = new Date();
            //st.setHours("00");
            st.setHours(<?php echo $h; ?>);
            st.setMinutes(<?php echo $m; ?>);
            st.setSeconds(<?php echo $s; ?>);
            var st2 = st;
            function updateClock() {
             var now = new Date();     
             var h = now.getHours() > 12 ? now.getHours() - 12 : now.getHours();
             now.setHours(h);
             now.getMinutes();
             now.getSeconds();
             var curr_time = now;
             return curr_time;
            setTimeout(updateClock, 1000);
            }
                var curr = updateClock();
                var res = Math.abs(curr - st) / 1000;
                var paperDurationInSeconds = <?php echo $duration; ?> * 60;
                var deltaOfDurationAndElapsedTime = paperDurationInSeconds - res;
                var leftMinutes = deltaOfDurationAndElapsedTime / 60;
                var leftSeconds = deltaOfDurationAndElapsedTime - (leftMinutes * 60);
                var total_seconds = leftMinutes * 60 + leftSeconds;
                //var total_seconds = 15*1;
                var c_minutes = parseInt(total_seconds/60);
                var c_seconds = parseInt(total_seconds%60);
                function checktime() {
                    document.getElementById("timer").innerHTML= 'Time left: ' + c_minutes +' minutes ' + c_seconds + ' seconds';
                        if(total_seconds <= 0){
                            document.getElementById("question-paper").submit();
                        }
                        else{
                            total_seconds = total_seconds - 1;
                            c_minutes = parseInt(total_seconds / 60);
                            c_seconds = parseInt(total_seconds % 60);
                            setTimeout("checktime()", 1000);
                        }    
                }
                setTimeout("checktime()", 1000);   
        </script>
    </body>
</html>