<html>
    <head>
        <title>Student Result</title>
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
            .btn1
            {
                width: 500px;
                height: 50px;
                font-size: 22px;
                padding: 0px;
            }
            .btn
            {
             height: 30px;
             width: 100px;
            }
            .btn:hover
            {
                background-color: green;
            }
            h1
            {
                color: hotpink;
            }
        </style>
    </head>
    <body>
        <h1>Enter Email-id to view result</h1>
        <div class="container">
            <form action="" method="post">
                <input id="email" name="email" type="email" class="btn1" placeholder="Enter email-id" required/>
                <input id="sub" name="sub" type="submit" class="btn" placeholder="SUBMIT"/>                                    
            </form>
            <table>
                <tr>
                    <th>Question paper</th>
                    <th>Subject Name</th>
                    <th>Score</th>
                </tr><br>
                <?php
                include('connectiondb.php');
                 if(isset($_POST['sub'])){
                     $email = $_POST['email'];
                     $query1 = "SELECT * FROM USER_RESULT WHERE EMAIL_ID='$email'";
                     $query_run1 = mysqli_query($conn,$query1);
                     while($row = mysqli_fetch_array($query_run1))
                     {
                        ?>
                <tr>
                        <td> <?php echo $row[3]; ?></td>
                         <td> <?php echo $row[4]; ?></td>
                         <td> <?php echo $row[5]; ?></td>
                    </tr>
                <?php
                    }
                }
                 ?> 
            </table>
        </div>
    </body>
</html>