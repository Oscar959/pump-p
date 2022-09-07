<?php
include('../conn.php');
include('../connect.php');
session_start();

function apostrophe($data){
	$cut=explode("'",$data);
	$ready=implode('\\\'',$cut);
	return $ready;
}
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:login');
}
		 $nom=$_SESSION['name'];
    	 $prenom=$_SESSION['firstname'];
	     $mdp=$_SESSION['mdp'];
		 $token=rand(1000000,9999999);
		 $result=$connect->query("select* from admin where name='$nom' AND firstname='$prenom' AND mdp='$mdp'");
		while($records=$result->fetch()){
			$id=$records['id'];
			$output="";
			$last_id="";
			if (isset($_POST['titre'])){
				$titre=apostrophe($_POST['titre']);
				$message=apostrophe($_POST['message']);
				$objet=apostrophe($_POST['objet']);

				$insert=$connect->exec("INSERT INTO `training` (`id`, `def`, `purpose`, `text_train`, `admin_id`, `date_pub`) VALUES ($token, '$titre', '$objet', '$message', $id, now())");
				//$last_id = $connect->lastInsertId();
				if($insert){
					$output="great";
				}
			}
		}
				if(isset($_FILES['files']['name'])){
					//file upload configuration
					$targetDir = "../uploads/";
					$allowTypes = array('jpg', 'png','jpeg','gif');
					$statusMsg ="" ;
					$errorMsg ="";
					$insertValuesSQL ="";
					$errorUpload ="";
					$errorUploadType ="";
					$fileNames = array_filter($_FILES['files']['name']);

					//taking the id of the last related activity
					$query = $connect->query("SELECT id FROM training WHERE def='$titre' AND purpose = '$objet' AND text_train='$message'");
					while($row = $query->fetch()){
						$id_activity = $row['id'];
						//$output =$id;
					}
					if(!empty($fileNames)){
						foreach($_FILES['files']['name'] as $key=>$val){
							$file_name = basename($_FILES['files']['name'][$key]);
							$file_tmp = $_FILES['files']['tmp_name'][$key];
							$file_size = $_FILES['files']['size'][$key];
							$file_error= $_FILES['files']['error'][$key];
							// A variable that contains the folder that I want to check 
							$folder = '../uploads/'.$id_activity.'/';
							$path = realpath($folder);
							if(!is_dir($path)){
								mkdir($folder);
							}
							if(is_uploaded_file($file_tmp)){
								if($file_size < 2097152){
									if($file_type= 'image/jpg'){
										//mkdir('../uploads/'.$id_activity);
										if(move_uploaded_file($file_tmp, $folder.$file_name)){
											$statusMsg = '<p class="alert alert-success">file uploaded successefully</p>';
										}else{
											$statusMsg = '<p class="alert alert-info">'.$count.'file uploaded failed</p>';
										}
										
									}else{
										$statusMsg = '<p class="alert alert-success">file not image</p>';
									}
								}else{
									$statusMsg = '<p class="alert alert-success">2M only</p>';
									}
							}else{
								$statusMsg = '<p class="alert alert-success">Please select a file</p>';
							}
							$insert = $connect->exec("INSERT INTO images(file_name,training_id,created_at)VALUES ('$file_name',$id_activity, now())");
						}
				
					}
					//header("location:index.php?result=$statusMsg");
					//$output ="great";
				}
		
			
	
	    
		echo $output;
 ?>