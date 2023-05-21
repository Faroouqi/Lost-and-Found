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




<!-- PHP CODE -->
<?php
if(isset($_POST['create_post'])){

    $Author=$_POST['Author'];
    //$post_category_id=$_POST['post_category_id'];
    $email_id=$_POST['Email-id'];
    $comment_id=$_SESSION['user_id'];
    ///$post_author=$_SESSION['username'];

    // $post_image=$_FILES['post_image']['name'];
    // $post_image_temp=$_FILES['post_image']['tmp_name'];

    // $post_status='published';
    $Comment=$_POST['Comment'];
    $post_date=date('d-m-y');


    // $post_tags=$_POST['post_tags'];

   // move_uploaded_file($post_image_temp,"images/$post_image");

    $query="INSERT INTO comments(comment_author,comment_email,comment_id,comment_date,comment_content) VALUES ('{$Author}',{$email_id},$comment_id,now(),'{$Comment}')";
    $add_comment=mysqli_query($connection,$query);


    if(!$add_comment){
        die("Failed".mysqli_error($connection));
    }

}


?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Author</label>
    <input type="text" class="form-control" name="Author">
</div>

<div class="form-group">
    <label for="tags">Email-Id</label>
    <input type="text" class="form-control" name="Email-id">
</div>
<div class="form-group">
    <label for="content">Comment</label>
    <textarea type="text" class="form-control" name="Comment" id="" cols="30" rows="10"></textarea>
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Add Comment">
</div>

</form>



        </div></div></div></div>
        <div class="col-xs-6">
        <?php include "includes/admin_footer.php" ?>
