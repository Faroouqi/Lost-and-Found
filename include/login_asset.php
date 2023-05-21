<?php
if(isset($_POST['login'])){
    $login_username=$_POST['username'];
    $login_password=$_POST['password'];

    // encrypt password
    //$login_password=crypt($login_password, '$2a$07$hashsomesillypasswordforsafety$');

    // To prevent sql injection
    $login_username=mysqli_real_escape_string($connection,$login_username);
    $login_password=mysqli_real_escape_string($connection,$login_password);

    $query="SELECT * FROM users WHERE username='$login_username' ";
    $user_select=mysqli_query($connection,$query);

    if(!$user_select){
        die("Query Failed".mysqli_error($connection));
        header("Location:index.php");
    }



    While($row=mysqli_fetch_array($user_select)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $email=$row['email'];
        $password=$row['password'];
        $user_image=$row['user_image'];
        $role=$row['role'];

        if(!$user_id){
            die("Query Failed".mysqli_error($connection));
            header("Location:index.php");
        }
    } 
}