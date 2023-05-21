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
                        <th>Comment</th>
                        <th>Author</th>
                        <th>Email</th>
                        <th>Post</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Approve</th>
                        <th>Unapprove</th>
                        <th>Delete</th>
                    </tr>
                </thead>

            <tbody>
            <?php
            $author=$_SESSION['username'];
        $query="SELECT * FROM comments,posts WHERE posts.post_author='$author' AND comments.comment_post_id=posts.post_id ";
        $select_comments=mysqli_query($connection,$query);

        while($row=mysqli_fetch_assoc($select_comments)){
            $comment_id=$row['comment_id'];
            $comment_content=$row['comment_content'];
            $comment_author=$row['comment_author'];
            $comment_email=$row['comment_email'];
            $comment_post_id=$row['comment_post_id'];
            $comment_date=$row['comment_date'];
            $comment_status=$row['comment_status'];

            echo "<tr>";
                echo "<td>$comment_id</td>";
                echo "<td>$comment_content</td>";
                echo "<td>$comment_author</td>";
                echo "<td>$comment_email</td>";

                $query="SELECT * FROM posts WHERE post_id=$comment_post_id ";
                $select_post=mysqli_query($connection,$query);
                $row=mysqli_fetch_assoc($select_post);
                $post_title=$row['post_title'];
                echo "<td>$post_title</td>";


                echo "<td>$comment_date</td>";
                echo "<td>$comment_status</td>";

                echo "<td><a href='comments.php?approve={$comment_id}' style='color:green;'>Approve</a></td>";
                echo "<td><a href='comments.php?unapprove={$comment_id}' style='color:orange;'>Unapprove</a></td>";
                echo "<td><a href='comments.php?delete={$comment_id}' style='color:red;'>Delete</a></td>";
            echo "</tr>";
        }

    ?>
            </tbody>


            </table>

                <?php
                if(isset($_GET['delete'])){
                $delete_id=$_GET['delete'];
                $query="DELETE FROM comments WHERE comment_id={$delete_id}";
                $delete_result=mysqli_query($connection,$query);
                header("Location: comments.php");

                }
                if(isset($_GET['approve'])){
                    $comment_id=$_GET['approve'];
                    $query="UPDATE comments SET comment_status='approve' WHERE comment_id={$comment_id}";
                    $approve_result=mysqli_query($connection,$query);
                    header("Location: comments.php");
                }
                if(isset($_GET['unapprove'])){
                    $comment_id=$_GET['unapprove'];
                    $query="UPDATE comments SET comment_status='unapprove' WHERE comment_id={$comment_id}";
                    $unapprove_result=mysqli_query($connection,$query);
                    header("Location: comments.php");
                }





                ?>


    <div class="col-xs-6">
    <?php include "includes/admin_footer.php" ?>
