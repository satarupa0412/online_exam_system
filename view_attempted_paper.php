<html>
    <head><title> View Attempted Paper with answers </title>
          <link rel="stylesheet" type="text/css">
        <style>
        body
            {
                background-color: palegoldenrod;
            }
            table,th,td
            {
                border: 2px solid black;
                width:500px;
                background-color: lightcyan;
            }
            .button1
            {
                height: 30px;
                width: 200px;
                font-size: 15px;
                background-color: chocolate;
                font-weight: bold;
                margin-left: 42%;
            }
            .button1:hover
            {
                cursor: pointer;
                background-color: green;
            }
        </style>
    </head>
    <body>
        <?php
           include ('connectiondb.php');
           $qp_id = $_GET['v']; 
           $query1 = "SELECT * FROM QUESTIONS WHERE QP_ID='$qp_id'";
           $query_run1 = mysqli_query($conn,$query1);
        ?>
           <hr/><h1 align=center>Attempted Question Paper with correct answers.</h1><hr/><br/>
   <?php
        echo "<table class=vx cellpadding=10 align=center>
                <tr align=center>
                    <th>Question no.</th>
                    <th>Question</th>
                    <th>Correct answer</th>
                </tr>";
        while($row = mysqli_fetch_array($query_run1)){
        $qno = $row[0];
        $question = $row[2];
        $answer = $row[7];     
        echo "
            <tr align=center>
                 <td>".$qno."</td>
                 <td>".$question."</td>
                 <td>".$answer."</td>
             </tr>";
      }
        echo "</table>";
?>
        <button class="button1" onclick="window.location.href='subjects.php'">Subjects Page</button>
    </body>
</html>