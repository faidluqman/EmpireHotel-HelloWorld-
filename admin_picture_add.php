<?php
include('conn/header.php');
include('conn/a_nav.php');
if(!isset($_SESSION['login_user']))
	{
	header("Location: index.php");
	}
if(isset($_SESSION['login_user']))
	{
	$login_session=$_SESSION['login_user'];
	}
?>
<div class="row">
            <div class="box">
			     <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Upload
                        <strong>Picture</strong>
                    </h2>
                    <hr>
					<br>
                </div>
				
				<div class="col-sm-4 text-center">
				</div>
				<div class="col-sm-4 text-left">
				<form name="test" enctype="multipart/form-data" action="upload.php" method="Post">
                    <input type="file" name="picture[]">
					<br>
					<input type="submit" value="Upload" class="btn btn-default" />
				</form>
                </div>
            </div>
        </div>
</div>
<?php
include('conn/a_footer.php');
 ?>