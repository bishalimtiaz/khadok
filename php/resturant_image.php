<?php
	

	require 'config.php';

		$id = $_REQUEST["id"];
		$nm=$_REQUEST["nm"];


		$fileName = $_FILES[$nm]['name'];
		$fileTmpName = $_FILES[$nm]['tmp_name'];
		$fileSize = $_FILES[$nm]['size'];
		$fileError = $_FILES[$nm]['error'];
		$fileType = $_FILES[$nm]['type'];



		$fileExt=explode('.', $fileName);
		$fileActualExt=strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg','png');

		if(in_array($fileActualExt, $allowed)){

			if ($fileError === 0) {
				
				if ($fileSize < 1000000) {
					$fileNameNew = uniqid('',true).".".$fileActualExt;

					$image=$fileNameNew;

					if ($nm=="files") {
						$sql="update resturant set resturantLogo='$image' where resturant_id='$id'";
						mysqli_query($con,$sql);

						$fileDestination = '../images/resturant/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);

						echo $image;
					}

					else if ($nm=="filef") {
						$fileDestination = '../images/food/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);

						
						$cookie_name = "fd";

						setcookie($cookie_name, $image, time() + (86400 * 30),"/");
						echo $image;

						
					}

					else if ($nm=="fileo") {
						$fileDestination = '../images/offer/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);

						
						$cookie_name = "od";

						setcookie($cookie_name, $image, time() + (86400 * 30),"/");
						echo $image;

						
					}

					


					
				}

				else{

				echo "Your file is too big";

				}
			}

			else{

				echo "There was an error uploading your file";
			}

		}

		else{
		
			echo "you cannot upload files of this type";
		}


?>