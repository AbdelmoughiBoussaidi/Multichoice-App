<div class="my_navbarok">
  <nav class="sidebar" style="position: fixed;">
    <ul class="nav">
      
      <li class="nav-item">
        <a class="nav-link" style="color: white;" href="#" id="dashboard" >
          <i class="fa fa-th-large" aria-hidden="true"></i>
          <span class="menu-title" style="font-weight: bold;font-size: 18px;color: white;" >Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" style="color: white;" data-toggle="collapse" href="#ope_formation" aria-expanded="false" aria-controls="">
          <i class="fa-solid fa-language"></i>
          <span class="menu-title">Formations</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ope_formation">
          <ul class="nav flex-column sub-menu">
            <a class="my_nav" href="affichageforma.php"><i class="bi bi-cast" ></i>Afficher</a>
            <a class="my_nav" href="ajouformation.php"><i class="bi bi-plus-circle"></i>Nouvelle Formation</a>
          </ul>
        </div>
      </li>

      <li class="nav-item" id="me">
        <a class="nav-link" style="color: white;"  data-toggle="collapse" href="#ope_etudiant" aria-expanded="false" aria-controls="">
          <i class="fa fa-graduation-cap" aria-hidden="true"></i>
          <span class="menu-title">Etudiants</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ope_etudiant">
          <ul class="nav flex-column sub-menu">
            <a class="my_nav" href="affichageetudiant.php"><i class="bi bi-cast"></i>Afficher</a>
            <a class="my_nav" href="ajoutetu.php"><i class="bi bi-person-plus"></i>Inscription</a>
            <a class="my_nav" href="choixfilier.php"><i class="bi bi-hand-index-thumb"></i>Choix Formation</a>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" style="color: white;"  data-toggle="collapse" href="#ope_formateur" aria-expanded="false" aria-controls="charts">
        <i class="fa-solid fa-suitcase"></i>
          <span class="menu-title">Formateurs</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ope_formateur">
          <ul class="nav flex-column sub-menu">
            <a class="my_nav" href="affichageformateur.php"><i class="bi bi-cast"></i>Afficher</a>
            <a class="my_nav" href="ajoutformateur.php"><i class="bi bi-person-plus"></i>Nouveau</a>
          </ul>
        </div>
      </li>

      <?php if($_SESSION['role_utili']=="Gérant") : ?>

        <li class="nav-item">
          <a class="nav-link" style="color: white;"  data-toggle="collapse" href="#ope_users" aria-expanded="false" aria-controls="tables">
          <i class="fa-solid fa-user-tie"></i>
            <span class="menu-title">Utilisateurs</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ope_users">
            <ul class="nav flex-column sub-menu">
              <a class="my_nav" href="affichageuser.php"><i class="bi bi-cast"></i>Afficher users</a>
              <a class="my_nav" href="ajoutuser.php"><i class="bi bi-person-plus"></i>Nouveau user</a>
            </ul>
          </div>
        </li>

      <?php endif ; ?>

      <li class="nav-item">
        <a class="nav-link" style="color: white;"  data-toggle="collapse" href="#ope_groupe" aria-expanded="false" aria-controls="icons">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span class="menu-title">Groupes</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ope_groupe">
          <ul class="nav flex-column sub-menu">
            <a class="my_nav" href="affichagegroupe.php"><i class="bi bi-cast"></i>Afficher</a>
            <a class="my_nav" href="ajoutgroupe.php"><i class="bi bi-people-fill"></i>Nouveau Groupe</a>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" style="color: white;"  data-toggle="collapse" href="#ope_salle" aria-expanded="false" aria-controls="auth">
          <i class="fa-solid fa-building-columns"></i>
          
          <span class="menu-title">Salle</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ope_salle">
          <ul class="nav flex-column sub-menu">
            <a class="my_nav" href="affichage_salle.php"><i class="bi bi-cast"></i>Afficher</a>
            <a class="my_nav" href="ajoutsalle.php"><i class="bi bi-plus-circle"></i>Nouvelle Salle</a>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" style="color: white;"  data-toggle="collapse" href="#ope_paiement" aria-expanded="false" aria-controls="auth">
        <i class="fa-solid fa-sack-dollar"></i>
          <span class="menu-title">Paiements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ope_paiement">
          <ul class="nav flex-column sub-menu">
             <a class="my_nav" href="affichage_paiement.php"><i class="bi bi-cash-coin"></i>Les paiements</a>
             <a class="my_nav" href="affi_paiem_date.php"><i class="bi bi-search"></i>Par Date</a>
             <a class="my_nav" href="affi_paiem_etu.php"><i class="bi bi-search"></i>Par Etudiant</a>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" style="color: white;"  data-toggle="collapse" href="#ope_emploi" aria-expanded="false" aria-controls="auth">
        <i class="fa-regular fa-calendar-days"></i>
          <span class="menu-title">Emplois du Temps</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ope_emploi">
          <ul class="nav flex-column sub-menu">
            <a class="my_nav" href="emplois.php"><i class="bi bi-cast"></i>Afficher</a>
            <a class="my_nav" href="empFormateur.php"><i class="bi bi-calendar3"></i></i>Formateur</a>
            <a class="my_nav" href="empGroupe.php"><i class="bi bi-calendar3"></i></i>Groupe</a>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" style="color: white;"  data-toggle="collapse" href="#ope_absence" aria-expanded="false" aria-controls="auth">
          <i class="fa fa-user-times" aria-hidden="true"></i>
          <span class="menu-title">Absence</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ope_absence">
          <ul class="nav flex-column sub-menu">
            <a class="my_nav" href="affichageabsence.php"><i class="bi bi-cast"></i>Afficher</a>
            <a class="my_nav" href="ajoutabsence.php"><i class="bi bi-person-x-fill"></i>Etudiant absent</a>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" style="color: white;"  data-toggle="collapse" href="#ope_statisqtique" aria-expanded="false" aria-controls="auth">
        <i class="fa-solid fa-chart-column"></i>
          <span class="menu-title">Statistique</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ope_statisqtique">
          <ul class="nav flex-column sub-menu">
            <a class="my_nav" href="staticEtudiant.php"><i class="bi bi-cast"></i>Des Paiements</a>
            <a class="my_nav" href="staticPiement.php"><i class="bi bi-person-x-fill"></i>Des Etudiants</a>
          </ul>
        </div>
      </li>

    </ul>
  </nav>
</div>
  
  