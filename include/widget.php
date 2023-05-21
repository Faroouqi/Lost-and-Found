<div class="well border border-warning p-4 mb-3 mt-3" style="background-color:#fbf2e6"">
<h4>Upcoming Events</h4>
<hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-2">





<?php
      $query1="SELECT * FROM college WHERE college_id=1";
      $select_college=mysqli_query($connection,$query1);
      $row1=mysqli_fetch_assoc($select_college);
      $college_id=$row1['college_id'];
      

            $query="SELECT * FROM events WHERE college_id=$college_id AND `event_date`>=CURDATE() ORDER BY event_id DESC";
            $select_all_events=mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc($select_all_events)){
                $event_id = $row['event_id'];
                $event_title=$row['event_title'];
                $event_date=$row['event_date'];
                $organizer_id=$row['organizer_id'];

                $event_date = strtotime($event_date);
                $date=(date("d-M-Y","$event_date"));
                


                $query2="SELECT * FROM clubs WHERE club_id=$organizer_id";
                $get_club=mysqli_query($connection,$query2);
                $row2=mysqli_fetch_assoc($get_club);
                $club_shortname=$row2['club_shortname'];

                ?>



            <h6 class="text-left mt-4 mb-0" style="font-weight:bold;"><?php echo $event_title; ?></h6>
            <p class="text-left mt-0 mb-0">Organizer: <?php echo $club_shortname; ?></p>
            <p class="mt-0 pt-0 mb-0">DATE: <span style="font-style:italic; color:blue;" class="mt-0 pt-0"> <?php echo $date; ?></span></p>


            <?php } ?>





</div>