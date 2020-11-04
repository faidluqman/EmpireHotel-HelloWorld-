<?php
include('conn/header.php');
include('conn/nav.php');
 ?>
 <script>
    function printDiv() {
      var divToPrint = document.getElementById('status');
      newWin = window.open("", "MsgWindow", "width=1000,height=500");
	  newWin.document.write("<h2>Your Reservation</h2>");
      newWin.document.write(divToPrint.outerHTML);
	  newWin.document.write("<h3>Note!:</h3><p>Please bring this note to hotel's frontdesk</p>");
      newWin.print();
      newWin.close();
   }
</script>
 <div class="container">
     <div class="row">
	     <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Empire Hotel</h1>
                    
                </div>
	        </div>
        </div>
		
		<div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <hr>
                    <h2 class="intro-text text-center">Check Your Reservation
                        <strong>Status</strong>
                    </h2>
                    <hr>
                    <p>Enter Your Reservation Code to check your reservation status.</p>
				    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                            </div>
                            <div class="form-group col-lg-4">
							<script>function validate(evt) {
							var theEvent = evt || window.event;
							var key = theEvent.keyCode || theEvent.which;
							key = String.fromCharCode( key );
							var regex = /[0-9]|\./;
							if( !regex.test(key) ) {
							theEvent.returnValue = false;
							if(theEvent.preventDefault) theEvent.preventDefault();
							}
							}
							</script>
                                <label>Reservation Code</label>
                                <input type="text" name="check_reservation" value="" onkeypress="validate(event)" class="form-control"><br>
								<button type="submit" class="btn btn-default">Check</button>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
<?php

if (isset($_GET['check_reservation']))
{		
  $check=$_GET['check_reservation'];

	?> 
	<div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
			<?php
			if($check==""){
				echo"<p><strong>No Reservation Code Are Entered!</strong></p>";
			}
			elseif (preg_match("/^[a-zA-Z ]*$/",$check)) {
                echo"<p><strong>Only Numbers Are Allowed</strong></p>";
             }
			else{
				   $result = $mysqli->query("SELECT * FROM reservation where reservation_id=$_GET[check_reservation] ORDER BY reservation_id");
	               if ($result->num_rows > 0){
	               while ($row = $result->fetch_object()){
				?>
				<div id="status">
				<img class="hidden" src="img/comfirm.png" alt="Reserve" style="width:304px;height:228px;">
				<p>Your Reservation Number : <?php echo $row->reservation_id; ?></p>
			    <p>Status : <?php echo $row->reservation_status; ?></p>
				<p>Payment Status : <?php echo $row->payment_status; ?></p>
				</div>
				<p>Please Contact <strong>01119137500</strong> For Help.</p>				
				<?php
				
				if( $row->reservation_status == "Reserve" )
				{
					?><button class="btn" onclick="printDiv()">Print</button><?php
				}
				}
			}else
			{
				echo "<p><strong>No reservation Were Made</strong></p>";
			}
	        }
			?>
			 </div>
            </div>
        </div>
		
           
<?php

}
?>
	</div>
<?php
include('conn/footer.php');
?>