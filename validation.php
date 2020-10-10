<?php 
	include_once 'setup.php';

	$output = array('file' => false);

	function check_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}

	
	$userImage = check_input($_POST['file']);

	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

	if($action == 'profilePhoto'){
		// $sql = mysqli_query($conn, "SELECT * FROM image_upload ");
		$sql = pg_query($conn, "SELECT * FROM image_upload ");
		$files = array();
		while($row = pg_fetch_assoc($sql)){
			array_push($files, $row);
		}
		$output['files'] = $files;
	}

	if($userImage == ''){
		$output['file'] = true;
		$output['message'] = 'Image is Required!';
	}

	else{
		// File name
		$filename = $_FILES['file']['name'];

		// Valid file extensions
		$valid_extensions = array("jpg","jpeg","png","pdf", "jfif");

		// File extension
		$extension = pathinfo($filename, PATHINFO_EXTENSION);

		// Check extension
		if(in_array(strtolower($extension),$valid_extensions) ) {

		   // Upload file
		   if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$filename)){
		      echo 1;
		   }else{
		      echo 0;
		   }
		}else{
		   echo 0;
		}

		$sql = <<<EOF
			INSERT INTO image_upload (image_name) VALUES ('$filename');
		EOF;
		// $result = mysqli_query($conn, $sql);
		$result = pg_query($conn, $sql);

		if($result){
			$output['message']='Form Submitted Successfully!';
		}else{
			$output['message']='Something went to wrong!';
		}		
	}


	$sql = "select image_name from image_upload where id=1";
	// $result = mysqli_query($con,$sql);
	$result = pg_query($con,$sql);
	$row = pg_fetch_array($result);

	$image = $row['image_name'];
	$image_src = "uploads/".$image;

	header("Content-type: application/json");
	echo json_encode($output);
	die();

?>