<html>
    <head><title> View Subjects </title>
          <link rel="stylesheet" type="text/css" href="user_profile-style.css">
    </head>
    <body>
        <?php
           include ('connectiondb.php');
           $query1 = "SELECT * FROM SUBJECTS";
           $query_run1 = mysqli_query($conn,$query1);
        ?>
           <hr/><h1 align=center>SUBJECT DETAILS</h1><hr/><br/>
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
        <button class="button1" onclick="window.location.href='subjects-edit.php'">BACK</button>
    </body>
</html>