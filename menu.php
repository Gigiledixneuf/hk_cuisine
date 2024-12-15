<?php 
include ('db/connexion.php');


// Session, login ou connexion utilisateur
session_start();

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$noms = $_SESSION['noms'];
$fonction = $_SESSION['fonction'];
$tel = $_SESSION['tel'];
 ?>



 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>HKC</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="photos/logo.PNG"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
   <body>
    <div class="wrapper">

    	<div class="sidebar">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header "  style=" background-color: #062e69; ">
            <div style="display: flex; align-items: center; height: 100px;">
              <a href="accueil.php" class="logo" >
                <h1 class="text-white">HK-CUISINE</h1>
              </a>
            </div>
            
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner" >
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                  href="accueil.php"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Accueil</p>
                </a>
              </li>

               
              
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section text-black">Gestion des opérations</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-money-bill-wave"></i>
                  <p>Encaissement</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="caisse.php">
                        <span class="sub-item">Vente</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>



              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts">
                  <i class="fas fa-archive"></i>
                  <p>Commande encours</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="liste_comande.php">
                        <span class="sub-item">Commande en attente</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>




              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayoutsx">
                  <i class="fas fa-print"></i>
                  <p>Gestion des factures</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="sidebarLayoutsx">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="liste_facture.php">
                        <span class="sub-item">Liste des factures</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>


             <?php 
             if ($fonction == 'Administrateur' || $fonction == 'Comptable') {      
             ?>
             <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section text-black">Comptabilité</h4>
              </li>
              
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#Rapport">
                  <i class="fas fa-print"></i>
                  <p>Rapport financier</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="Rapport">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="rapport.php">
                        <span class="sub-item">Etablir un rapport</span>
                      </a>
                    </li>
                    
                   
                  </ul>
                </div>
              </li>

             <?php } ?>

             <?php 
             if ($fonction=='Administrateur') {
              // avec ce code on gère la delimitation
             ?>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section text-black">Parametres</h4>
              </li>
              

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#users">
                  <i class="fas fa-cogs"></i>
                  <p>Gestion des tarifications</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="users">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="ajout_produit.php">
                        <span class="sub-item">Ajouter un produit</span>
                      </a>
                    </li>
                    <li>
                      <a href="liste_tarification.php">
                        <span class="sub-item">Liste des produits</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>



                 <li class="nav-item">
                <a data-bs-toggle="collapse" href="#charts">
                  <i class="fas fa-users-cog"></i>
                  <p>Gestion des utilisateurs</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="charts">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="utilisateur.php">
                        <span class="sub-item">Ajouter un utilisateur</span>
                      </a>
                    </li>
                    <li>
                      <a href="liste_users.php">
                        <span class="sub-item">Liste utilisateur</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <?php } ?>

              <li class="nav-item">
                <a
                  href="index.php"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-sign-out-alt"></i>
                  <p>Déconnexion</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->
       <div class="main-panel">
        <div class="main-header">
          <!-- Navbar Header -->
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" style=" background-color: #062e69; " >
            <a href="accueil.php" class="logo">
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
            <!-- End Logo Header -->
          </div>
            <!-- End Logo Header -->
          </div>
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom " style=" background-color: #062e69; "
         >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fas fa-clock text-dark"></i>
                    </button>
                  </div>
                  <a href="#" class="form-control text-dark" >
                    <?php
                    $jour = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
                    $date = date("d/m/Y");
                    $heure = date("H:i");
                    $jour_semaine = $jour[date("w")];
                    echo "$jour_semaine, $date $heure";
                    ?>
                  </a>
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="photos/logo.PNG"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="fw-bold" style=" color: white; "><?php echo $username; ?>,</span>
                      <span class="op-7" style=" color: white; "><?php echo $fonction; ?></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer " style=" background-color: #062e69; " >
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="photos/logo.PNG"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4 style=" color: white; "><?php echo $username; ?></h4>
                            <p style=" color: white; "><i class="fas fa-circle text-success"></i> En ligne</p>
                            
                          </div>
                        </div>
                      </li>
                      <li style=" background-color: white; ">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" style=" color: black;  " >Nom utilisateur : <?php echo $username; ?></a>
                        <a class="dropdown-item" href="#" style=" color: black; " > Fonction : <?php echo $fonction; ?></a>
                        <a class="dropdown-item" href="#" style=" color: black; " >Téléphone : <?php echo $tel; ?></a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php" style=" color: black; "><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>


