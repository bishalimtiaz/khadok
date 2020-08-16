<?php
	
	require 'config.php';
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];

	if(isset($_POST['submit'])){
		$file=$_FILES['file'];


		

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		$fileExt=explode('.', $fileName);
		$fileActualExt=strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg','png');

		if(in_array($fileActualExt, $allowed)){

			if ($fileError === 0) {
				
				if ($fileSize < 1000000) {
					$fileNameNew = uniqid('',true).".".$fileActualExt;

					$image=$fileNameNew;
					$sql="update userinfo set image='$image' where userName='$username' AND password='$password'";
					mysqli_query($con,$sql);

					$fileDestination = '../images/profile/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);


					echo '<script type="text/javascript"> alert("Your profile picture is uploaded successfully!!");
					window.location.replace("../html/Homepage2.php");
					</script>';
				}

				else{

					echo '<script type="text/javascript"> alert("Your file is too big!");
					window.location.replace("../html/Homepage2.php");
					</script>';

				}
			}

			else{

				echo '<script type="text/javascript"> alert("There was an error uploading your file!");
					window.location.replace("../html/Homepage2.php");
					</script>';
			}

		}

		else{
			
			echo '<script type="text/javascript"> alert("you cannot upload files of this type!");
					window.location.replace("../html/Homepage2.php");
					</script>';
		}
	}

?>