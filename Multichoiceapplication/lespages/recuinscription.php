

<?php 
  
  $ref_etu=$_GET['ref'];
  require_once("connexion.php");
  $resultat= $connexion -> query("select * from etudiant where reference_etudiant='$ref_etu'");

  $ligne = $resultat->fetch();

  $id=$ligne['id_etudiant'];
  $nom1=$ligne['nom_etudiant'];
  $prenom1=$ligne['prenom_etudiant'];
  $tel1=$ligne['tel_etudiant'];
  $email1=$ligne['email_etudiant']; 
  $adress1=$ligne['adresse_etudiant'];
  $ref_etu1=$ligne['reference_etudiant']; 
  $ref_inscri1=$ligne['reference_inscription'];
  $date_inscri1=$ligne['date_inscription']; 
                 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MultiChoice Center</title>
    <script>
    function imprimer(divName) {
      var printContents = document.getElementById("impr_inscri").innerHTML;    
      var originalContents = document.body.innerHTML;      
      document.body.innerHTML = printContents;     
      window.print();     
      document.body.innerHTML = originalContents;
    }
    </script>
    <!-- Favicon icon -->
    <?php include_once('linkstyle.html'); ?>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Header and Sidebar
        ***********************************-->
        <?php include_once('nav_header_all.php'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
        
                <div style="float: right;"><a href="affichageetudiant.php"><i class="bi bi-x-circle" style="font-size: 30px;color:red;"></i></a></div>
                <div id="impr_inscri" name="impr_inscri">
                <div class="div_imp">
                      <img src="../images/multi.svg" class="img_imp">
                </div>
                
                    <table class="recu_inscri">
                      <tr>
                        <td>
                          <h3>Réferece etudiant</h3>
                          <p><?php echo $ref_etu ;?></p>
                      </td>
                        <td>
                          <h3>Réferece Inscription</h3>
                          <p><?php echo $ref_inscri1 ;?></p>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <h3>Nom</h3>
                          <p><?php echo $nom1 ;?></p>
                        </td>

                        <td>
                          <h3>Prénom</h3>
                          <p><?php echo $prenom1 ;?></p>
                        </td>
                      </tr>

                      <tr>
                        <td>                  
                          <h3>Date inscription</h3>
                          <p><?php echo $date_inscri1 ;?></p>
                        </td>
                        <td></td>
                      </tr>
                      
                      <tr>
                        <td></td>
                        <td><h3>Cacher du Centre</h3></td>
                      </tr>
                    </table>                             
                </div>
              <button id="btn_imprimer" class="btn btn-primary" onclick="imprimer('impr_inscri')">Imprimer le Reçu</button>
            
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->

    <?php include_once('linkjs.html');?>

</body>

</html>