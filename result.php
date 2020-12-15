<?php
include('connectiondb.php');
 $score = 0;
 $wrong_answer = "";
 $all_selected_answer = array();
 $wrong_answers = array();
 $unattempted_answers = array();
 $right_answers_qno = array();
 $qp_id = $_GET['v'];
 $no_of_questions = $_GET['n'];
 $query1 = "SELECT * FROM  QUESTIONS WHERE QP_ID='$qp_id'";
 $query_run1= mysqli_query($conn,$query1);
 $query2 = "SELECT * FROM  QUESTIONS WHERE QP_ID='$qp_id'";
 $query_run2= mysqli_query($conn,$query2); 
 while($row_answers = mysqli_fetch_array($query_run2)){
      $question_array[] = $row_answers;
 }
 $answers = array_column($question_array, 'answer');
 while($rows= mysqli_fetch_array($query_run1)) {
     $qp_number = $rows[0];
     $selected_answer = $_POST[$qp_number];
     array_push($all_selected_answer,$selected_answer);
 }
 
 $p = 0;
 $q = 0;
 $r = 0;

 for($i = 0; $i < 2; $i++){
     if($all_selected_answer[$i] == "Select your answer"){
         $unattempted_answers[$p] = $i+1; 
         $p = $p + 1;
     }
     else{
         if($answers[$i] == $all_selected_answer[$i]){
            $score = $score + 1;
             $right_answers_qno[$q] = $i+1;
             $q = $q + 1;
         }
         else
         {
             $wrong_answers[$r] = $i + 1;
             $r = $r + 1;
         }
     }
 }
?>


<html>
    <head>
        <title>Result of Exam</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Andika+New+Basic:wght@700&display=swap" rel="stylesheet">
    </head>
    <style>
        body{
            background-color: cadetblue;
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
            background-image: url(pic44.jpg);
        }
        .heading
        {
            font-size: 35px;
            text-align: center;
            font-family: 'Andika New Basic', sans-serif;
            padding: 5px;
            margin: 10px;
        }
        .score {
            background-color: rgba(0, 0, 51, 0.8);
            margin: 120 150 0 150;
            font-size: 40px;
            padding: 35px;
            color: rgb(239,222,205);
            border: 1px solid grey;
            font-family: 'Andika New Basic', sans-serif;
        }
        .wrong-answers {
            background-color: rgba(127, 30, 30, 0.8);
            margin: 0 150 0 150;
            font-size: 20px;
            padding: 15px;
            font-family: 'Andika New Basic', sans-serif;
            font-weight: bold;
        }
        .button-design {
            background-color:lightcyan;
            padding: 15px;
            font-size: 15px;
            margin: 50 50 0 50;
            border: 1px solid black;
            border-radius: 15px;
            color: black;
            width: 100%;
            font-weight: bold;
        }
        .button-design:hover
        {
            background-color: green;
            cursor: pointer;
        }
        .table-design {
            margin: 0 150 0 150;
            color: rgb(239,222,205);
            font-family: 'Andika New Basic', sans-serif;
        }
        .ths-red {
            background-color:rgba(255,69,0, 0.8);
        }
        .ths-green {
            background-color:rgba(34,139,34, 0.9);
        }
        .ths-orange {
            background-color:rgba(255, 179, 26, 0.9);
        }
        .right-ans {
            padding: 30px;    
            background-color: rgba(255, 248, 220, 0.5);
        }
        .wrong-ans {
            padding: 30px;
            background-color: rgba(255, 248, 220, 0.5);
        }
        .not-attempted {
            padding: 30px;
            background-color: rgba(255, 248, 220, 0.5);
        }
        .dot {
            padding: 10 20 10 20;
            background-color: #fff;
            border: 1px solid grey;
            border-radius: 50%;
            font-size: 18px;
            text-align: center;
            font-family: 'Andika New Basic', sans-serif;
        }
        .button-display {
            display: flex;
            justify-content: space-around;
            margin: 0 150 0 150;
        }
    </style>
    <body>
        <div class="heading">Your Exam Result</div>
        <p class="score" align=center> Total Score : <?php echo $score; ?></p>
        <div class="table-design">
            <table width=100%>
                <tr align=center>
                    <th class="ths-red">Wrong Answers</th>
                    <th class="ths-green">Correct Answers</th>
                    <th class="ths-orange">Not Attempted</th>
                </tr>
                <tr>
                    <td class="wrong-ans">
                        <?php for($k = 0; $k < count($wrong_answers); $k++) {?>
                            <span class="dot"><?php echo $wrong_answers[$k]; ?></span>
                        <?php }?>
                    </td>
                    <td class="right-ans">
                        <?php for($k = 0; $k < count($right_answers_qno); $k++) { ?>
                            <span class="dot"><?php echo $right_answers_qno[$k] ?></span>
                        <?php }?>
                    </td>
                    <td class="not-attempted">
                        <?php for($k = 0; $k < count($unattempted_answers); $k++) { ?>
                            <span class="dot"><?php echo $unattempted_answers[$k] ?></span>
                        <?php }?>
                    </td>
                </tr>
            </table>
        </div>
        <div align=center class="button-display">
            <button class="button-design" onclick="window.location.href='view_attempted_paper.php?v=<?php echo $qp_id ?>'">View All Q&amp;A</button>
            <button class="button-design" onclick="window.location.href='subjects.php'">Subjects Page</button>
        </div>
        
    </body>
</html>