<?php
 include('connectiondb.php');
$name="";
$email="";
if(empty($_GET['n']))
    {
       $name = "User";
       $email = $_GET['e'];
    }
   else
   {
       $name = $_GET['n'];
       $email = $_GET['e'];
   }
 $subject_id = $_GET['v'];
 $query1 = "SELECT SUBJECT_NAME FROM SUBJECTS WHERE SUBJECT_ID='$subject_id'";
 $query_run= mysqli_query($conn,$query1);
 $row = mysqli_fetch_array($query_run);
 $subject_name = $row[0];
?>



<html>
<head>
    <title>Question Papers</title>
    <link rel="stylesheet" type="text/css" href="question-paper-style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
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
    
    <br/><br/><br/><div class="center-text"><?php echo $subject_name; ?></div>
    <div class="xyz">
        <?php
       include('connectiondb.php');
       $query = "SELECT * FROM QUESTION_PAPER WHERE SUBJECT_ID = '$subject_id'";
       $result = mysqli_query($conn,$query);
       while($rows= mysqli_fetch_array($result)){
           $id = $rows['QP_ID'];
       ?>          
       <a class="k" href="question-paper-info.php?id=<?php echo $id ?> &n=<?php echo $name ?>&e=<?php echo $email ?>"> <?php echo $rows['qp_name']."  "; ?> </a>
     <?php
       }
            
     ?>
    </div>
   
      
</body>
    
</html>