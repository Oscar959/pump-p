<?php include("header.php");?>
<?php include("conn.php");?>

<style>
@media (max-width: 920px) {
    .img-thumbnail{
        width: 380px;
        height: 420px;
    }
}

@media (max-width: 1500px) {
    .img-thumbnail{
        width: 380px;
        height: 420px;
    }
}
</style>
<!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">
  
          <div class="row">
  
        
  
        </div>
      </section><!-- End Counts Section -->
  <!-- ======= Doctors Section ======= -->

<div class="row">
  <div class="col-lg-12">
   <div class="card  text-center" style="font-family: 'Nunito', sans-serif; box-shadow: 0 5px 25px 0 rgba(214, 215, 216, 0.6);">
            <div class="col-lg-12">
                    <div class="card-body text-success"  style="font-family: 'Nunito', sans-serif;">
                        <?php 
                        if(isset($_GET['data_training_id'])){ 
                            $id = $_GET['data_training_id'];
                            $res=mysqli_query($con, "SELECT * FROM training WHERE id='$id'"); 
                            $output='';
                            while($row=mysqli_fetch_array($res)){
                            $output .='	
                                        <div class="container">
                                        <div style="text-align:justify;">
                                            <h4 class="card-title text-secondary fst-italic text-nunito">'.$row["purpose"].'</h4>
                                            <p class="card-title text-secondary fst-italic text-nunito">'.$row["def"].'</p>
                                            <p class="card-title text-secondary fst-italic text-nunito">'.$row["text_train"].'</p>
                                        </div>
                                        </div>
                            ';
                            }
                            echo $output;
                        }
                        ?> 
                    </div>        
            </div>	
        

            <div class="col-lg-12" style="margin:2rem;">
                <h4 class="card-title text-secondary fst-italic text-center text-nunito">Quelques photos de liées à cette activité</h4>
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active text-center">
                            <img src="assets/img/logo.jpeg" class="img-fluid img-thumbnail" width="35%"; height="auto"; alt="...">
                        </div>

                        <?php
                            $images = 'uploads/'."$id";
                            $files = array_diff(scandir($images), array('.','..'));
                            foreach($files as $file) {
                                $image_id = 'uploads/'."$id/"."$file";
                        ?>
                            <div class="carousel-item text-center">
                                <img src="<?php echo $image_id; ?>" class="img-fluid img-thumbnail" width="35%"; alt="..."/>
                            </div>
                            <?php
                                }
                            ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                                            
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
     </div>
   </div> 
    
</div>















<?php include("footer.php");?>