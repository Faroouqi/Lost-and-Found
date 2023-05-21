<?php include "includes/admin_header.php"; ?>

<style>
.flex-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}
@media (max-width: 800px) {
  .flex-container {
    flex-direction: column;
  }
}
.flex-item{
    border:4px solid;
    padding:10px;
    margin:10px;
    background:black;
    width: 275px;
}
.count{
  font-weight:bold;
  color:white;

}

</style>



    <div id="wrapper">
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12 ">
                        <!-- <h1 class="page-header " >
                            WELCOME TO ADMIN
                            <small class="text-capitalize"><?php echo $_SESSION['username']; ?></small>
                        </h1> -->
                    </div>
                </div>
                <!-- /.row -->

<?php

$post_count=0;
$comment_count=0;
$categories_covered=0;
$username=$_SESSION['username'];

$query="SELECT * FROM posts WHERE post_author='$username'";
$get_counts=mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($get_counts)){
    $post_count=$post_count+1;
    $comment_count=$comment_count + $row['post_comment_count'];
}


$query2="SELECT DISTINCT post_category_id FROM posts WHERE post_author='$username'";
$get_categories=mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($get_categories)){
    $categories_covered=$categories_covered+1;
}

?>



<div class="flex-container">

<div class="card flex-item" style="border-left-color:#753a88 ; border-bottom-color:#753a88 ;  border-top-color:#cc2b5e ; margin-right: 148px ; border-right-color:#cc2b5e ;">
  <img src="images/post_count.png" width="250px" class="card-img-top" alt="...">
  <h1 class="count text-center"><?php echo $post_count; ?></h1>
</div>

<div class="card flex-item" style="border-left-color:#185a9d ; border-bottom-color:#185a9d ;  border-top-color:#43cea2 ;  border-right-color:#43cea2 ;   ">
  <img src="images/comment_count.png" width="250px" class="card-img-top" alt="...">
  <h1 class="count text-center"><?php echo $comment_count; ?></h1>
</div>

<!-- <div class="card flex-item" style="border-left-color:#dd2476 ; border-bottom-color:#dd2476 ;  border-top-color:#ff512f ;  border-right-color:#ff512f ;">
  <img src="images/catogories_count.png" width="250px" class="card-img-top" alt="...">
  <h1 class="count text-center"><?php echo $categories_covered; ?></h1>
</div> -->



</div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php"; ?>