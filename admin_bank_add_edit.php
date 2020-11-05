<?php
include('conn/header.php');
include('conn/nav.php');
$error = NULL;
if (isset($_GET['add_bank'])){
	// get the form data
	$bank_name=$_GET['bank_name'];	
	
	// check bank has been used
	$sql_query="SELECT * FROM bank WHERE bank_name = '$bank_name'";
	$result=mysqli_query($mysqli,$sql_query);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count=mysqli_num_rows($result);
	
	if($count==1){
		$error = "Bank Exist";
	}else{
		// insert the new record into the database
		if ($stmt = $mysqli->prepare("INSERT into bank (bank_name) VALUES (?)")){
			$stmt->bind_param("s", $bank_name);
			$stmt->execute();
			$stmt->close();
		}else{
			echo "ERROR: Could not prepare SQL statement.";
		}			
		header("Location: admin_bank.php");
	}
}elseif(isset($_GET['edit_bank'])){
	
	$bank_name=$_GET['bank_name'];
	$bank_id=$_GET['bank_id'];
	
	// check bank has been used
	$sql_query="SELECT * FROM bank WHERE bank_name = '$bank_name'";
	$result=mysqli_query($mysqli,$sql_query);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count=mysqli_num_rows($result);
	if($count==1){
		$error = "Bank Exist";
	}else{
		// insert the new record into the database
		if ($stmt = $mysqli->prepare("UPDATE bank SET bank_name=? WHERE bank_id=?")){
			$stmt->bind_param("si", $bank_name,$bank_id);
			$stmt->execute();
			$stmt->close();
			header("Location: admin_bank.php");
		}
		else{
			echo "error";
		}
	}
}
?>
	<div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
		<?php 
		if(isset($_GET['edit']) || isset($_GET['edit_bank'])){   
		?>
		<form method="GET">
			<?php 
			$bank_id= $_GET['edit'];
			$result = $mysqli->query("SELECT * FROM bank  WHERE bank_id='$bank_id'");
			if ($result->num_rows > 0){
				while ($row = $result->fetch_object()){
			?>
			<h2>
			Edit Bank : <input type="text" name="bank_name"  value="<?php echo $row->bank_name; ?>"/>
			<input type="hidden" name="bank_id" value="<?php echo $_GET['edit'];?>"/>
			<input type="hidden" name="edit" value="<?php echo $_GET['edit'];?>"/>
			<br>
			<?php
			if($error == null){
			
			}else{
				echo "<p>", $error   ,"</p>";
			} ?>
			<input type="submit" name="edit_bank" value="Edit" class="btn btn-default"/>
			</h2>
			<?php 
			}}
			?>
		</form>	
		<?php
		}elseif(isset($_GET['add'])||isset($_GET['add_bank'])){ 
		?>
		<form method="GET">
			<h2>
			Add New Bank : <input type="text" name="bank_name"  Placeholder="Bank Name"/>
			<br>
			<?php
			if($error == null){
			
			}else{
				echo "<p>", $error   ,"</p>";
			} ?>
			<input type="submit" name="add_bank" value="Add" class="btn btn-default"/>
			</h2>
		</form>	
		<?php 
		} 
		?>
	</div>

<?php
include('conn/footer.php');
?>