<?php include "includes/admin_header.php" ?>
    <div id="wrapper">
    <?php include "includes/admin_navigation.php" ?>

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header text-capitalize">
            Hello <?php echo $_SESSION['username']; ?>
            </h1>

            <div>
            <!-- <img src="images/<?php echo $_SESSION['user_image']; ?>" alt="user" style="max-width:300px; max-height:300px; border: 5px solid black;" class="img-circle"> -->
            </div>

        <div style="padding:10px;margin:10px; font-size:30px;color:black">
            Username : <?php echo $_SESSION['username']; ?>
        </div>

        <div style="padding:10px;margin:10px; font-size:30px;color:black">
            Email : <?php echo $_SESSION['email']; ?>
        </div>

        <div style="padding:10px;margin:10px; font-size:30px;color:black">
            Role : <?php echo $_SESSION['role']; ?>
        </div>


    <div class="col-xs-6">
    <?php include "includes/admin_footer.php" ?>
