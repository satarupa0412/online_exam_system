<?php
include('connectiondb.php');
 $email="";
    if(empty($_GET['v']))
    {
       $name = "User";
    }
   else
   {
       $email = $_GET['v'];
       $query1 = "SELECT NAME FROM STUDENT WHERE EMAIL_ID='$email'";
       $query_run= mysqli_query($conn,$query1);
       $row = mysqli_fetch_array($query_run);
       $fullname = $row[0];
       $spacePos = strpos($fullname,' ');
       if(strpos($fullname,' ')){
           $name = substr($fullname,0,$spacePos);
       }
       else{
           $name = $fullname;
       }
   }
  
?>


<html>
    <head>
        <title> Subjects </title>
<link rel="stylesheet" type="text/css" href="subjects_style.css">
        </head>
    <body>
        <header>
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
        </header>
        <h1>Subjects</h1><br/><br/>
        <div class="xyz">
        <?php
       include('connectiondb.php');  
       $query = "SELECT * FROM SUBJECTS";
       $result = mysqli_query($conn,$query);
       while($rows= mysqli_fetch_array($result)){
           $id = $rows['subject_id'];
       ?>
       <a class="k" href="question-paper.php?v=<?php echo $id ?>&n=<?php echo $name ?>&e=<?php echo $email ?>"> <?php echo $rows['subject_name']." "; ?> 
           </a>
     <?php
       }
            
     ?>
    </div>
    </body>
    
</html>