<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>
<style>
    .row{
        margin-top:80px;
    }
    
</style>
<!-- Navigation -->
<?php include "include/navigation.php"; ?>
<!-- Page Content -->
<div class="container mt-5">
    <div class="row">
        <!-- Blog Entries Column -->
        <!-- <div class="col-md-12 border border-warning p-4 mt-4 mb-5"> -->
        <div class="col-md-8 border border-warning p-4 mt-4 mb-5">

            
            
            <?php

if(isset($_GET['category'])){
    $cat_id=$_GET['category'];
}

$query="SELECT * FROM posts WHERE post_category_id=$cat_id";
$select_all_posts_query=mysqli_query($connection,$query);
if(!$select_all_posts_query) {
    
    die("QUERY FAILED" . mysqli_error($connection));
    
}
$count = mysqli_num_rows($select_all_posts_query);

if($count == 0) {
    
    echo "<h1> NO RESULT</h1>";
    
}

while($row=mysqli_fetch_assoc($select_all_posts_query)){
    $post_id = $row['post_id'];
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
        <!-- <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="" style="max-width:100%; max-height:400px;"> -->
        <?php
             if($post_image!=NULL)
             echo "<td><a href='admin/images/.$post_image' target='_blank' >View Image</a></td>";
             ?>
            <hr>
            <p style=" overflow-wrap: break-word;"><?php echo substr($post_content,0,100); ?></p>
            <a class="btn btn-warning" style="font-weight:bold" href="post_read_more.php?post_id=<?php echo $post_id; ?>">🔖 Read More</a>
            
            <hr style=" border: 1px dashed gray" class="mt-5 mb-5 ">
            <?php } ?>
            
            
            
            
            
            

            
            
        </div>
        <?php include "include/sidebar.php"; ?>
    </div>
    <!-- /.row -->

        <hr class="mb-0" style="border: 1px dotted brown; border-radius: 5px;width:100%;">

      

