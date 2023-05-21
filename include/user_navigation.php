<?php include "include/db.php"; ?>



<?php

      $query="SELECT * FROM college";
      $select_college=mysqli_query($connection,$query);

      $row=mysqli_fetch_assoc($select_college);
      $college_logo=$row['college_logo'];
      $college_shortname=$row['college_shortname'];

      
?>






<nav class="navbar fixed-top navbar-expand-lg navbar-light pl-5 mb-5" style="background-color:#fbe4a6;" role="navigation">
<a class="navbar-brand " style="color:black;font-weight:bold" href="index.php"><img src="./images/<?php echo $college_logo; ?>" width="45" height="45" class="d-inline-block align-top ml-5" alt=""></a>
        <a class="navbar-brand " style="color:black;font-weight:bold" href="index.php"><?php echo $college_shortname; ?> BLOG</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>


            <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">

                <li><a class='nav-item nav-link font-weight-bold mr-2' style='color:#763626;' href='user_about.php'>ABOUT US</a></li>
                <li><a class='nav-item nav-link font-weight-bold mr-2' style='color:#763626;' href='user_clubs.php'>COLLEGE CLUBS</a></li>
                <li><a class='nav-item nav-link font-weight-bold mr-2' style='color:#763626;' href='user_contact.php'>CONTACT</a></li>
                <li><a class='nav-item nav-link font-weight-bold mr-2' style='color:#763626;' href='user.php'>HOME</a></li>
            
                </ul>
            </div>


            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
