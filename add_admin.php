<?php
include ('connectiondb.php');
$message="";
 if(isset($_POST['sub'])){
     $admin_id = $_POST['admin_id'];
     $password= $_POST['password'];
     $ins = "SELECT ADMIN_ID FROM ADMIN WHERE ADMIN_ID='$admin_id'";
     $query = mysqli_query($conn,$ins);
     $num = mysqli_num_rows($query);
    if($num > 0){
        $message = "Already exists!! Please enter new Admin-id.";    
    }
    else{
        $data = "INSERT INTO ADMIN(ADMIN_ID,PASSWORD) VALUES('$admin_id','$password')";
        mysqli_query($conn,$data);
        $message = "Added Successfully.";
        echo "<button style='background-color:blue;font-size:20px;height:30px;width:200px;margin:10px;' onclick=window.location.href='admin-edit.php'>Back</button>";
    }
}
?>

<html>
    <head>
        <title> Add New Admin </title>
        <link rel="stylesheet" type="text/css" href="add_admin-style.css">
    </head>
    <body>
        <div class = "add-admin-form">
        <form id = "add-admin-form" name="add-admin" method="post" action="" >
       <br>
       <br>
       <h3 class="no-account">ADD NEW ADMIN-ID AND PASSWORD.</h3>
       <input name = "admin_id" id="admin_id" type="text" class="form-control" placeholder="New Admin Id" required />
        <br>
        <br>
        <input name = "password" id="password" type="password" class="form-control" placeholder="Password" required  />
        <br>
        <br>
        <input name = "sub" id = "sub" type="submit"  class="form-control submit" value="Submit" />
        </form>
            </div>
        <p style='font-size:30px;color:maroon;'> <?php echo $message; ?> </p>
    </body>
</html>