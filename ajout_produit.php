<?php 
include 'menu.php';
?>

        <div class="container">
          <div class="page-inner">

            
            <div class="row">
              <div class="col-md-4">
                <div class="card card-post card-round">
                  <img
                    class="card-img-top"
                    src="photos/logo.png"
                    alt="Card image cap"
                  />
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="avatar">
                        <img
                          src="photos/logo.png"
                          alt="..."
                          class="avatar-img rounded-circle"
                        />
                      </div>
                      <div class="info-post ms-2">
                        <p class="username">HK-CUISINE</p>
                        <p class="date text-muted">Systeme de restauration</p>
                      </div>
                    </div>
                    <div class="separator-solid"></div>
                      <span>
                        <a href="liste_tarification.php" class="form-control btn" style=" background-color: #062e69; color: white; border-radius: 5px; ">
                          <center>
                            LISTE DES PRODUITS
                          </center>
                        </a>
                      </span>
                  </div>
                </div>
              </div>




              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                  <?php 
                  if (isset($_POST['enregistrer'])) {
                    extract($_POST);
                    $dates = date('Y-m-d');

                    // Vérification si le produit existe déjà par nom
                    $onvaverifierusername = $db->prepare("SELECT id FROM produit WHERE produit = ?");
                    $onvaverifierusername->execute(array($produit));

                    if ($onvaverifierusername->rowCount() > 0) {
                        // Le produit existe déjà par nom
                        echo '<div id="errorMessage" class="alert alert-danger">';
                        echo 'Ce produit existe déjà.';
                        echo '</div>';
                    }
                    else {

                    $insertion = $db -> prepare("INSERT INTO produit(produit, second_name, prix, categorie, date_ajout) VALUES (?, ?, ?, ?, ?)");
                    $insertion -> execute (array ($produit, $second_name, $prix, $categorie, $dates));

                        echo '<div id="errorMessage" class="alert alert-success">';
                        echo 'Enregistrement effectué.';
                        echo '</div>';
                      }
                   }

                   ?>
                   <script>
                      // Masquer le message d'erreur après 5 secondes
                      setTimeout(function() {
                          var errorMessage = document.getElementById('errorMessage');
                          if (errorMessage) {
                                                errorMessage.style.display = 'none'; // Cache l'élément
                          }
                      }, 2500); // 5000 ms = 5 secondes
                  </script>
          

                    
                    <form  method="post" >
                       
                      
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="card card-stats card-round" style=" background-color: grey; ">
                          <div class="card-body" >
                            <div class="row align-items-center">
                              <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small" style=" background-color: #062e69; color: white; border-radius: 5px; ">
                                  <i class="fas fa-apple-alt"></i>
                                </div>
                              </div>
                              <div class="col col-stats ms-3 ms-sm-0">
                                <h1 class="card-title text-white"><center>FORMULAIRE D'AJOUT PRODUITS</center></h1>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      

                      <div class="col-sm-6">
                        <div class="form-group form-group-default">
                          <label for="nom" class="col-form-label">Nom produit</label>
                              <input type="text" id="produit" name="produit" class="form-control"  />
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group form-group-default">
                          <label for="postnom" class="col-form-label">Nomination (autre appélation)</label>
                              <input type="text" id="last_name" name="second_name" class="form-control"  />
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group form-group-default">
                           <label for="fonction" class="col-form-label">Prix</label>
                              
                             <input type="text" id="prix" name="prix" class="form-control"  />
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group form-group-default">
                        <label for="categorie" class="col-form-label">Catégorie</label>
                              
                              <select name="categorie" class="form-control" id="categorie">
                                <option value="Sandwich">Sandwich</option>
                                <option value="Burger">Burger</option>
                                
                            </select>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer border-0">
                      <button type="submit" name="enregistrer" class="btn" style=" background-color: #062e69; color: white; " >
                        Enregistrer
                      </button>
                  </div>

                  </div>

                  </form>

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

<!--   Core JS Files   -->
<!-- Inclure jQuery et Bootstrap JS -->
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


    <script>
      $('#addRowModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id = button.data('id');
          var nom = button.data('nom');
          var postnom = button.data('postnom');
          var prenom = button.data('prenom');
          var sexe = button.data('sexe');
          var telephone = button.data('telephone');
          var fonction = button.data('fonction');
  
          var modal = $(this);
          modal.find('#id').val(id)
          modal.find('#nom').val(nom);
          modal.find('#postnom').val(postnom);
          modal.find('#prenom').val(prenom);
          modal.find('#sexe').val(sexe);
          modal.find('#telephone').val(telephone);
          modal.find('#fonction').val(fonction);
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
