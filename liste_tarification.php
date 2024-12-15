<?php 
include 'menu.php';
?>


        <div class="container">
          <div class="page-inner">

            <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Liste des produits</h4>
                      <div class="ms-md-auto py-2 py-md-0" style="white-space: nowrap; overflow: hidden;">
                      <a
                        class="btn text-white btnme-2"
                        style=" background-color: #062e69; " 
                        href="accueil.php"
                      >
                        <i class="fas fa-reply"></i>
                        Retour à l'accueil
                      </a>
                      
                        <a
                        class="btn text-white btnme-2"
                        href="ajout_produit.php"
                        style=" background-color: #062e69; "
                      >
                        <i class="fa fa-plus"></i>
                        Ajouter un produit
                      </a>
                      
                      </div>
                      
                    </div>
                  </div>
                  <div class="card-body">
                    

                  
         
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                         
                          <tr>
                            <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Produits</center></th>
                            <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Nomination (autres nom)</center></th>
                            <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Prix</center></th>
                            <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Catégories</center></th>
                           
                            <th style="width: 10%; background-color: #062e69; color: white; " nowrap="none"><center>Actions</center></th>
                          </tr>
                        </thead>
                        <tbody>

                          

                           <?php 
                            $requette = mysqli_query($connexion, "SELECT * FROM produit");
                            while ($garde=mysqli_fetch_assoc($requette)) {?>
                          <tr>
                            <td style=" white-space: nowrap; overflow: hidden;" nowrap="none"><?php echo $garde['produit']; ?></td>
                            <td style=" white-space: nowrap; overflow: hidden;" nowrap="none"><?php echo $garde['second_name']; ?></td>
                            <td style=" white-space: nowrap; overflow: hidden;" nowrap="none"><?php echo number_format($garde['prix'],2)."  CDF"; ?></td>
                            <td style=" white-space: nowrap; overflow: hidden;" nowrap="none"><?php echo $garde['categorie']; ?></td>
                            <td style=" display: flex; justify-content: center; align-items: center; white-space: nowrap; overflow: hidden; " nowrap="none">
                              
                              <span style=" margin: 0 8px; ">
                                 <a href="#" class="btn btn-xs text-white" style="background-color:red; margin: 0px;" 
                                   data-bs-toggle="modal"
                                   data-idss="<?php echo $garde['id']; ?>"
                                   data-produits="<?php echo $garde['produit']; ?>"
                                   data-second_names="<?php echo $garde['second_name']; ?>"
                                   data-prixs="<?php echo $garde['prix']; ?>"
                                   data-categories="<?php echo $garde['categorie']; ?>"
                                   data-bs-target="#addRowModall">
                                   <i class="fas fa-trash text-white"></i>
                                </a>
                              </span>

                              <span style=" margin: 0 8px; ">
                                <a href="#" class="btn btn-xs text-white" style=" background-color:  #062e69; margin: 0px; " data-bs-toggle="modal"
                                data-idss="<?php echo $garde['id']; ?>"
                                data-produits="<?php echo $garde['produit']; ?>"
                                data-second_names="<?php echo $garde['second_name']; ?>"
                                data-prixs="<?php echo $garde['prix']; ?>"
                                data-categories="<?php echo $garde['categorie']; ?>"
                                data-bs-target="#addRowModalll">
                                
                                <i class="fas fa-edit" style="color: #fff; "></i> </a>
                            </span>

                              
                            </td>
                          </tr>
                          <?php } ?>
                        
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>






            
          </div>
        </div>

     
      </div>

    </div>
    
    <!-- Modal modification -->
  <div class="modal fade" id="addRowModalll" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0" style=" background-color: #062e69; color:#fff">
                <h5 class="modal-title" align='center'>
                    <span class="fw-mediumbold">Modification des informations</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeButton">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php  
            if (isset($_POST['update'])) {
              extract($_POST);

            $update = mysqli_query ($connexion, "UPDATE produit SET produit = '$produit', second_name = '$second_name', categorie = '$categorie', prix = '$prix' WHERE id = '$idss' ");
              echo "<script>
                    window.location.replace('liste_tarification.php');
                    </script>";
              }

             ?>
            <form  method="post">
                <div class="modal-body">
                    <div class="form-group row">
                      <input type="hidden" name="idss" id="idss">
                        <div class="col-sm-6">
                            <label for="nom" class="col-form-label">Produit </label>
                            <input type="text" id="produits" name="produit" class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <label for="nom" class="col-form-label">Autre nom </label>
                            <input type="text" id="second_names" name="second_name" class="form-control">
                        </div>

                        <div class="col-sm-6">
                          <label for="postnom" class="col-form-label">Catégorie</label>
                          <select name="categorie" class="form-control" id="categories">
                                <option>Choisir</option>
                                <option value="Sandwich">Sandwich</option>
                                <option value="Burger">Burger</option>
                          </select>
                        </div>

                        <div class="col-sm-6">
                          <label for="postnom" class="col-form-label">Prix</label>
                          <input type="text" id="prixs" name="prix" class="form-control">
                        </div>
                    </div>
                    
                  <br><br>
                    <div align="center">
                        <button class="btn " type="submit" name="update" style=" background-color: #062e69; color:#fff"><i class="ace-icon fa fa-check bigger-110"></i>Enregistrer</button>
                        <a href="liste_tarification.php" class="btn"  style=" background-color: #740505; color:#fff">Ne pas modifier !<i class="ace-icon fa fa-times  bigger-110"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





  <!-- Modal suppression -->
  <div class="modal fade" id="addRowModall" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0" style=" background-color: #062e69; color:#fff" align="center">
                <h5 class="modal-title" align="center">
                    <span class="fw-mediumbold" align="center">Voulez vous vraiment supprimer ?</span>
                </h5>
            </div>
            <?php  
            if (isset($_POST['delete'])) {
              extract($_POST);

              $delete = mysqli_query ($connexion, "DELETE FROM produit WHERE id = '$idss' ");
              echo "<script>
                    window.location.replace('liste_tarification.php');
                    </script>";
              }

             ?>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <input type="hidden" name="idss" id="idss">
                        <div class="col-sm-6">
                            <label for="nom" class="col-form-label">Nom d'utilisateur</label>
                            <input type="text" id="produits" name="produit" class="form-control" readonly />
                        </div>
                        <div class="col-sm-6">
                            <label for="postnom" class="col-form-label">Catégorie</label>
                            <input type="text" id="categories" name="categorie" class="form-control" readonly />
                        </div>
                    </div>
                    
                    <br><br>
                    <div align="center">
                        <button class="btn " type="submit" name="delete" style=" background-color: #740505; color:#fff"><i class="ace-icon fa fa-check bigger-110"></i>Oui Supprimer</button>
                        <a href="liste_tarification.php" class="btn"  style=" background-color: #062e69; color:#fff">Ne pas Supprimer !<i class="ace-icon fa fa-times  bigger-110"></i></a>
                    </div>
                </div>
            </form>
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
  $('#addRowModalll').on('show.bs.modal', function (event) {
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
  $('#addRowModall').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var idss = button.data('idss');
      var produits = button.data('produits');
      var categories = button.data('categories');
     

      var modal = $(this);
      modal.find('#idss').val(idss)
      modal.find('#produits').val(produits)
      modal.find('#categories').val(categories)

      
  });
</script>
  
  </body>
</html>



   

