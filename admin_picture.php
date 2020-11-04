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
                    <h2 class="intro-text text-center">List Of
                        <strong>Picture</strong>
                    </h2>
                    <hr>
                </div>
				<div class="col-lg-12 text-center">
					<a href="admin_picture_add.php">Add New Picture</a>
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
                    <h3><?php echo $row->picture;?></h3>
					<a href="admin_picture_delete.php?picture_id=<?php echo $row->picture_id;?>" class="btn btn-default">Delete Picture</a>
					<hr>
                </div>
				<?php
				}}}
				?>
            </div>
        </div>
</div>
<?php
include('conn/a_footer.php');
 ?>