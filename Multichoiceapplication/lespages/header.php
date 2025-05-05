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

     <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" id="div_logo_img">
          <a class="navbar-brand brand-logo mr-5" href="#"><img src="../images/multi.svg" class="mr-2" alt="logo" id="img_full_logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="../images/Multichoiceminis.jpg" alt="logo" id="img_mini_logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" id="nav_right">
           <!--toggeler  -->
           <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu" style="color: white;"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <p id="name"><?php echo $nom.' '.$prenom ?></p>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="../imageusers/<?php echo $image?>" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                  <i class="ti-settings text-primary"></i>
                  paramétres
                </a>
                <a class="dropdown-item" href="deconnexion.php">
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
