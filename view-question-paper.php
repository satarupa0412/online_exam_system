<html>
    <head><title> View Question Paper and Subjects  </title>
          <link rel="stylesheet" type="text/css" href="user_profile-style.css">
    </head>
    <body>
        <?php
           include ('connectiondb.php');
           $query1 = "SELECT * FROM SUBJECTS";
           $query2 = "SELECT * FROM QUESTION_PAPER";
           $query_run1 = mysqli_query($conn,$query1);
           $query_run2 = mysqli_query($conn,$query2);
        ?>
           <hr/><h1 align=center>QUESTION PAPER DETAILS</h1><hr/><br/>
   <?php
        echo "<table class=vx cellpadding=10 align=center>
                <tr align=center>
                    <th>Subject Id</th>
                    <th>Subject Name</th>
                </tr>";
        while($row = mysqli_fetch_array($query_run1)){
        $subject_id = $row[0];
        $subject_name = $row[1];
        echo "
            <tr align=center>
                 <td>".$subject_id."</td>
                 <td>".$subject_name."</td>
                 
             </tr>";
      }
        echo "</table>";
        
?>
        <?php
        echo "<table class=vx cellpadding=10 align=center>
                <tr align=center>
                    <th>QP_Id</th>
                    <th>QP_Name</th>
                    <th>No_of_questions</th>
                    <th>Duration in mins</th>
                    <th>subject_Id</th>
                </tr>";
        while($rows = mysqli_fetch_array($query_run2)){
        $qp_id = $rows[0];
        $qp_name = $rows[1];
        $no_of_questions= $rows[2];
        $duration = $rows[3];
        $subject_id=$rows[4];
        echo "
            <tr align=center>
                 <td>".$qp_id."</td>
                 <td>".$qp_name."</td>
                 <td>".$no_of_questions."</td>
                 <td>".$duration."</td>
                 <td>".$subject_id."</td>
                 
             </tr>";
      }
        echo "</table>";
        
?>
        <button class="button1" onclick="window.location.href='question-paper-edit.php'">BACK</button>
    </body>
</html>