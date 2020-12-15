<?php
 include('connectiondb.php'); 
 $name = $_GET['n'];
 $id = $_GET['id'];
 $email = $_GET['e'];
 $query1 = "SELECT * FROM  QUESTION_PAPER WHERE QP_ID='$id'";
 $query_run= mysqli_query($conn,$query1);
 $row = mysqli_fetch_array($query_run);
 $qp_name = $row[1];
 $no_of_questions = $row[2];
 $duration=$row[3];
 $subject_id = $row[4];
 if(isset($_POST['button1'])){
    $query2 = "SELECT SUBJECT_NAME FROM SUBJECTS WHERE SUBJECT_ID = '$subject_id'";
    $query_run2 = mysqli_query($conn,$query2);
    $rows = mysqli_fetch_array($query_run2);
    $subject_name = $rows[0];
    $score = "0";
    date_default_timezone_set('Asia/Kolkata');
    $current_time = date('h:i:s');
    $query3 = "INSERT INTO USER_RESULT(START_TIME,EMAIL_ID,QP_NAME,SUBJECT_NAME,SCORE) VALUES('$current_time','$email','$qp_name','$subject_name','$score')";
    $query_run3 = mysqli_query($conn,$query3);
    $query2 = "UPDATE QUESTION_PAPER SET START_TIME='$current_time' WHERE QP_ID='$id'";
    mysqli_query($conn,$query2);
    echo "<script>
        window.location='questions.php?v=$id&count=$no_of_questions&e=$email';
        </script>"; 
 }
?>


<html>
     <head>
        <title> Question Paper Information </title>
        <link rel="stylesheet" type="text/css" href="question-paper-info-style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed&display=swap" rel="stylesheet">
     </head>
     <body>
        <nav>
            <ul>
               <li><a href= "signin-fresh.php">Log out</a></li>
                    <li><a href= "#">Welcome <?php echo $name; ?></a>
                        <ul>
                            <li><a href= "user_profile.php?e=<?php echo $email ?>">Profile</a></li>
                            <li><a href= "signin-fresh.php">Sign in</a></li>
                        </ul>
                    </li>
            </ul>   
        </nav>
    
    <br/><br/><br/><div class="center-text"> <?php echo $qp_name; ?></div>
         <h2>We hope you are prepared to take the test!!! GOOD LUCK</h2>
         <div class = "info-style">
             Number Of Question = <?php echo $no_of_questions; ?>
             <p>Duration = <?php echo $duration; ?> mins </p>
         </div>
         <form action="" method="post">
             <button class="button1" id = "button1" name="button1">START</button>
         </form>
    </body>
</html>