<?php include "../../include/db.php"; ?>
<!-- <?php include "../../include/header.php"; ?> -->
<?php
$connection=mysqli_connect('localhost','root','','cms');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home </title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <link href="./css/blog-home.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<style>
        body{
        background-color: #fff9e7;
        }

</style>
</head>
<body>
<!-- Navigation -->
<!-- <?php include "../../includes/navigation.php"; ?> -->
    <!-- Page Content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-12 border border-warning p-4 mt-5 mb-5">


            <?php

            if(isset($_GET['post_id'])){
                $post_id=$_GET['post_id'];
            }

            $query="SELECT * FROM posts WHERE post_id=$post_id";
            $select_all_posts_query=mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc($select_all_posts_query)){
                $post_title=$row['post_title'];
                $post_author=$row['post_author'];
                $post_date=$row['post_date'];
                $post_image=$row['post_image'];
                $post_content=$row['post_content'];

                ?>
            <h1 class="page-header text-uppercase">
            <?php echo $post_title ?>
            </h1>
            <hr class="mb-0">

            <!-- First Blog Post -->
            <p class="lead mb-0 mt-0 text-capitalize"">
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p>⏰ <?php echo $post_date; ?></p>
            <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="" style="max-width:100%; max-height:400px;">
            <hr>
            <p style=" overflow-wrap: break-word;"><?php echo $post_content; ?></p>

            <hr style=" border: 1px dashed gray" class="mt-5 mb-5 ">
         <?php } ?>







                <!-- Comments Form -->
                <div class="well pt-4">
                    <h4>Leave a Comment:</h4>

                    <form action="#" method="post" role="form">

                        <div class="form-group">
                            <input type="text" class="form-control" name="comment_author" placeholder="Author" ></input>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="comment_email" placeholder="Email id"></input>
                        </div>


                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Leave a comment" name="comment"></textarea>
                        </div>


                        <button type="submit" class="btn btn-warning" name="create_comment">Submit</button>
                    </form>
                </div>



<?php
if(isset($_POST['create_comment']))
{

$comment_post_id=$_GET['post_id'];
$comment_author= $_POST['comment_author'];
$comment_email= $_POST['comment_email'];
$comment_content= $_POST['comment'];
$comment_status='unapproved';

$query="INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_date,comment_status) VALUES ($comment_post_id,'$comment_author','$comment_email','$comment_content',now(),'$comment_status')";
$result=mysqli_query($connection,$query);

if(!$result){
    die('Failed'.mysqli_error($connection));
}
$comment_post_id=$_GET['post_id'];
$query2="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$comment_post_id";
$increase_comment=mysqli_query($connection,$query2);

}

?>

<hr class="mt-4">
<h4 class='mb-4' style="color: Brown;">Comments:</h4>



    <?php
        $query="SELECT * FROM comments WHERE comment_post_id=$post_id AND comment_status='approve' ORDER BY comment_id DESC";
        $select_comments_for_post=mysqli_query($connection,$query);

        while($row=mysqli_fetch_assoc($select_comments_for_post)){
            $comment_content=$row['comment_content'];
            $comment_author=$row['comment_author'];
            $comment_date=$row['comment_date'];
    ?>



                <!-- Posted Comments -->
                <!-- Comment -->
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading ml-2" ">💬 <?php echo $comment_author; ?>
                        <small stye="color:gray;"><?php echo $comment_date; ?></small>
                        </h4>
                        <p class="ml-5" style="font-size:18px;"><?php echo $comment_content; ?></p>
                    </div>
                </div>


        <?php } ?>




        </div>
        </div>
        <!-- /.row -->

        <hr class="mb-0" style="border: 1px dotted brown; border-radius: 5px;width:100%;">

        <!-- <?php
        include "../../includes/footer.php";
        ?> -->


