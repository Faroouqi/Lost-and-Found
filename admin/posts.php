<?php include "includes/admin_header.php" ?>
    <div id="wrapper">
    <?php include "includes/admin_navigation.php" ?>

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

            <!-- <h1 class="page-header">
                Welcome to admin
                <small class="text-capitalize"><?php echo $_SESSION['username']; ?></small>
            </h1> -->



            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>File</th>
                        <!-- <th>File</th> -->
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>

            <tbody>
            <?php

        $author=$_SESSION['username'];
        $query="SELECT * FROM posts WHERE post_author='$author' ORDER BY post_id DESC";
        $select_posts=mysqli_query($connection,$query);

        while($row=mysqli_fetch_assoc($select_posts)){
            $post_id=$row['post_id'];
            $post_title=$row['post_title'];
            $post_category_id=$row['post_category_id'];
            $post_author=$row['post_author'];
            $post_image=$row['post_image'];
            $post_tags=$row['post_tags'];



            $post_comment_count=$row['post_comment_count'];



            $post_date=$row['post_date'];

            echo "<tr>";
                echo "<td>$post_id</td>";
                echo "<td>$post_title</td>";

                $query="SELECT * FROM categories WHERE cat_id=$post_category_id";
                $select_categories=mysqli_query($connection,$query);
                $row=mysqli_fetch_assoc($select_categories);
                $cat_title=$row['cat_title'];

                echo "<td>$cat_title</td>";



                echo "<td>$post_author</td>";
                  echo "<td>$post_image</td>";
                 echo "<td><a href='images/.$post_image' target='_blank' >Download</a></td>";
                // echo "<td>$post_tags</td>";
                echo "<td>$post_comment_count</td>";
                echo "<td>$post_date</td>";
                echo "<td><a href='posts.php?delete={$post_id}' style='color:red;'>Delete</a></td>";
            echo "</tr>";
        }

    ?>
            </tbody>


            </table>

                    <!-- TO DELETE -->
                <?php
                if(isset($_GET['delete'])){
                $delete_id=$_GET['delete'];
                $query="DELETE FROM posts WHERE post_id={$delete_id}";
                $delete_result=mysqli_query($connection,$query);
                header("Location: posts.php");

                }
                ?>


    <div class="col-xs-6">
    <?php include "includes/admin_footer.php" ?>
