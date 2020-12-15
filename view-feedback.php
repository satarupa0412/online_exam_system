<html>
    <head><title> View Feedbacks </title>
          <link rel="stylesheet" type="text/css" href="user_profile-style.css">
    </head>
    <body>
        <?php
           include ('connectiondb.php');
           $query1 = "SELECT * FROM FEEDBACK";
           $query_run1 = mysqli_query($conn,$query1);
        ?>
           <hr/><h1 align=center>FEEDBACK</h1><hr/><br/>
   <?php
        echo "<table class=vx cellpadding=10 align=center>
                <tr align=center>
                    <th>Email-Id</th>
                    <th>Name</th>
                    <th>Experience</th>
                    <th>Change in System</th>
                </tr>";
        while($row = mysqli_fetch_array($query_run1)){
        $email_id = $row[0];
        $name = $row[1];
        $experience = $row[2]; 
        $change = $row[3];    
        echo "
            <tr align=center>
                 <td>".$email_id."</td>
                 <td>".$name."</td>
                 <td>".$experience."</td>
                 <td>".$change."</td>
             </tr>";
      }
        echo "</table>";
?>
        <button class="button1" onclick="window.location.href='admin-edit.php'">BACK</button>
    </body>
</html>