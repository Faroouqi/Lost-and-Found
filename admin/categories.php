<?php include "includes/admin_header.php" ?>
    <div id="wrapper">
    <?php include "includes/admin_navigation.php" ?>


<!-- important functions -->
<?php

function insert_categories(){

global $connection;

    if(isset($_POST['submit'])){

        $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)) {

         echo "This Field should not be empty";

}else {
$stmt = mysqli_prepare($connection, "INSERT INTO categories(cat_title) VALUES(?) ");
mysqli_stmt_bind_param($stmt, 's', $cat_title);
mysqli_stmt_execute($stmt);

    if(!$stmt) {
    die('QUERY FAILED'. mysqli_error($connection));
              }

mysqli_stmt_close($stmt);
    }
   }
}
?>



<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">


            <h1 class="page-header">
                Welcome to admin
                <small class="text-capitalize"><?php echo $_SESSION['username']; ?></small>
            </h1>


            <div class="col-xs-6">
            <?php insert_categories();  ?>

    <form action="" method="post">
      <div class="form-group">
         <label for="cat-title">Add Category</label>
          <input type="text" class="form-control" name="cat_title">
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
      </div>

    </form>


    </div>

    <div class="col-xs-6">
            <?php
                $query="SELECT * FROM categories";
                $select_categories=mysqli_query($connection,$query);
            ?>


    <table class="table  table-striped table-dark">
        <thead>
            <tr class="bg-primary">
                <th >Id</th>
                <th>Category Title</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                <?php
                while($row=mysqli_fetch_assoc($select_categories)){
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];

                echo "<tr>";
                echo "<td>$cat_id</td>";
                echo "<td>$cat_title</td>";
                echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                echo "</tr>";
                }
                ?>
        </tbody>
    </table>

    <?php
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $query="DELETE FROM Categories WHERE cat_id={$delete_id}";
        $delete_result=mysqli_query($connection,$query);
        header("Location: categories.php");

    }
    ?>
    <?php include "includes/admin_footer.php" ?>
