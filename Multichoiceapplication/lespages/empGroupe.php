<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MultiChoice Center</title>

    <script>
        function imprimer(divName) {
        var printContents = document.getElementById("emploi_groupe").innerHTML;    
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
<style>
        .txt_rech{
            border: none;
            border-radius: none;
            transition: 0.3s ease;
            width: 200px;
            background:transparent;
            outline: none;
        }

        .div_rech{
            margin-bottom: 10px;
            display: inline-block;
            border-bottom: 3px solid orange;
        }

        .div_rech p{
            text-transform: uppercase;
            color: orange;
            text-decoration: underline;
        }

        #btn_rech{
            background: transparent;
            border: none;
        }

        #btn_rech i{
            font-size: 20px;
            font-weight: bold;
            color: orange;
            
        }

    </style>

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
        <form action="#" method="post">
                
                <div class="div_rech">
                        <input class="txt_rech"  type="text" id="" placeholder="Nom Groupe" name="nom_group" style="margin-right: 20px;" required>

                        <button id="btn_rech" type="submit" name="btn_rech"  ><i class="bi bi-search" ></i></button>
                <!-- <button  type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></button> -->
                </div>
                <button style="float:right;" class="btn btn-warning" onclick="imprimer('emploi_groupe')">Imprimer</button>
            
        </form>

        <div class="div_table" id="emploi_groupe" name="emploi_groupe" >
                <table class=""  >
                <thead class="" >
                    
                    
                    <tr>
                        <td></td>
                        <td colspan="2">MATIN</td>
                        <td></td>
                        <td colspan="2">APRES MIDI</td>
                        
                        
                    </tr>
                </thead>
                    <thead class="" >
                    
                    
                    <tr>
                        <th>Jour/Heure</th>
                        <th>8-10</th>
                        <th>10-12</th>
                        <th></th>
                        
                        <th>14-16</th>
                        <th>16-18</th>
                        
                    </tr>
                </thead>
                <tr>
                    <td>Lundi</td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Lundi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>



                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Lundi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>


                    </td>
                    <td></td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Lundi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Lundi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                </tr>
                <tr>
                    <td>Mardi</td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Mardi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>

                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Mardi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td></td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Mardi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Mardi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                </tr>
                <tr>
                    <td>Mercredi</td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Mercredi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Mercredi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Mercredi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Mercredi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                </tr>
                <tr>
                    <td>Jeudi</td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Jeudi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Jeudi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td></td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Jeudi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Jeudi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                </tr>
                <tr>
                    <td>Vendredi</td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Vendredi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Vendredi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?></td></td>
                    </td>
                    <td></td>
                    <td>

                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Vendredi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Vendredi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <td>Samedi</td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Samedi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Samedi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?>
                    </td>
                    <td></td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Samedi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?>
                    </td>
                    <td>
                    <?php
                    $afficher="non";
                            if(isset($_POST["btn_rech"])){
                                if(isset($_POST["nom_group"])){
                                    require_once("connexion.php");
                                    $nomg=trim($_POST["nom_group"]) ;
                                    
                                    //Samedi 16-18
                                    $resultat= $connexion -> query("select sl.nom_salle , fr.nom_formateur,fr.prenom_formateur,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe
                                     join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
                                      where g.nom_groupe = '$nomg' and s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Samedi' ");
                                    if($resultat-> rowCount()>0){
                                        $ligne = $resultat ->fetch();
                                        $ref_sall=$ligne['nom_salle'];
                                        $nom = $ligne['nom_formateur'];
                                        
                                        $formation = $ligne['libelle_formation'];
                                        $prenom = $ligne['prenom_formateur'];
                                        $afficher="oui";
                                    }else{
                                        $trouver=false;
                                    }

                                                      
                            }
                        }
                        ?>
                        <?php if($afficher=="oui") : ?>
                            <?php echo 'Salle : '. $ref_sall ?><br>
                            <?php echo 'Formateur : '. $nom." ".$prenom?><br>
                            <?php echo 'Formation : '. $formation ?>
                        
                        <?php endif;?>
                    </td>
                </tr>


                </table>
        </div>
    </div>
        <!--**********************************
            Content body end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <style>
       
        
    </style>                       

    <!--**********************************
        Scripts
    ***********************************-->

    <?php include_once('linkjs.html');?>

</body>

</html>