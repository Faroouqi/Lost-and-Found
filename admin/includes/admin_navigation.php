<!-- Navigation -->
<?php
            $query="SELECT * FROM posts ORDER BY post_id DESC";
            $select_all_posts_query=mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc($select_all_posts_query)){
                $post_id=$row['post_id'];
                $post_title=$row['post_title'];
                $post_author=$row['post_author'];
                $post_date=$row['post_date'];
                $post_image=$row['post_image'];
                $post_content=$row['post_content'];
            }
                ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Blog Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <li><a href="../home.php">Home</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li>
                            <a href='index.php?logout={$_SESSION["username"]}'><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>

                                <?php
                                    if(isset($_GET['logout'])){
                                        session_destroy();
                                        header("Location: ../index.php");
                                    }
                                ?>
                    </ul>
                </li>
            </ul>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php" class="active"><i class="fa fa-fw fa-dashboard active"></i> Dashboard</a>
                    </li>

                    <!-- <li>
                        <a href="./profile.php"><i class="fa fa-fw fa-id-card-alt"><strong class="fas fa-male"></strong></i> Profile</a>
                    </li> -->

                    <!-- <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-arrows-v"></i> Categories</a>
                    </li> -->

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-paste-v"><i class="fas fa-paste"></i></i></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./posts.php">View all Posts</a>
                            </li>
                            <li>
                                <a href="./new_post.php">Add Posts</a>
                            </li>
                        </ul>
                    </li>

                
                    <li class="">
                        <a href="./comments.php"><i class="fa fa-fw fa-comments"></i> Comments</a>
                    </li>
                       

                    <!-- <li class="">
                        <a href="./comments.php"><i class="fa fa-fw fa-comments"></i> Comments</a>
                    </li> -->

                    <!-- <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdn"><i class="fa fa-fw fa-male-v"><p class="fas fa-users"></p></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdn" class="collapse">
                            <li>
                                <a href="./users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="./new_user.php">Add Users</a>
                            </li>
                        </ul>
                    </li> -->

                    <!-- <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdn1"><i class="fa fa-fw fa-tasks"></i> Events <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdn1" class="collapse">
                            <li>
                                <a href="./events.php">View All Events</a>
                            </li>
                            <li>
                                <a href="./add_event.php">Add Event</a>
                            </li>
                        </ul>
                    </li> -->




                </ul>
            </div>



            <!-- /.navbar-collapse -->
        </nav>
