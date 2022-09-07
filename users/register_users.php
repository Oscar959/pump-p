<?php include("header.php")?>
  <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">
  
          <div class="row">
  
        
  
        </div>
      </section><!-- End Counts Section -->
	  
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Creation Compte!</h1>
                            </div>
							<div class="col-lg-12 form-message">
							  
							</div><br><br>
                            <form class="user" id="form"  enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<small class="text-secondary">Votre nom</small>
                                        <input type="text" class="form-control " id="nom" name="nom">
                                    </div>
                                    <div class="col-sm-6">
									<small class="text-secondary">Votre Postnom</small>
                                        <input type="text" class="form-control " id="postnom" name="ps">
                                    </div>
                                </div>
								<div class="form-group">
								<small class="text-secondary">Votre Prenom</small>
                                    <input type="text" class="form-control" id="prenom" name="prenom">
                                </div>
								
                                <div class="form-group">
								<small class="text-secondary">Email Address</small>
                                    <input type="email" class="form-control" id="email" name="mail">
                                </div>
								
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<small class="text-secondary">Votre sexe</small>
										<select class="form-control" name="gender">										  
										  <option value="m">Masculin</option>
										  <option value="f">Féminin</option>
										</select>
                                    </div>
									
									<div class="col-sm-6 mb-3 mb-sm-0 pb-20">
									<small class="text-secondary">Qualité demandé</small>
										<select class="form-control" name="qualite">
										  <option value="Membre_effectif">Membre effectif</option>
										  <option value="Membre_d'honneur">Membre d'honneur</option>
										</select>
                                    </div>
                                     
                                </div>
								   <div class="form-group">
								   <small class="text-secondary">Votre Address de residence</small>
                                    <input type="text" class="form-control" id="adresse" name="adresse">
                                </div>
								<div class="form-group">
								<small class="text-secondary">Votre numéro de telephone</small>
                                    <input type="text" class="form-control" id="telephone" name="tel">
                                </div>
								  <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<small class="text-secondary">Etudes faite</small>
                                        <input type="text" class="form-control" id="etude" name="etude">
                                    </div>
                                    <div class="col-sm-6">
									<small class="text-secondary">Niveau d'étude</small>
                                        <input type="text" class="form-control " id="niveau" name="niveau">
                                    </div>
                                </div>
								  <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
								   <small class="text-secondary">Date de naissance</small>
                                        <input type="date" class="form-control" id="datepicker" name="date"
                                            id="exampleInputPassword">
                                     </div>
                                    <div class="col-sm-6">
									<small class="text-secondary">Votre profession</small>
                                        <input type="text" class="form-control " id="profession" name="profession">
                                    </div>
                                  </div>
                                <div class="form-group row">
								    <div class="col-sm-6 mb-3 mb-sm-0 mdp">
									<small class="text-secondary">Votre mot de passe</small>
                                            <input type="password" class="form-control " name="mdp"
                                                id="mdp">
												<i class="fa fa-eye active"></i>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0" >
									    <small class="text-secondary">Votre photo profil</small>
                                        <input type="file" class="form-control-file"
										    name="photo" id="file" placeholder="Photo de profil">												
                                    </div>
								</div>
								<div class="form-group row" >
									 <div class="col-sm-6  mb-3 mb-sm-0">
									 <small class="text-secondary">Votre cv</small>
                                        <input type="file" class="form-control-file"
										    name="cv" id="cv" placeholder="Votre cv">
                                     </div>
									 <div class="col-sm-6 mb-3 mb-sm-0">
									 <small class="text-secondary">Votre lettre de motivation</small>
                                        <input type="file" class="form-control-file"
										   name="lettre" id="lettre" placeholder="Votre cv Lettre">
                                    </div>
                                </div>
								
								
					
                                <button type="submit" id="v" name="send" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
								 
                            </form>
                            
                            <div class="text-center">
                                <a class="small" href="forgot-password">Mot de passe oublié?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="users_connect_login">Avez-vous déjà un compte? connectez-vous!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
	
   
    <!-- Bootstrap core JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src="../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin/js/sb-admin-2.min.js"></script>
	 <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
	<script>
	$(document).ready(function(){
	  let input= document.querySelector('.mdp input');
	  let show = document.querySelector('.mdp i');
	  show.onclick=function(){
		  if(input.type=== "password"){
			  input.type= "text";
			  show.classList.add('active');
		  }else{
			  input.type= "password";
			  show.classlist.remove('active');
		  }
	  }
	  // file validation before to be stored to the database
	  $("#file").change(function(){
		var file = this.files[0];
        var	fileType= file.type;
        var match=['image/jpeg','image/jpg','image/png'];
		if(!((fileType==match[0]) ||(fileType==match[1]) || (fileType==match[2]))){
			alert("Desolé, introduis une photo avec l'extension jpeg, jpg, png. Merci!");
		    $("#file").val('');
			return false;
		}
	  });
	  
	 $('#form').on('submit', function(e){
			e.preventDefault();
			  if($('#nom').val()!= ''  && $('#prenom').val()!='' && $('#email').val()!=''  && $('#adresse').val()!='' && $('#telephone').val()!='' && $('#etude').val()!='' 
			    && $('#niveau').val()!='' && $('#datepicker').val()!='' && $('#profession').val()!='' && $('#mdp').val()!=''&& $('#file').val()!=''){
				 $.ajax({
				  url:"membersAcc.php",
				  method:"POST",
				  data:new FormData(this),
				  cache: false,
				  contentType: false,
				  processData:false,
				  success:function(data){
					  $(".form-message").html(data);
					}  
				});  				  
			  }else{
				  alert("Remplissez tous les champs");
			  }
		  }); 
	 $("#datepicker").datepicker(); 
	});
	</script>

</body>

</html>
