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
                      <h4 class="card-title">Rapport de Ventes</h4>
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
                        style=" background-color: #062e69; " 
                        href="#"
                      >

                      Montant total perçu : <?php 
                      if (isset($_POST['cherche'])) {
                          extract($_POST);
                      $req = mysqli_query($connexion, "SELECT SUM(montant) as total_vente FROM caisse WHERE etat = 1  AND date_paye BETWEEN '$debut' AND '$fin'  ");
               
                      while ($garde = mysqli_fetch_assoc($req)) { 
                      echo number_format($garde['total_vente'],2)."  CDF";

                       }
                       } ?>
                        
                      </a>


                      
                      
                      
                      
                      </div>
                      
                    </div>
                  </div>
                  <div class="card-header">
                    <form  method="post">
                       
                          <div class="row">
                            <div class="col-sm-5">
                              <label>Date début</label>
                              <input type="date" name="debut" class="form-control">
                            </div>
                            <div class="col-sm-5">
                              <label>Date fin</label>
                              <input type="date" name="fin" class="form-control">
                            </div>
                            <div class="col-sm-2">
                              <label>.</label>
                              <input type="submit" name="cherche" class="form-control btn" value="Chercher" style=" background-color: #062e69; color: #fff; border-radius: 5px; ">
                            </div>
                          </div>
                        </form>
                  </div>
                  <div class="card-body">
                    

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                            <tr>
                                <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Date</center></th>
                                <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Numero de référence</center></th>
                                <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Designation</center></th>
                                <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Prix</center></th>
                                <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Quantité</center></th>
                                <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Agent</center></th>
                                <th style=" background-color: #062e69; color: white; " nowrap="none"><center>Prix total</center></th>
                                
                                
                              </tr>
                        </thead>
                        <tbody>
                         <!-- Afficher les réceptions uniquement si des réceptions ont été trouvées -->
                         <?php 
                          if (isset($_POST['cherche'])) {
                              extract($_POST);

                              // Vérifiez si les dates sont valides
                              if (empty($debut) || empty($fin)) {
                                  echo "<script>alert('Veuillez entrer des dates de début et de fin valides.');</script>";
                              } else {
                                  // Requête SQL
                                  $req = mysqli_query($connexion, "SELECT * FROM caisse WHERE etat = 1 AND date_paye BETWEEN '$debut' AND '$fin'");
                                  
                                  // Vérifiez si des résultats sont trouvés
                                  if (mysqli_num_rows($req) > 0) {
                                      while ($garde = mysqli_fetch_assoc($req)) { ?>
                                          <tr>
                                              <td style="white-space: nowrap; overflow: hidden;"><center><?php echo $garde['date_paye']; ?></center></td>
                                              <td style="white-space: nowrap; overflow: hidden;"><?php echo $garde['numero_facture']; ?></td>
                                              <td style="white-space: nowrap; overflow: hidden;"><?php echo $garde['categorie']; ?></td>
                                              <td style="white-space: nowrap; overflow: hidden;"><?php echo number_format($garde['prix'], 2) . " CDF"; ?></td>
                                              <td style="white-space: nowrap; overflow: hidden;"><?php echo $garde['quantite']; ?></td>
                                              <td style="white-space: nowrap; overflow: hidden;"><?php echo $garde['agent']; ?></td>
                                              <td style="white-space: nowrap; overflow: hidden;"><?php echo number_format($garde['montant'], 2) . " CDF"; ?></td>
                                              
                                          </tr>
                                      <?php }
                                  } else {
                                      // Message si aucun résultat
                                      echo "<tr><td colspan='7'><center>Aucun résultat trouvé pour la période sélectionnée.</center></td></tr>";
                                  }
                              }
                          }
                          ?>
                          <tr>
                            <th colspan="6">Total :</th>
                            <td>
                            <?php 
                              if (isset($_POST['cherche'])) {
                                  extract($_POST);
                              $req = mysqli_query($connexion, "SELECT SUM(montant) as total_vente FROM caisse WHERE etat = 1  AND date_paye BETWEEN '$debut' AND '$fin'  ");
                       
                              while ($garde = mysqli_fetch_assoc($req)) { 
                              echo number_format($garde['total_vente'],2)."  CDF";

                              }
                              } ?>
                            </td>
                          </tr>

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


   
  
  </body>
</html>



    


















