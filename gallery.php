<?php
include('conn/header.php');
include('conn/nav.php');
?>
<div class="row">
            <div class="box">
			     <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Hotel
                        <strong>Gallery</strong>
                    </h2>
                    <hr>
                </div>
					<?php
				if ($result = $mysqli->query("SELECT * FROM picture ORDER BY picture_id"))
                {
			    if ($result->num_rows > 0)
                {
				while ($row = $result->fetch_object())
                {
				?>
				<div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/<?php echo $row->picture;?>" alt="">
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