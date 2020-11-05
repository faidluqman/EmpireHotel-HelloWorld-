<?php
include('conn/header.php');
include('conn/nav.php');
?>
	<?php if ($result = $mysqli->query("SELECT * FROM rooms a join picture b where a.room_pic=b.picture_id ORDER BY a.rooms_id")){
		if ($result->num_rows > 0){
			while ($row = $result->fetch_object()){?>
		<!-- Start Room & Rates -->
         <div class="margin-services">
             <div class="col-md-7">
               <div class="first-s">
                <div class="square wow fadeInDown" data-wow-delay=".5s"></div>
               </div>
               <img src="img/<?php echo $row->picture;?>" alt="photo" class="photo-services"/>
             </div>
             <div class="col-md-5">
               <h4 class="heading-services"><?php echo $row->room_type; ?></h4>
			    <h4><b>Price:</b> RM <?php echo $row->room_price; ?></h4>
				<h4><b>Bed(s):</b> <?php echo $row->room_des; ?></h4>
               <p> <?php echo $row->room_info; ?></p>
             </div>
         </div>
         <!-- End Room & Rates -->

	<?php }}} ?>
		 
<?php
include('conn/footer.php');
?>