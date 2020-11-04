<?php
include('conn/header.php');
include('conn/nav.php');
 ?>
<div class="container">
  <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Our
                        <strong>Rooms</strong>
                    </h2>
                    <hr>
                </div>
				<?php
				if ($result = $mysqli->query("SELECT * FROM rooms a join picture b where a.room_pic=b.picture_id ORDER BY a.rooms_id"))
                {
			    if ($result->num_rows > 0)
                {
				while ($row = $result->fetch_object())
                {
				?>
                <div class="col-lg-4  text-center">
                    <img class="img-responsive" src="img/<?php echo $row->picture;?>" alt="">
                    <h3><?php echo $row->room_type; ?></h3>
					<p><?php echo $row->room_des; ?></p>
					<p>RM <?php echo $row->room_price; ?>.00</p>
					
					<br>
					<a href="room_info.php?rooms_id=<?php echo $row->rooms_id; ?>" class="btn btn-default btn-lg">Read More</a>
					<hr>
                </div>
				<?php
				}}}
				?>
				
                <div class="clearfix"></div>
            </div>
        </div>
</div>
 <?php
include('conn/footer.php');
?>