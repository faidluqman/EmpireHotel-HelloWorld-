<?php
include('conn/header.php');
include('conn/nav.php');

if(!isset($_SESSION['admin_login'])){
	header("Location: admin_login.php");
}elseif(isset($_SESSION['admin_login'])){
}

if(isset($_GET['delete'])){
	$pic_id= $_GET['delete'];
	if ($stmt = $mysqli->prepare("DELETE FROM picture WHERE picture_id = ?")){
		$stmt->bind_param("i",$pic_id);
		$stmt->execute();
		$stmt->close();
	}else{
		echo "ERROR: could not prepare SQL statement.";
	}
}
?>

<!-- Start margin -->
         <div class="margin-collection wow fadeIn" data-wow-delay="0.1s">
             <div class="col-md-10 col-xs-offset-1">
               <h3 class="heading-inner">Gallery</h3>
                  <div class="hr"></div>
                   
             </div>
             <!-- End text -->             
             <!-- Start projects -->
             <div class="container">
			 <h2 class="intro-text text-center">Upload
                <strong>Picture</strong>
             </h2>
			<form name="test" enctype="multipart/form-data" action="upload.php" method="Post">
				<input type="file" name="picture[]" class="btn btn-default">
				<br>
				<input type="submit" value="Upload" class="btn btn-default" />
			</form>
             </div><!-- /container -->       
          </div>
		  
		  
         <!-- Start margin -->
         <div class="margin-collection wow fadeIn" data-wow-delay="0.1s">
             <!-- End text -->             
             <!-- Start projects -->
             <div class="container">

               <div class="row">
                 <div class="portfolio-items grid">
                    <?php if ($result = $mysqli->query("SELECT * FROM picture ORDER BY picture_id")){
						if ($result->num_rows > 0){
							while ($row = $result->fetch_object()){?>
						<div class="portfolio-item summer col-xs-12 col-sm-12 col-md-4 thumbs">
							<figure class="effect-moses wow fadeIn" data-wow-delay="0.1s">
								<img src="img/<?php echo $row->picture;?>" alt=""/>
								<figcaption>
									<h2><?php echo  $row->picture; ?></h2>
									<p><a style="color:white" href="admin_gallery.php?delete=<?php echo  $row->picture_id; ?>" onclick="return  confirm('Are you sure?')">Delete</a></p>
							   </figcaption>
							</figure>					 
						</div>
						<!-- /portfolio-item -->  
				
					<?php }}} ?>					
                 </div><!-- /portfolio-items-grid -->
               </div><!-- /row -->               
             </div><!-- /container -->       
          </div>
          <!-- End margin -->
<?php
include('conn/footer.php');
?>