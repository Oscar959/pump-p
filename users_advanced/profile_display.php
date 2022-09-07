<?php

session_start();	
if(!($_SESSION['nom']) && !($_SESSION['prenom']) && !($_SESSION['mdp'])){
	header('location:users_connect_login.php');
}

 include("../conn.php");
 include("../connect.php");
 $output="";
 if($_POST['userid']){
	 $id= $_POST['userid'];
	 $query= "SELECT id, nom, post_nom, prenom, mdp, profession_actuelle, photo from members where id=$id";
	 $q=mysqli_fetch_array(mysqli_query($con, $query));
	 
	 
	 $output="   	     
		    <small style='display:none'>
			    <input type='text' id='id' value=".$q['id']." name='id' class='form-control'>
			</small>
			<small>Nom</small>
			    <input type='text' id='nom' value=".$q['nom']." name='nom' class='form-control'>
			<small>Postnom</small>
			    <input type='text' id='postnom' value=".$q['post_nom']." name='postnom' class='form-control'>  
			<small>Prenom</small>
			    <input type='text' id='prenom' value=".$q['prenom']." name='prenom' class='form-control'>
				<div class='form-group mdp'>
					 <small>Votre mot de passse(mettez le)</small>
					 <input type='password' class='form-control' name='mdp' id='mdp'>
					 <i class='fa fa-eye active'></i>
				</div>
			<small>	Profession actuelle</small>
		    <input type='text' id='profession' value=".$q['profession_actuelle']." name='profession' class='form-control'>
			<img class='rounded-circle' src='../uploads/".$q['photo']."' height='25%;'  width='30%;' alt='image'><br>
			<small>Votre nouvelle photo</small>
			<input type='file' id='file' name='photo'>    
	        <button align='right' style='margin:1rem;' class='btn btn-info text-white-50' type='submit'>Envoyer</button>
	 ";
	 echo $output;
	}
	 

 
 