<?php 

	/**
	* 
	*/

	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "hng_db";

	$conn = new mysqli($servername, $username, $password,$dbname) or die ("Could Not Connect Database");

	class Hngremote 
	{
		
		


		public function getallremoteinterns($conn){
			$query = $conn->query("SELECT * FROM `remote_tbl` ORDER BY created_at DESC");
			if (mysqli_num_rows($query) > 0) {
				while ($row = mysqli_fetch_assoc($query)) {
					printf('
						<tr>
							<td>'.$row['remote_id'].'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['school'].'</td>
							<td>'.$row['telephone'].'</td>
							<td>'.$row['email'].'</td>
						</tr>
						');
				}
			}
		}

		public function get_remote_info($conn){
				$query = "SELECT * FROM `remote_tbl`";
				$result = $conn->query($query);
					if ($result) {
						return $result;
				}
		}

		public function insertuser($conn,$name,$school,$telephone,$email){
			$get_table_status = mysqli_num_rows($this->get_remote_info($conn));
			$getlastid = number_format(($get_table_status + 1) / 1000,4);
			$number = explode('.', $getlastid);
			$remote_id = "HNG/RE/001".$number[1];
			$created_at = NOW();

			$query = $conn->query("INSERT INTO `remote_tbl`(`remote_id`, `name`, `school`, `telephone`, `email`, `created_at`) VALUES ('$remote_id','$name','$school','$telephone','$email','$created_at')");


		}


	}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title> Stage 1</title>
</head>
<body>
	<H1>Name: SALAKO ADETUNJI ABDULHAQ</H1>
	<table>
		<tr>
			<th>Remote Id</th>
			<th>Name</th>
			<th>School</th>
			<th>Telephone</th>
			<th>Email</th>
		</tr>

		<?php 
			$hngRemote = new Hngremote();
			echo $hngRemote -> getallremoteinterns($conn); ?>

	</table>
</body>
</html>

