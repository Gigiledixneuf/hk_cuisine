<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS recu</title>
</head>
<style>
body {
  font-family: 'Courier New', Courier, monospace; 
  margin: 0;
  padding: 0;
  background-color: #fff;
}

.recu {
  width: 310px; 
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ddd;
  text-align: center;
}

.img_logo img{
  height: 50%;
  width: 50%;
}

h1 {
  font-size: 20px;
  margin: 0 0 10px;
}

p, td, th {
  font-size: 15px;
  line-height: 1.4;
  margin: 0;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin: 12px 0;
}



th {
  border-bottom: 1px dashed #000;
  font-weight: bold;
}

td {
  padding: 5px 0;
}

hr {
  border: none;
  border-top: 1px dashed #000;
  margin: 10px 0;
}

.totals p {
  margin-left: 80px;
  margin-top: 20px;
}

.totals2 p {
  margin-left: 30px;
  margin-top: 10px;
}
.operateur p {
  text-align: center;
  margin-top: 10px;
  margin-bottom: 20px;

}

.barcode {
  width: 100%;
  height: 50px;
  margin: 10px 0;
}

.merci {
  font-size: 12px;
  margin-top: 110px;
  font-weight: bold;
}

</style>
<body>
  <?php
  // Connexion à la base de données
  $db = new PDO('mysql:host=localhost;dbname=bd_hk', 'root', '');
  $connexion = mysqli_connect("localhost", "root", "", "bd_hk");

  if (!$connexion) {
      die("Erreur de connexion à la base de données : " . mysqli_connect_error());
  }




  // Initialisation des variables
  $noms_client = '';
  $nom_agent = '';
  $portable = '';
  $numero_facture = '';
  $tableContent = '';
  $sommeTotal = 0;


  // Vérifier si le numéro de facture est passé dans l'URL
  if (!isset($_GET['code_facture'])) {
      die('Erreur : aucun numéro de facture passé dans l\'URL.');
  }

  $code_facture = mysqli_real_escape_string($connexion, $_GET['code_facture']);

  // Requête pour récupérer les données de la facture
  $datas = mysqli_query($connexion, "SELECT * FROM caisse WHERE code_facture = '$code_facture'");

  while ($garde = mysqli_fetch_assoc($datas)) {
      $noms_client = $garde['client'];
      $nom_agent = $garde['agent'];
      $portable = $garde['portable'];
      $code_facture = $garde['code_facture'];
      $dates= date('d-m-Y');
      $heure = date('H:i');

      $numero_facture = $garde['numero_facture'];

      // qr code generation 
      $qr_data = 'Numéro facture : ' . $numero_facture . ', Nom : ' . $noms_client . ', Portable : ' . $portable . ', Date : ' . $dates . ', Heure : ' . $heure . ', Opérateur : ' . $nom_agent;
      $qr_code_url = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($qr_data) . "&size=150x150";


      $barcode_url = "https://barcode.tec-it.com/barcode.ashx?data=" . $numero_facture . "&type=Code128";

      $nom_produit = $garde['produit'];
      $quantite = $garde['quantite'];
      $prix_vente = $garde['prix'];

      $sommeTotal += $garde['montant'];

      
    }
  ?>

  <div class="recu">
    <div class="img_logo">
      <a href="liste_facture.php"><img src="photos/logo.PNG"></a>
    </div>
    <h1>Est HK_Cuisine</h1>
    <p>**************</p>
    <div class="info">
      <p>Date  : <?php echo date('d-m-Y'); ?></p>
      <p>Heure : <?php echo date('H:i'); ?></p>
    </div>
    <p>*********************************</p>
    <div class="info">
      <p>No jeton : <?php echo $code_facture; ?></p>
      <p>No de Reçu : <?php echo $numero_facture; ?></p>
      <p>Mr/Mme : <?php echo $noms_client; ?></p>
      <p>Portable : <?php echo $portable; ?></p>
    </div>
    <p>**************************</p>
    <div class="info">
      <p>15e Rue, Motel Fikin,</p>
      <p>Quartier Résidentiel,</p>
      <p>Commune de Limete.</p>
      <p>RCCM : KNM/RCCM/23-A-00196</p>
      <p>IDNAT : A2421830F,</p>
      <p>Tel : +243827703184 </p>
    </div>
    <p>**********************************</p>
    <table>
      <thead>
        <tr>
          <th>Produit</th>
          <th>Qte</th>
          <th>Prix</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $datas = mysqli_query($connexion, "SELECT * FROM caisse WHERE code_facture = '$code_facture'");
          while ($garde=mysqli_fetch_assoc($datas)) { ?>
        <tr>
          <td><?php echo $garde['produit']; ?></td>
          <td><?php echo $garde['quantite']; ?></td>
          <td><?php echo number_format($garde['prix'],2)."  CDF"; ?></td>
        </tr>
        <?php } ?>

      </tbody>
    </table>
    <hr>
    <div class="totals">
      <p><strong>Total:</strong> <?php echo number_format($sommeTotal,2)."  CDF"; ?></p>
    </div>
    <div class="totals2">
      <p><strong>Valeur Total:</strong> <?php echo number_format($sommeTotal,2)."  CDF"; ?></p>
    </div>
    <hr>
    <div class="operateur">
      <p><strong>Operateur</strong> : <?php echo $nom_agent; ?></p>
    </div>
    <div class="barcode">
    <img src="<?php echo $qr_code_url; ?>" alt="Code-barres">
    </div>

    <p class="merci">Aurevoir !<br>Merci pour votre confiance</p>
  </div>
</body>
</html>
