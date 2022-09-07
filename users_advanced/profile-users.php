<?php
include("../conn.php");
include("../connect.php");
session_start();
if(!($_SESSION['nom']) && !($_SESSION['prenom']) && !($_SESSION['mdp'])){
	header('location:users_connect_login.php');
}

	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$mdp=$_SESSION['mdp'];
	$result=$connect->query("select* from members where nom='$nom' and prenom='$prenom' and  mdp='$mdp'");
	while($row=$result->fetch()){
	echo $nom=$row['nom'];
	$prenom=$row['prenom'];
	$mdp=$row['mdp'];
	$photo=$row['photo'];
	
}

	
$output='';
if(isset($_POST["id"])){
	$id=$_POST["id"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$ps=$_POST["postnom"];
	$mdp=md5($_POST["mdp"]);
	$profession=$_POST["profession"];
	$file_name=$_FILES['photo']['name'];
	$file_tmp=$_FILES['photo']['tmp_name'];
    $file_size=$_FILES['photo']['size'];
	$file_error=$_FILES['photo']['error'];
	$file_type=$_FILES['photo']['type'];
	
	if($file_name != ''){
		$file_name=$_FILES['photo']['name'];
	}else{
		$file_name=$photo;
	}
			  
		if(is_uploaded_file($file_tmp)){
			if($file_size < 2097152){
				if($file_type= 'image/jpg'){
					unlink("../uploads/".$photo);
					if(move_uploaded_file($file_tmp, "../uploads/$file_name")){
				    	$output= '<p class="alert alert-success">file uploaded successefully</p>';
					}else{
						$output= '<p class="alert alert-success">file uploaded failed</p>';
					}
					}else{
						$output= '<p class="alert alert-success">file not image</p>';
					}
					}else{
						$output= '<p class="alert alert-success">2M only</p>';
					}
					}else{
				     	$output= '<p class="alert alert-success">Please select a file</p>';
					}
					
	$query="UPDATE members SET nom = '$nom', prenom = '$prenom', post_nom = '$ps', mdp = '$mdp', profession_actuelle = '$profession', photo = '$file_name' WHERE id = '$id'";	
    $query_exec=mysqli_query($con, $query);
	if($query_exec){
		$output='<p class="alert alert-success">Cà marche avec success</p>';
	}else{
		$output='<p class="alert alert-success">Cà n\'as pas marché</p>';
	}
	echo $output;

}





?>