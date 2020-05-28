<?php 
	require_once('../connection.php');

	if (isset($_POST['POST_TYPE'])) {

		$POST_TYPE = $_POST['POST_TYPE'];

		switch ($POST_TYPE) {
			case 'GET_VIA_ID':

				$STATE_ID = $_POST['STATE_ID'];
				$query = "SELECT * FROM `city_master` WHERE `state_id`=$STATE_ID AND `city_status`='active'";
				$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

				echo "<option value disabled selected>-- Select City --</option>";

				while ($row=mysqli_fetch_object($res)) {
					echo "<option value='$row->city_id'> $row->city_name </option>";
				}
				break;

			case 'GET_VIA_NAME':
				$KEY_WORD = $_POST['KEY_WORD'];

				if ( strlen($KEY_WORD) >= 2 ) {
					$query = "SELECT * FROM `city_master` WHERE `city_name` LIKE '%$KEY_WORD%'";
					$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

					if ( mysqli_num_rows($res) > 0 ) {
						while ($row=mysqli_fetch_object($res)) {
							echo "<option value='$row->city_name'>";
						}		
					} else {
						exit('failure');
					}					
				} else {
					exit('failure');
				}
				break;


			default:
				# code...
				break;
		}
		


	} else {
		exit('Invalid POST_TYPE');
	}

 ?>