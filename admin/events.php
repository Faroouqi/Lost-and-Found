<?php include "includes/admin_header.php" ?>
    <div id="wrapper">
    <?php include "includes/admin_navigation.php" ?>

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header">
                Welcome to admin
                <small class="text-capitalize"><?php echo $_SESSION['username']; ?></small>
            </h1>



            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>Id</th>
                        <th>Event</th>
                        <th>Organizing Club</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>

            <tbody>
            <?php

        $query="SELECT * FROM events ORDER BY event_id DESC";
        $select_events=mysqli_query($connection,$query);

        while($row=mysqli_fetch_assoc($select_events)){
            $event_id=$row['event_id'];
            $event_title=$row['event_title'];


            $organizer_id=$row['organizer_id'];
            $query1="SELECT * FROM clubs WHERE club_id=$organizer_id";
            $select_club=mysqli_query($connection,$query1);
            $row1=mysqli_fetch_assoc($select_club);
            $club_shortname=$row1['club_shortname'];

            $date=$row['event_date'];
            $date = strtotime($date);
            $event_date=(date("d-m-Y","$date"));


            echo "<tr>";
                echo "<td>$event_id</td>";
                echo "<td>$event_title</td>";
                echo "<td>$club_shortname</td>";
                echo "<td>$event_date</td>";
                echo "<td><a href='events.php?delete={$event_id}' style='color:red;'>Delete</a></td>";
            echo "</tr>";
        }

    ?>
            </tbody>


            </table>

                    <!-- TO DELETE -->
                <?php
                if(isset($_GET['delete'])){
                $delete_id=$_GET['delete'];
                $query="DELETE FROM events WHERE event_id={$delete_id}";
                $delete_result=mysqli_query($connection,$query);
                header("Location: events.php");

                }
                ?>


    <div class="col-xs-6">
    <?php include "includes/admin_footer.php" ?>
