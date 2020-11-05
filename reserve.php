<?php
include('conn/header.php');
include('conn/nav.php');
if(!isset($_SESSION['cust_login'])){
	header("Location: homepage.php");
}elseif(isset($_SESSION['cust_login'])){

}
?>
         <!-- Start margin -->
         <div class="margin-resume wow fadeIn" data-wow-delay="0.1s"">
			<h3 class="heading-inner">Reservation</h3>
			<div class="hr"></div>
			
             <!-- Start left column -->
             <div class="box-contact col-md-4 col-xs-offset-1">
               <h3 class="heading-inner">Room Reservation Infomation</h3>
                  <div class="hr"></div>
                    <div id="contact-area">
					<form action="reserveinfo.php" method="">
						 <label for="Date">Check In Date:</label>
						 <input type="date" min="<?php echo date("Y-m-d")?>" name="in" class="form-control">
						 
						 <label for="Date">Check Out Date:</label>
						 <input type="date" min="<?php echo date("Y-m-d")?>" name="out" class="form-control">
						 <br>
						 <label for="Name">Room Type:</label>
						 <select name="room_type" id="room_type" class="form-control">
							<?php $result = $mysqli->query("SELECT * FROM rooms ORDER BY rooms_id");
							if ($result->num_rows > 0){
								while ($row = $result->fetch_object()){
							?>
									<option value="<?php echo $row->rooms_id;?>"><?php echo $row->room_type;?></option>
							<?php
							}}
							?>
						 </select>
						 <br>
						 <label for="Name">Total Room:</label>
						 <input type="number" min="1" max="4" value="1" name="total_room" >
						 <br>
						 <input type="submit" class="submit-button" value="Reserve">
			         
					 </form>
		            </div>
                   
             </div>
             <!-- End left column -->
			 
               <!-- Start right image -->
             <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
               <img src="img/3.jpg" alt="img" class="photo-contact"/> 
             </div>
             <!-- End right image -->

         </div>
         <!-- End margin -->


<?php
include('conn/footer.php');
?>