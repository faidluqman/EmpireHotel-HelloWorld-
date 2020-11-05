<?php
include('conn/header.php');
include('conn/nav.php');
?>
         <!-- Start margin -->
         <div class="margin-collection wow fadeIn" data-wow-delay="0.1s">
             <div class="col-md-10 col-xs-offset-1">
               <h3 class="heading-inner">Gallery</h3>
                  <div class="hr"></div>
                   <div class="heading-c">
                    Preview of our hotel        
					</div>
             </div>
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
							</figure>
						</div><!-- /portfolio-item -->  
				
					<?php }}} ?>
					
                 </div><!-- /portfolio-items-grid -->
               </div><!-- /row -->
               
             </div><!-- /container -->
       
          </div>
          <!-- End margin -->
<?php
include('conn/footer.php');
?>