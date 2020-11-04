<?php
include('conn/header.php');
include('conn/nav.php');
 ?>
 <div class="container">
  <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Reserve
                        <strong>Rooms</strong>
                    </h2>
                    <hr>
                </div>
              <form action="reserve_room.php" method="">
			                 <div class="form-group col-lg-4">
                                <label>Room Type</label>
                                <select name="r_type" class="form-control">
								<?php
								$result = $mysqli->query("SELECT * FROM rooms ORDER BY rooms_id");
                                if ($result->num_rows > 0){
	                            while ($row = $result->fetch_object()){
								?>
                                <option value="<?php echo $row->rooms_id;?>"><?php echo $row->room_type;?></option>

								<?php
								}}
								?>
                                </select>
                            </div>
			                <div class="form-group col-lg-4">
                                <label>Check-in</label>
                                <input type="date" min="<?php echo date("Y-m-d")?>" name="in" class="form-control">
                            </div>
			                <div class="form-group col-lg-4">
                                <label>Check-out</label>
                                <input type="date" min="<?php echo date("Y-m-d")?>" name="out" class="form-control">
                            </div>
							 <div class="form-group col-lg-4">
                                <label>Total Room</label>
                                <input type="number" min="1" max="4" value="1" name="t_room" class="form-control">
                            </div>
							<div class="form-group col-lg-12 text-right">
			                <input type="submit" class="btn btn-default" value="Reserve">
			                </div>
			 </form>
                <div class="clearfix"></div>
            </div>
        </div>
</div>
 <?php
include('conn/footer.php');
?>