<?php 
    session_start();

      
      
      $id=$_SESSION['id_utili'];
      $nom=$_SESSION['nom_utili'];
      $prenom=$_SESSION['prenom_utili'];
      $mdp=$_SESSION['mdp_utili'];
      $email=$_SESSION['email_utili'];
      $role=$_SESSION['role_utili'];
      $image=$_SESSION['image_utili'];

      if(!isset($nom) && !isset($prenom) && !isset($mdp) && !isset($email) && !isset($role) && !isset($image)){
          header("location:login.php");
      }
      
      include_once("connexion.php");

?>

<!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="" class="brand-logo">

                <img  class="logo-abbr" src="../images/multiminid.png" alt="">
                <img style="width: 250px;" class="brand-title" src="../images/multitext.png" alt="">
                
            </a>

            <div style="position: absolute; bottom:-15px ; " class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div style="height: 80px;  background-color:rgba(255, 195, 0,0.2) ; backdrop-filter: blur(3px);border-bottom: 1px solid orange;" class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown" >
                                <a class="nav-link dz-fullscreen primary" href="#" style="background: white;">
                                    <svg id="Capa_1" enable-background="new 0 0 482.239 482.239" height="22" viewBox="0 0 482.239 482.239" width="22" xmlns="http://www.w3.org/2000/svg"><path d="m0 17.223v120.56h34.446v-103.337h103.337v-34.446h-120.56c-9.52 0-17.223 7.703-17.223 17.223z" fill=""/><path d="m465.016 0h-120.56v34.446h103.337v103.337h34.446v-120.56c0-9.52-7.703-17.223-17.223-17.223z" fill=""/><path d="m447.793 447.793h-103.337v34.446h120.56c9.52 0 17.223-7.703 17.223-17.223v-120.56h-34.446z" fill="" /><path d="m34.446 344.456h-34.446v120.56c0 9.52 7.703 17.223 17.223 17.223h120.56v-34.446h-103.337z" fill=""/></svg>
                                </a>
                            </li>


                            <li class="nav-item dropdown header-profile">

                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <div class="header-info">
                                        <span>Bonjour, <strong><?php echo $nom.' '.$prenom ?></strong></span>
                                    </div>
                                    <img  src="../imageusers/<?php echo $image?>" width="20" alt="" />
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item ai-icon" data-toggle="modal" data-target="#exampleModal">
                                        <svg id="icon-user1"  class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    
                                    <a href="deconnexion.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout"  class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Se Déconnecter </span>
                                    </a>
                                </div>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="height: 40px;">
              <h5>Vos Informations</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <a style="cursor: pointer;" data-toggle="modal" data-target="#full_img"><img class="img_param" src="../imageusers/<?php echo $image ?>"></a>
              <form class="form_para" action="Cruduser.php"  method="POST" enctype="multipart/form-data">

                      <div class="form-group">
                          <label id="lb_img" for="img"><i class="bi bi-pencil-square""></i></label>
                          <input value="<?php echo $image; ?>" name="img" type="file" class="form-control form-control-lg" id="img" placeholder="URL image" >  
                      </div>

                      <div class="form-group">
                          <input value="<?php echo $nom; ?>" name="txt_nom" type="text" class="form-control form-control-lg" id="txt_nom" placeholder="Votre Nom" required>
                      </div>

                      <div class="form-group">
                          <input value="<?php echo $prenom; ?>" name="txt_prenom" type="text" class="form-control form-control-lg" id="txt_prenom" placeholder="Votre Prenom" required>
                      </div>
                      
                      <div class="form-group">
                          <input value="<?php echo $email; ?>" name="txt_email" type="email" class="form-control form-control-lg" id="txt_email" placeholder="Votre Email" required>
                      </div>

                      <div class="form-group">
                          <input value="<?php echo $mdp; ?>" name="txt_mdp" type="text" class="form-control form-control-lg" id="txt_mdp" placeholder="Votre mdp" required>
                      </div>
                      
                      <div class="modal-footer" style="height: 40px;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button name="modifier_param" type="submit" class="btn btn-outline-warning" id="#btn_inscri">Enregistrer</button>
                      </div>

                </div>
              </form>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="full_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <img id="img_x" src="../imageusers/<?php echo $_SESSION['image_utili']; ?>">
            </div>
          </div>
        </div>
      </div>


      <style>
          .img_param{
            position: relative;
            bottom:20px ;
            left: 150px;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            
          }

          h5{
            margin-left: 150px;
            color: orange;
            font-size: 20px;
            
          }

          .form_para .form-group{
            width: 70%;
            position: relative;
            bottom: 60px;
          }

          #img{
            display: none;
          }

          #lb_img i{
            color: white;
            font-size: 27px;
            cursor: pointer;
            position: relative;
            text-shadow: 1px 1px 5px orange;
            left: 142px;
          }

          #img_x{
            width: 100%;
            height: 100%;
          }
          
      </style>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">

                    <li>
                        <a style="background-color: orange;color:white ;border-radius: 5px;"  >
                        <i style="font-size: 26px;color: white;" class="fa-brands fa-delicious"></i>
                            <span class="nav-text">DASHBOARD</span>
                        </a>
                        
                    </li>

                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i  class="fa-solid fa-language"></i>
                            <span class="nav-text">Formations</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="affichageforma.php"><i class="bi bi-cast" ></i>Afficher</a></li>
                            <li><a href="ajouformation.php"><i class="bi bi-plus-circle"></i>Nouvelle Formation</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <span class="nav-text">Etudiants</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="affichageetudiant.php"><i class="bi bi-cast"></i>Afficher</a></li>
                            <li><a href="ajoutetu.php"><i class="bi bi-person-plus"></i>Inscription</a></li>
                            <li><a href="choixfilier.php"><i class="bi bi-hand-index-thumb"></i>Choix Formation</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-suitcase"></i>
                            <span class="nav-text">Formateurs</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="affichageformateur.php"><i class="bi bi-cast"></i>Afficher</a></li>
                            <li><a href="ajoutformateur.php"><i class="bi bi-person-plus"></i>Nouveau</a></li>
                        </ul>
                    </li>

                    <?php if($_SESSION['role_utili']=="Gérant") : ?>
                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        
                        <i class="fa-solid fa-user-tie"></i>
                            <span class="nav-text">Utilisateurs</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="affichageuser.php"><i class="bi bi-cast"></i>Afficher</a></li>
                            <li><a href="ajoutuser.php"><i class="bi bi-person-plus"></i>Nouveau User</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="nav-text">Groupes</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="affichagegroupe.php"><i class="bi bi-cast"></i>Affciher</a></li>
                            <li><a href="ajoutgroupe.php"><i class="bi bi-people-fill"></i>Nouveau Groupe</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-building-columns"></i>
                            <span class="nav-text">Salles</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="affichage_salle.php"><i class="bi bi-cast"></i>Afficher</a></li>
                            <li><a href="ajoutsalle.php"><i class="bi bi-plus-circle"></i>Nouvelle Salle</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-sack-dollar"></i>
                            <span class="nav-text">Paiements</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="affichage_paiement.php"><i class="bi bi-cash-coin"></i>Les Paiements</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-calendar-days"></i>
                            <span class="nav-text">Emplois du temps</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="emplois.php"><i class="bi bi-cast"></i>Afficher</a></li>
                            <li><a href="empFormateur.php"><i class="bi bi-calendar3"></i>Formateur</a></li>
                            <li><a href="empGroupe.php"><i class="bi bi-calendar3"></i>Groupe</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-user-times" aria-hidden="true"></i>
                            <span class="nav-text">Absences</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="affichageabsence.php"><i class="bi bi-cast"></i>Afficher</a></li>
                            <li><a href="ajoutabsence.php"><i class="bi bi-person-x-fill"></i>Etudiant Absent</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-chart-column"></i>
                            <span class="nav-text">Statistiques</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="staticEtudiant.php"><i class="bi bi-cast"></i>Génerales</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->