 <!-- Footer -->
 <footer>
            <div class="row">
                <div class="col-lg-12">
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

<?php

      $query="SELECT * FROM college";
      $select_college=mysqli_query($connection,$query);

      $row=mysqli_fetch_assoc($select_college);

      $college_id=$row['college_id'];
      $college_name=$row['college_name'];
      $college_logo=$row['college_logo'];
      $college_address=$row['college_address'];
      $college_city=$row['college_city'];
      $college_pin=$row['college_pin'];
      $college_phone=$row['college_phone'];
      $college_nirf=$row['college_nirf'];
      $college_arch_nirf=$row['college_arch_nirf'];
      $college_ariia=$row['college_ariia'];
      $college_vision=$row['college_vision'];
      $college_mission=$row['college_mission'];
      $college_director=$row['college_director'];
      $college_about=$row['college_about'];

?>










<footer class="ftco-footer ftco-bg-dark ftco-section pt-4 pb-0 mb-0" style="background:#ddbc95">
      <div class="container">
        <div class="row mb-5">



        <div class="col-md-6 col-lg-3 mb-0">
            <div class="ftco-footer-widget mb-4">

              <h2 class="ftco-heading-2"><?php echo $college_name; ?></h2>
              <img src="./images/<?php echo $college_logo; ?>" style="max-height:150px; max-width:150px">

            </div>
          </div>


          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Rankings</h2>
             <p>NIRF : <?php echo $college_nirf; ?></p>
             <p>Architecture NIRF : <?php echo $college_arch_nirf; ?></p>
             <p>ARIIA Rank : <?php echo $college_ariia; ?></p>
             
            </div>
          </div>



          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Address Details</h2>
             <p><?php echo $college_address; ?></p>
             <p><?php echo $college_city; ?></p>
             <p><?php echo $college_pin; ?></p>
             <p>Phone: <?php echo $college_phone; ?></p>
            </div>
          </div>



          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Newsletter</h2>
            	<p>Join our Newsletter for daily updates.</p>
              <form action="#" class="subscribe-form" method="post">
                <div class="form-group">
                  <input type="email" class="form-control mb-2 text-center" placeholder="Enter email address" name="email">
                  <input type="submit" value="Subscribe" class="form-control submit px-3 border border-warning" name="subscribed">
                </div>
              </form>
            </div>
          </div>


          <?php

            if(isset($_POST['subscribed'])){
              $email=$_POST['email'];
              $query="INSERT INTO subscriber(college_id,email) VALUES($college_id,'$email')";
              $new_subscriber=mysqli_query($connection,$query);

              if(!$new_subscriber){
                die("Failed".mysqli_error($connection));
            }

            
            }

          ?>






        </div>


        <div class="row">
          <div class="col-md-12 text-center">
          </div>
        </div>

      </div>
    </footer>

