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

    $post_title=$_POST['post_title'];
    $post_category_id=$_POST['post_category_id'];
    $author_id=$_SESSION['user_id'];
    $post_author=$_SESSION['username'];

    $post_image=$_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];

    $post_status='published';
    $post_content=$_POST['post_content'];
    $post_date=date('d-m-y');


    $post_tags=$_POST['post_tags'];

    move_uploaded_file($post_image_temp,"images/.$post_image");
    //move_uploaded_file($file_tmp,"./pdf/".$file_name);

    $query="INSERT INTO posts(post_title,post_category_id,author_id,post_author,post_date,post_image,post_content,post_tags,post_status) VALUES ('{$post_title}',{$post_category_id},$author_id,'{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    $add_post=mysqli_query($connection,$query);


    if(!$add_post){
        die("Failed".mysqli_error($connection));
    }

}


?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title">
</div>

<div class="form-group">
    <label for="post_category">Post Category Id</label><br>
    <select name="post_category_id">

    <?php

     $query="SELECT * FROM categories";
     $select_categories=mysqli_query($connection,$query);

     while($row=mysqli_fetch_assoc($select_categories)){
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
        echo "<option value='{$cat_id}'>$cat_title</option>";
     }
    ?>


    </select>
</div>


<div class="form-group">
<label for="image">Post Image</label>
<input type="file" name="post_image" class="form-control" accept=".jpg" title="Upload PDF"/>
    
    <!-- <input type="file" name="post_image"> -->
</div>

<div class="form-group">
    <label for="content">Post Content</label>
    <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>

<div class="form-group">
    <!-- <label for="tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags"> -->
    <label for="tags">Post Tag</label><br>
    <select name="post_tags">

    <?php
        echo "<option value='LOST'>LOST</option>";
        echo "<option value='FOUND'>FOUND</option>";
     
    ?>


    </select>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Add Post">
</div>

</form>



        </div></div></div></div>
        <div class="col-xs-6">
        <?php include "includes/admin_footer.php" ?>
