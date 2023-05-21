<?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>
 <style>
 .row{
        margin-top:80px;
    }
</style>

    <!-- Navigation -->
    <?php  include "include/navigation.php"; ?>
    <!-- <?php include "include/carousel.php"; ?> -->
    <div class="container">
        <div class="row">

            <div class="col-md-8 border border-warning p-4 mt-4 mb-5">

               <?php

            if(isset($_POST['submit'])){

            $search = $_POST['search'];

            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ORDER BY post_id DESC ";
            $search_query = mysqli_query($connection, $query);

            if(!$search_query) {

                die("QUERY FAILED" . mysqli_error($connection));

            }

            $count = mysqli_num_rows($search_query);

            if($count == 0) {

                echo "<h1> NO RESULT</h1>";

            } else {

    while($row = mysqli_fetch_assoc($search_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];

        ?>

           <h1 class="page-header">
                <?php echo $post_title ?>
            </h1>
            <hr class="mb-0">

                <p class="lead mb-0 mt-0">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p>⏰ <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="admin/images/<?php echo $post_image;?>" style="max-width:100%; max-height:400px;" alt="">
                <hr>
                <p><?php echo substr($post_content,0,200);?></p>
                <a class="btn btn-warning" style="font-weight:bold" href="post_read_more.php?post_id=<?php echo $post_id; ?>">🔖 Read More</a>

                <hr style=" border: 3px dashed orange; border-radius: 5px;width:100%;" class="mb-5 mt-5">


   <?php }

            }
            }


?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php";?>

        </div>
        <!-- /.row -->
        <hr>


