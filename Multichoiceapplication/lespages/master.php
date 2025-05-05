<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Multi Choice</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/monstyle.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/multichoicemini.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><img src="../images/multi.svg" class="mr-2" alt="logo" id="img_full_logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="../images/Multichoiceminis.jpg" alt="logo" id="img_mini_logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" id="nav_right">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu" style="color: white;"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
          <p id="name">moughit</p>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../images/stoph.jpeg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                paramétres
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                se déconnecter
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>

    <!--ggggggggggggggggggggggg-->


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          
          <li class="nav-item">
            <a class="nav-link" href="index.html" id="dashboard">
              <i class="icon-grid menu-icon" style="color: white;"></i>
              <span class="menu-title" style="color: white;" >Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ope_formation" aria-expanded="false" aria-controls="">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Formations</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ope_formation">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="affichageforma.php">Afficher</a></li>
                <li class="nav-item"> <a class="nav-link" href="ajouformation.php">Nouvelle formation</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ope_etudiant" aria-expanded="false" aria-controls="">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Etudiants</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ope_etudiant">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="affichageetudiant.php">Afficher les etudiants</a></li>
                <li class="nav-item"> <a class="nav-link" href="ajoutetu.php">Inscrire un etudiant</a></li>
                <li class="nav-item"> <a class="nav-link" href=".php">Choix filier</a></li>
                <li class="nav-item"> <a class="nav-link" href="rechercheretudiant.php">Rechercher</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ope_formateur" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Formateurs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ope_formateur">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="affichageformateur.php">Afficher</a></li>
                <li class="nav-item"> <a class="nav-link" href="ajoutformateur.php">Nouveau formateur</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Utilisateurs</span>
              <i class="menu-arrow"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Groupes</span>
              <i class="menu-arrow"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Employés</span>
              <i class="menu-arrow"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Paiements</span>
              <i class="menu-arrow"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Emplois du temps</span>
              <i class="menu-arrow"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth" name="login">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Inscription</span>
              <i class="menu-arrow"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Absence</span>
              <i class="menu-arrow"></i>
            </a>
          </li>   
        </ul>
      </nav>

      <!-- MAIN PAGE -->
      <div style="width: 100%; margin:20px;">

      </div>
      
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../s/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>