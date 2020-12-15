
<html>
    <head><title> Result </title>
          <link rel="stylesheet" type="text/css" href="user_profile-style.css">
    </head>
    <body>
        <?php
           include ('connectiondb.php');
           $email=$_GET['e'];
           $query1 = "SELECT * FROM USER_RESULT WHERE EMAIL_ID='$email'";
           $query_run1 = mysqli_query($conn,$query1);
        ?>
           <hr/><h1 align=center>Welcome Student</h1><hr/><br/>
   <?php
        echo "<table class=vx cellpadding=10 align=center>
                <tr align=center>
                    <th>QP</th>
                    <th>Sn</th>
                    <th>Marks</th>
                </tr>";
        while($row = mysqli_fetch_array($query_run1)){
        $qp_name = $row[3];
        $subject_name = $row[4];
        $score = $row[5];
        echo "
            <tr align=center>
                 <td>".$qp_name."</td>
                 <td>".$subject_name."</td>
                 <td>".$score."</td>
             </tr>";
      }
        echo "</table>";
?>
        <button class="button1" onclick="window.location.href='subjects.php'">BACK</button>
    </body>
</html>