<?php 
include 'menu.php';
?>


        <div class="container">
          <div class="page-inner">
            <div class="row">

              <div class="col-md-12" >
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>

                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div> 
              </div>
            </div>
            <br>
            <div class="row">



         
            <div class="row row-card-no-pd "> 
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-print" style="color: #062e69; "></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Totale(s) <br>
                            facture(s)</p>
                          <h4 class="card-title"><?php 
                            $req = mysqli_query($connexion, "SELECT COUNT(DISTINCT numero_facture) AS nbr FROM caisse WHERE etat = 1");
                            if ($garde = mysqli_fetch_assoc($req)) {
                                echo $garde['nbr'];
                            }?></h4>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-box"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Total(s) <br>
                          produit(s)</p>
                          <h4 class="card-title">
                            <?php 
                            $req = mysqli_query($connexion, "SELECT COUNT(id) AS nbr FROM produit");
                            if ($garde = mysqli_fetch_assoc($req)) {
                                echo $garde['nbr'];
                            }?>
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-cubes"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Commande(s) <br>
                          en cours</p>
                          <h4 class="card-title">
                            <?php 
                            $req = mysqli_query($connexion, "SELECT COUNT(DISTINCT numero_facture) AS nbr FROM caisse WHERE etat_f = 0");
                            if ($garde = mysqli_fetch_assoc($req)) {
                                echo $garde['nbr'];
                            }?>
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-users" ></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Nombre utilisateur(s)</p>
                          <h4 class="card-title">
                            <?php 
                            $requette = mysqli_query($connexion, "SELECT COUNT(id) AS nbr FROM users ");
                            while ($garde = mysqli_fetch_assoc($requette)) {
                              echo $garde['nbr'];
                            }?>
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            
            
          </div>
        </div>
        <br><br>
     
      </div>

    </div>

    <?php include 'footer.php'; ?>
