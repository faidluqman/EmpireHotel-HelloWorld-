<?php
include('conn/header.php');
include('conn/nav.php');
 ?>
 <div class="container">
        <div class="row">
            <div class="box">
			<?php
				if ($result = $mysqli->query("SELECT * FROM rooms a join picture b where a.room_pic=b.picture_id AND a.rooms_id=$_GET[rooms_id] ORDER BY a.rooms_id"))
                {
			    if ($result->num_rows > 0)
                {
				while ($row = $result->fetch_object())
                {
					
				?>
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">About
                        <strong><?php echo $row->room_type;?></strong>
                    </h2>
                    <hr>
                </div>
				 <div class="col-lg-12 text-center">
                    <img class="img-responsive img-border img-full" src="img/<?php echo $row->picture;?>" alt="">
                    <h2><?php echo $row->room_type;?>
                    </h2>
                    <p><?php echo $row->room_info;?></p>
                   
                    <hr>
                </div>
				<?php
				}}}
				?>
			 </div>
        </div>		
	</div>
 
 
 
 <?php
include('conn/footer.php');
?>