<html>
    <head><title> Result </title>
          <link rel="stylesheet" type="text/css" href="user_profile-style.css">
    </head>
    <body>
        <?php
           include ('connectiondb.php');
           $query1 = "SELECT * FROM STUDENT";
           $query_run1 = mysqli_query($conn,$query1);
        ?>
           <hr/><h1 align=center>Student Details</h1><hr/><br/>
   <?php
        echo "<table class=vx cellpadding=10 align=center>
                <tr align=center>
                    <th>student name</th>
                    <th>email-id</th>
                    <th>password</th>
                </tr>";
        while($row = mysqli_fetch_array($query_run1)){
        $student_name = $row[0];
        $email_id = $row[1];
        $password = $row[2];
        echo "
            <tr align=center>
                 <td>".$student_name."</td>
                 <td>".$email_id."</td>
                 <td>".$password."</td>
             </tr>";
      }
        echo "</table>";
?>
        <button class="button1" onclick="window.location.href='students-edit.php'">BACK</button>
    </body>
</html>