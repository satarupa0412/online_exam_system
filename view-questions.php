<html>
    <head><title> View Questions</title>
          <link rel="stylesheet" type="text/css" href="user_profile-style.css">
    </head>
    <body>
        <?php
           include ('connectiondb.php');
           $query2 = "SELECT * FROM QUESTIONS";
           $query_run2 = mysqli_query($conn,$query2);
        ?>
           <hr/><h1 align=center>QUESTIONS DETAILS</h1><hr/><br/>
   <?php
        echo "<table class=vx cellpadding=10 align=center>
                <tr align=center>
                    <th>Question_no</th>
                    <th>QP_id</th>
                    <th>Question</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                    <th>Answer</th>
                </tr>";
        while($rows = mysqli_fetch_array($query_run2)){
        $question_no = $rows[0];
        $qp_id = $rows[1];   
        $question = $rows[2];
        $option1= $rows[3];
        $option2 = $rows[4];
        $option3=$rows[5];
        $option4=$rows[6];
        $answer=$rows[7];
            
        echo "
            <tr align=center>
                 <td>".$question_no."</td>
                 <td>".$qp_id."</td>
                 <td>".$question."</td>
                 <td>".$option1."</td>
                 <td>".$option2."</td>
                 <td>".$option3."</td>
                 <td>".$option4."</td>
                 <td>".$answer."</td>
             </tr>";
      }
        echo "</table>";
        
?>
        <button class="button1" onclick="window.location.href='question-paper-edit.php'">BACK</button>
    </body>
</html>