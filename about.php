<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>


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

      $query="SELECT * FROM college";
      $select_college=mysqli_query($connection,$query);

      $row=mysqli_fetch_assoc($select_college);

      $college_id=$row['college_id'];
      $college_name=$row['college_name'];
      $college_logo=$row['college_logo'];
      $college_address=$row['college_address'];
      $college_city=$row['college_city'];
      $college_pin=$row['college_pin'];
      $college_phone=$row['college_phone'];
      $college_nirf=$row['college_nirf'];
      $college_arch_nirf=$row['college_arch_nirf'];
      $college_ariia=$row['college_ariia'];
      $college_vision=$row['college_vision'];
      $college_mission=$row['college_mission'];
      $college_director=$row['college_director'];
      $college_about=$row['college_about'];
      $college_shortname=$row['college_shortname'];
      $college_site=$row['college_site'];

?>



<?php
// <--!-- Navigation -->


     include "include/navigation.php"; 



?>

    <!-- Page Content -->
    <div class="container mt-5">

        <div class="row mt-5">

<div class="col-md-8 border border-warning p-4 mt-5 pt-5 mb-5">


        <h1 class="text-center"><?php echo $college_name; ?></h1>

        <div class="text-center">
        <img class="mx-auto" src="images/<?php echo $college_logo; ?>" style="max-height:250px; max-width:1500px">
        </div>


        <hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-5">
        <h3 style="color:black"> DIRECTOR IN CHARGE</h3>
        <h4 class="text-left" style="color:brown"> <?php echo $college_director; ?></h4>

        <hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-5">
        <h3 style="color:black">ABOUT US</h3>
        <p class="text-left"><?php echo $college_about; ?></p>

        <hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-5">
        <h3 style="color:black">OUR VISION</h3>
        <p class="text-left"><?php echo $college_vision; ?></p>


        <hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-5">
        <h3 style="color:black">OUR MISSION</h3>
        <p class="text-left"><?php echo $college_mission; ?></p>


        <hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-5">
        <h3 style="color:black">RANKINGS</h3>
        <h5 class="text-left">NIRF : <?php echo $college_nirf; ?></h5>
        <h5 class="text-left">ARCHITECTURE NIRF : <?php echo $college_arch_nirf; ?></h5>
        <h5 class="text-left">ARIIA : <?php echo $college_ariia; ?></h5>





</div>










<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4 p-4  mb-5">

<!-- Login-->
<!-- <div class="well border border-warning p-4 mb-4 mt-4" style="background-color:#fbf2e6">
<a href="./admin/">Dashboard</a>
     
       <!-- /.input-group -->
   </div> 



   <!-- Side Widget Well -->
   <!-- <?php include "include/widget.php"; ?> -->


        <!-- /.row -->

        <hr class="mb-0" style="border: 1px dotted brown; border-radius: 5px;width:100%;">

      