<?php
include('conn/header.php');
include('conn/nav.php');

if(!isset($_SESSION['admin_login'])){
	header("Location: admin_login.php");
}elseif(isset($_SESSION['admin_login'])){


if(isset($_GET['delete'])){
	
	$bank_id= $_GET['delete'];
	if ($stmt = $mysqli->prepare("DELETE FROM bank WHERE bank_id = ?")){
		$stmt->bind_param("i",$bank_id);
		$stmt->execute();
		$stmt->close();
	}else{
		echo "ERROR: could not prepare SQL statement.";
	}
	
}elseif(isset($_GET['edit'])){

	echo "edit";

}elseif(isset($_GET['add'])){

	echo "add";

}
}
?>
<!-- Start main image and the text below -->
<div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
	<h1>Bank</h1>
	<div class="hr"></div>
	<br>
	<a href="admin_bank_add_edit.php?add=" class="btn btn-default">Add New Bank</a>
	<br>
	<div class="text-center">
		<table class="table">
				<th>Bank ID</th><th>Bank Name</th><th>Option</th>    
				<?php 
				$result = $mysqli->query("SELECT * FROM bank");
				if ($result->num_rows > 0){
					while ($row = $result->fetch_object()){
				?>
				 <tr>
				 <td><?php echo $row->bank_id;?></td>
				 <td><?php echo $row->bank_name;?></td>
				 <td>
					 <a href="admin_bank_add_edit.php?edit=<?php echo  $row->bank_id; ?>">Edit </a>
					 <br>
					 <a href="admin_bank.php?delete=<?php echo  $row->bank_id; ?>" onclick="return  confirm('Are you sure?')">Delete</a>
					</td>
				 </tr>
				<?php }} ?>
			</table>		
	</div>  
</div>

<?php
include('conn/footer.php');
?>