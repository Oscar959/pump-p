<?php
include('../connect.php');
include('../conn.php');
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:login.php');
}
$nom=$_SESSION['name'];
$prenom=$_SESSION['firstname'];
$mdp=$_SESSION['mdp'];
$result=$connect->query("select* from admin where name='$nom' and firstname='$prenom' and  mdp='$mdp'");
while($row=$result->fetch()){
	$nom=$row['name'];
	$prenom=$row['firstname'];
	$mdp=$row['mdp'];
	$id=$row['id'];
	

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon profil</title>
     <link href="../assets/img/logo.jpeg" rel="icon">
    <link href="../assets/img/logo.jpeg" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
	  p,h1,h2,h3,h4,h5,h6,li, ul, ol,a, body{
		  font-family: 'Nunito', sans-serif;
	  }
	 .mdp i{
		 position:absolute;
         bottom:390px;
		 color:#000;
		 left:445px;
		 font-size:20px;
		 cursor:pointer;
	 }
	 .active .mdp  i::before{
		 content:'\f070';
		 color:#5256ad;
	 }
	 @media (max-width:768px){
		.mdp i{
		 position:absolute;
         bottom:383px;
		 color:#000;
		 left:385px;
		 font-size:20px;
		 cursor:pointer;
	 }
	 .active .mdp  i::before{
		 content:'\f070';
		 color:#5256ad;
	 }
	}
	@media (max-width:520px){
		.mdp i{
		 position:absolute;
         bottom:362px;
		 color:#000;
		 left:350px;
		 font-size:20px;
		 cursor:pointer;
	 }
	 .active .mdp  i::before{
		 content:'\f070';
		 color:#5256ad;
	 }
	}
	</style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      
       <?php include("nav.php");?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter count"></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <div id="dropdown-menu">
									
							    </div>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <?php include("connectees.php");?>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['name'];?>
								<?php echo $row['firstname'];?></span> 
                                <?php echo '<img src="../uploads/'.
						           $row['photo'].'" width="150px;" height="50px;" class="img-profile rounded-circle"; alt="image">'?> 
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="centre">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Retour
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mon profil</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Collapsable Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary" style="font-style:italic">Bonjour cher <strong class="text-gray-500"><?php echo $nom=$_SESSION['name'] ?></strong> membre de l'UMP.<br> <small class="text-secondary"> Cliquez sur votre photo pour modifier votre profil.</small></h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body text-secondary profile-card pt-4 d-flex flex-column align-items-center" style="font-style:italic">
                                        <?php echo '<img src="../uploads/'.$row['photo'].'" width="180px;" height="200px;" class="rounded-circle image-profile-update"; id="image" alt="image">'?>
							            <h2><?php echo $row['name'];?> <?php echo $row['firstname'];?></h2>
                                    </div>
                                </div>
                            </div>

                        </div>
						
						

                     </div>
					 
					  <div class="alert alert-success  alert-dismissable col-lg-4" style="display: none">
						<button type="button" class="close">??</button>
							<h4>Reussie</h4> 
						<p style="text-align:justify">Votre Profil est modifi?? avec success, actualisez votre page pour voir les modifications</p>
					  </div>

                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include("lgout.php");?>
	
	<div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-secondary" id="exampleModalLabel">Changez votre profil</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
					
					<div style="display:none;">
					 <form>
					   <input type="hidden" value="<?php echo $row['id'];?>"  name="id" id="id_id">
					 </form>
					</div>
                </div>
                <div class="modal-body text-secondary">
				   <form id="form_photo" enctype="multipart/form-data" class="modal-body-form-content">
                      				   
				      
	               </form> 
				</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="submit" data-dismiss="modal" >Quitter</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../admin/js/demo/chart-area-demo.js"></script>
    <script src="../admin/js/demo/chart-pie-demo.js"></script>

    
     <script>
	 $(document).ready(function(){
	 // file validation before to be stored to the database
	  $("#file").change(function(){
		var file = this.files[0];
        var	fileType= file.type;
        var match=['image/jpeg','image/jpg','image/png'];
		if(!((fileType==match[0]) ||(fileType==match[1]) || (fileType==match[2]))){
			alert("Desol??, introduis une photo avec l'extension jpeg, jpg, png. Merci!");
		    $("#file").val('');
			return false;
		}
		});	
       $(document).on('click', '.image-profile-update', function(){
		var userid =  $('#id_id').val();
		//alert(userid);
		$.ajax({
			url:'profile_display.php',
			method: 'POST',
			data : {userid:userid},
			success: function(response){
				$('.modal-body-form-content').html(response);
				$("#photo").modal("show");
			}	
		});
	   });
	   
	   $('#form_photo').on('submit', function(e){
			e.preventDefault();
			if($('#mdp').val()== ''){
				alert("Entrez votre mot de passe");
			}else{
				$.ajax({
				 url:"profile-users.php",	
				 method:"POST",
				 data:new FormData(this),
				 cache: false,
				 contentType: false,
				 processData:false,
				 success:function(data){
				   $("#form_photo")[0].reset();	 
				   $("#photo").modal("hide");
                   setTimeout(function(){
                    window.location.replace("profile.php");
                   },1000);
			      }
				});
			}
				
	    });
		
		
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

   $(document).ready(function(){
	    function load_unseen_notification(view=''){
		 $.ajax({
			 url:"../admin/fetch.php",
			 method:"POST",
			 data:{view:view},
			 dataType:"json",
			 success:function(data){
				 $('#dropdown-menu').html(data.notification);
				 if(data.unseen_notification > 0){
					 $('.count').html(data.unseen_notification);
				     var audio = new Audio("audio/fais_dodo.mp3");
				     audio.play();
					 setTimeout(function(){
						audio.pause();
						audio.currentTime=0;
					},10000);
			 }
		   }
		 });
	  }
	  load_unseen_notification();
	  
	  $(document).on('click', '.dropdown-toggle', function(){
		 $('.count').html('');
		 load_unseen_notification('yes');
	  });
	  setInterval(function(){
		load_unseen_notification()  
	  },1000);
	  });
	 
	  });
    
 </script>
</body>

</html>
<?php
}
?>