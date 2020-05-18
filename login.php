<?php 
	require_once('connection.php');

	if (isset($_REQUEST['loginBtn'])) {

		$username = $_REQUEST['userNameInput'];
		$password = $_REQUEST['userPwdInput'];

		$query = "SELECT * FROM user_table WHERE user_email='$username' AND user_pwd='$password'";
		$res   = mysqli_query($conn, $query); 
		$nums  = mysqli_num_rows($res);

		if ( $nums == 1 ) {
			$row   = mysqli_fetch_assoc($res);
			$name  = $row['user_name'];
			echo "<h1>Welcome $name</h1>";	
		} else {
			echo "<h1>Invalid Credentials!!</h1>";	
		}
		

		
		
	} else {
		echo "Invalid request!";
	}
	/**
	 * http://localhost/phpmyadmin --> MySQL Admin
	 * Database - Collection of Tables -- cms_database
	 * Table - Rows - Data & Columns - Field Name
	 * user_table
	 *
	 * $conn = mysqli_connect('localhost', 'root', '', 'cms_database'); # host, username, pwd, db_name
	 *
	 *
	 *
	 * 
	 * Primary Key - Unique Key - NULL
	 *
	 *
	 *  SELECT, INSERT, UPDATE & DELETE - CRUD OPERATION - Create Read Update Delete
	 *
	 *  SELECT column_name FROM table_name;
	 *  SELECT user_name, user_email, user_phone FROM user_table
	 *  SELECT * FROM user_table
	 *
	 * Conditions - WHERE
	 * SELECT * FROM user_table WHERE user_id = 2;
	 * SELECT * FROM user_table WHERE user_email = 'james@mymail.com' AND user_pwd = '12345';
	 * 
	 */
 ?>