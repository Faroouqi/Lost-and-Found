<?php include "include/db.php"; ?>
<?php include "include/login_asset.php"; ?>
<?php session_start(); ?>

<?php

 

if($login_username == $username && $login_password== $password  && $username!=NULL ){

      $query1="SELECT * FROM college WHERE college_id=1";
      $select_college=mysqli_query($connection,$query1);
      $row1=mysqli_fetch_assoc($select_college);
      $college_id=$row1['college_id'];

        $_SESSION['user_id']=$user_id;
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['user_image']=$user_image;
        $_SESSION['role']=$role;
        $_SESSION['college_id']=$college_id;
        header("Location:admin");

}
else{
    header("Location:index.php");
}




?>