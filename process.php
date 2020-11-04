<?php
                include('conn/header.php');
                include('conn/conn.php');
				if(isset($_POST['reserve']))  
                {
					$c_in = htmlentities($_POST['check_in'], ENT_QUOTES);
					$c_out = htmlentities($_POST['check_out'], ENT_QUOTES);
					$t_room = htmlentities($_POST['t_room'], ENT_QUOTES);
					$name= htmlentities($_POST['name'], ENT_QUOTES);
					$email= htmlentities($_POST['email'], ENT_QUOTES);
					$tel= htmlentities($_POST['tel'], ENT_QUOTES);
					$room_type= htmlentities($_POST['r_type'], ENT_QUOTES);
					$bank= htmlentities($_POST['bank'], ENT_QUOTES);
					$ref= htmlentities($_POST['ref'], ENT_QUOTES);
					$total = htmlentities($_POST['t'], ENT_QUOTES);
					$p_status="Checking";
					$r_status="Pending";
				
				if ($name == '' || $email == '' || $tel == '' || $bank == '' || $ref == ''|| $c_in == ''|| $c_out == '')
				{
					?>
				 <div class="container">
                 <div class="row">
                 <div class="box">
                 <div class="col-lg-12 text-center">
				 <h2>Reserve Failed!</h2>
				 <h3>Please Fill The Form Correctly!</h3>
				 </div>
				 </div>
				 </div>
				 </div>
				<?php
				}else
				{
				// insert the new record into the database
				if ($stmt = $mysqli->prepare("INSERT into reservation (name,email,tel,check_in,check_out,total_room,room_type,total_payment,bank_type,refrence_no,payment_status,reservation_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"))
				{
				$stmt->bind_param("ssssssssssss", $name, $email, $tel,$c_in,$c_out,$t_room,$room_type,$total,$bank,$ref,$p_status,$r_status);
				$stmt->execute();
				$stmt->close();
				}
				else
				{
				?>
                 <div class="col-lg-12 text-center"><h3>Failed! </h3></div>
				<?php
				}
				echo "New record has id: " . mysqli_insert_id($mysqli);
                $id= mysqli_insert_id($mysqli);
				header("Location: complete.php?reservation_number=$id");
				}
				}else{
					header("Location: index.php");
				}
				?>