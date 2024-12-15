<?php 
include 'menu.php';
?>


        <div class="container">
          
          <div class="page-inner">

            <div class="row">



              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Produits</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    

                    <div class="table-responsive">
                     <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>

                          <tr>
                            <th style=" background-color: #062e69; color: white; "><center>Produit/autres appéllation</center></th>
                            <th style=" background-color: #062e69; color: white; "><center>PRIX CDF</center></th>
                            <th style=" background-color: #062e69; color: white; "><center>Catégories</center></th>
                              <th style="width: 10%; background-color: #062e69; color: white; "><center>Actions</center></th>
                          </tr>
                        </thead>
                        <tbody>

                          <script src="animation.js"></script>
                          <?php
                          
                          $req = mysqli_query($connexion, "SELECT * FROM produit WHERE etat = 0");
                          while ($garde=mysqli_fetch_assoc($req)) {?>
                          <tr>
                            <td nowrap="none"><?php echo $garde['produit']; ?></td>
                            <td nowrap="none"><?php echo number_format($garde['prix'],2)."  CDF"; ?></td>
                            <td nowrap="none"><?php echo $garde['categorie']; ?></td>          
                            <td nowrap="none">
                              <center>
                                <a href="#" class="btn" style="background:  #062e69;" 
                                   data-bs-toggle="modal"
                                   data-idss="<?php echo $garde['id']; ?>"
                                   data-produits="<?php echo $garde['produit']; ?>"
                                   data-second_names="<?php echo $garde['second_name']; ?>"
                                   data-prixs="<?php echo $garde['prix']; ?>"
                                   data-categories="<?php echo $garde['categorie']; ?>"
                                   data-bs-target="#paniermodalajout">
                                   <i class="fas fa-shopping-cart text-white"></i>
                                </a>
                              </center>
                            </td>

                          </tr>
                          <?php } ?>

                            <!-- Modal pour ajouter dans le panier -->
                          <div class="modal fade" id="paniermodalajout" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <!-- Ajouter produit dans le panier -->
                                      <script src="animation.js"></script>

                                              <?php 
                                              if (isset($_POST['ajout_panier'])) {
                                                  extract($_POST);

                                              // Vérification si le produit est déjà dans la table caisse
                                              $onvaverifier = mysqli_query($connexion, "SELECT * FROM caisse WHERE id_produit = '$idss' AND etat = 0");
                                              if (mysqli_num_rows($onvaverifier) > 0) {
                                              // Produit déjà ajouté, pas d'ajout supplémentaire
                                              echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                                              echo "<script>
                                                  Swal.fire({
                                                      position: 'center',
                                                      icon: 'warning',
                                                      title: 'Déjà ajouté.',
                                                      text: 'Le produit est déjà sur la commande',
                                                      showConfirmButton: true
                                                  });
                                              </script>";
                                              } 
                                              else {
                                              // Récupérer les informations du produit
                                              $sql = mysqli_query($connexion, "SELECT * FROM produit WHERE id = '$idss' ");
                                              $garde = mysqli_fetch_assoc($sql);

                                              $produit=$garde['produit'];
                                              $prix = $garde['prix'];
                                              $second_name = $garde['second_name'];
                                              $categorie = $garde['categorie'];

                                              $total = $prix * $quantite;

                                              $insertcom = $db->prepare("INSERT INTO caisse (id_produit, produit, second_name, prix, montant, quantite, categorie) VALUES(?,?,?,?,?, ?, ?)");
                                              $insertcom->execute(array($idss, $produit, $second_name, $prix, $total , $quantite, $categorie));

                                              echo "<script>
                                              window.location.replace('caisse.php');
                                              </script>";
                                              }
                                             
                                              }

                                              ?>

                                      <form method="post">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="cartModalLabel">Ajouter au panier</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <div id="cartItems">
                                          </div>
                                          <input type="hidden" name="idss" id="idss">

                                          <div class="form-group">
                                              <label for="nom_produit">Nom produit</label>
                                              <input type="text" class="form-control" id="produits" name="produit" placeholder="Entrez le nom du produit" readonly>
                                          </div>
                                          <div class="form-group">
                                              <label for="prix_vente">Prix </label>
                                              <input type="text" class="form-control" id="prixs" name="prix" placeholder="Entrez la quantité" readonly>
                                          </div>
                                          <div class="form-group">
                                              <label for="quantite">Quantité</label>
                                              <input type="number" class="form-control" id="quatite_totals" name="quantite" required placeholder="Entrez la quantité" required>
                                          </div>
                                      </div>
                                      <div class="modal-footer" style="background-color: #fff;">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                          <button type="submit" class="btn" name="ajout_panier" style=" background-color: #062e69; color:#fff">Ajouter au panier </button>
                                      </div>
                                      </form>
                                  </div>
                              </div>
                          </div>                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Commande</h4>

                       
                        <div class="ms-md-auto py-2 py-md-0">
                        <a
                        class="btn text-white"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                        style=" background-color: #062e69; "
                      >
                        <i class="fas fa-money-bill-alt"></i>
                        Valider
                      </a>
                        
                      </div>
                       
                      
                    </div>
                  </div>
                  <div class="card-body">
                    

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th style=" background-color: #062e69; color: white; "><center>Produits</center></th>
                            <th style=" background-color: #062e69; color: white; "><center>Prix CDF</center></th>
                            <th style=" background-color: #062e69; color: white; "><center>Quantité</center></th>
                            <th style=" background-color: #062e69; color: white; "><center>Prix total</center></th>
                            <th style=" background-color: #062e69; color: white; "><center>Actions</center></th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php 
                       // Suppression produit dans la commande 
                       if (isset($_GET['delete'])) {
                       $supp = $_GET['delete'];

                       // Suppresion dans caisse
                       $reqsupcaisse = mysqli_query($connexion, "DELETE FROM caisse WHERE id_produit='$supp'");
                        echo "<script>
                        window.location.replace('caisse.php');
                        </script>";
                       }

                       $req = mysqli_query($connexion, "SELECT * FROM caisse WHERE etat = 0");
                       while ($garde=mysqli_fetch_assoc($req)) {?>

                          <tr>
                            <td nowrap="none"><?php echo $garde['produit']; ?></td>
                            <td nowrap="none"><?php echo number_format($garde['prix'],2)."  CDF"; ?></td>
                            <td nowrap="none"><?php echo $garde['quantite']; ?></td>
                             <td nowrap="none"><?php echo number_format($garde['montant'],2)."  CDF"; ?></td>
                            <td nowrap="none">
                              <center>
                                <a href="caisse.php?delete=<?php echo $garde['id_produit']; ?>" onclick="confirmDelete" class="btn" style="background:  red;">
                                  <i class="fas fa-trash text-white"></i>
                                </a>
                              </center>
                            </td>

                          </tr>
                          <?php } ?>


                           <tr>
                             <th><center>Total</center></th>
                             <th>
                               </center>
                             </th>
                             <th>
                             </th>
                             <th><center><?php 
                              $requette = mysqli_query($connexion, "SELECT sum(montant) as nbr FROM caisse WHERE etat = 0");
                              while ($garde=mysqli_fetch_assoc($requette)) {
                                 echo number_format($garde['nbr'],2)."  CDF";
                               } ?>
                                 
                               </center></th>
                           </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
      
              <div class="row">

              <div class="col-md-12" >
              
              </div>

 
              </div>
                </div>
              </div>


              </div>
              </div>
              </div>
                </div>
              </div>
            </div>

          </div>
        </div>

     
      </div>

    </div>
                    <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold">Validation de la facture</span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                              id="closeButton"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <script src="animation.js"></script>
                          <?php 
                          if (isset($_POST['save'])) {
                            extract($_POST);
                            $etat = 1;
                            $date_paye = date('Y-m-d');
                            $date_payes = date('Ymd');
                            
                            $reqss = mysqli_query($connexion, "SELECT * FROM code_facture " );
                               while ($garde= mysqli_fetch_assoc($reqss)){
                               $comptee=$garde['code_facture'];
                               $nbrr = $comptee+1;
                               $reqsss = mysqli_query($connexion, "UPDATE code_facture SET code_facture ='$nbrr' " );
                            }  

                            $numero_facture = 'Hkc/' . $date_payes . '/0' . $nbrr;


                            $requette = mysqli_query(
                            $connexion,
                            "UPDATE caisse SET 
                                etat = 1, 
                                agent = '$agent', 
                                client = '$client', 
                                portable = '$portable', 
                                date_paye = '$date_paye',
                                numero_facture = '$numero_facture',
                                code_facture = '$nbrr'
                             WHERE etat = 0"
                            );

                            // Affichage du succès
                            echo "<script>
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Vente effectuée !',
                                    showConfirmButton: false,
                                    timer: 3500
                                });
                                setInterval(function () {
                                    window.location.replace('caisse.php');
                                }, 1000);
                            </script>";


                           }


                           ?>
                          <form method="post">
                          <div class="modal-body">
                            <p class="small">
                              Renseignez les informations sur ci-dessous !
                            </p>
                            
                              <div class="row">


                      

                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <input type="hidden" name="agent" value="<?php echo $username; ?>">
                              <label>Nom du client</label>
                              <input type="text" name="client" class="form-control" required placeholder="Saisissez le montant...">
                            </div>
                            <div class="form-group form-group-default">
                              <label>Portable</label>
                              <input type="text" name="portable" class="form-control" required placeholder="Saisissez le portable">
                            </div>
                          </div>

                              </div>
                            
                          </div>
                          <div class="modal-footer border-0">
                            <button
                              type="submit"
                              class="btn btn-danger closes"
                              data-dismiss="modal"
                              id="closeButtons"
                            >
                              Annuler
                            </button>
                            <button
                              name="save"
                              class="btn"
                              style=" background-color: #062e69; color:#fff"
                            >
                              Enregistrer
                            </button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
   
    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/setting-demo2.js"></script>
    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>







    
  
    <script src="animation.js"></script>

    <!-- Script ajout panier -->
    <script>
      $('#paniermodalajout').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var idss = button.data('idss');
          var produits = button.data('produits');
          var categories = button.data('categories');
          var prixs = button.data('prixs');
          var second_names = button.data('second_names');
          

          var modal = $(this);
          modal.find('#idss').val(idss)
          modal.find('#produits').val(produits);
          modal.find('#categories').val(categories);
          modal.find('#prixs').val(prixs);
          modal.find('#second_names').val(second_names);
        });
    </script>



<script>
  $('#addRowModalll').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var nom = button.data('nom');
      var password = button.data('password');
      

      var modal = $(this);
      modal.find('#id').val(id)
      modal.find('#nom').val(nom);
      modal.find('#password').val(password);
    });
</script>





<script>
  $('#addRowModall').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var nom = button.data('nom');
     

      var modal = $(this);
      modal.find('#id').val(id)
      modal.find('#nom').val(nom)
      
  });
</script>
  
  </body>
</html>

