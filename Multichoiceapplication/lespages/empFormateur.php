
<?php
$nbr=0;
//select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation
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
        var printContents = document.getElementById("emploi_formateur").innerHTML;    
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
           
                <div style="margin-right: 20px"; class="div_rech">
                    <input class="txt_rech" type="text" placeholder="Nom Formateur" name="txt_rech_nom" required>
                </div>

                <div class="div_rech">
                    <input class="txt_rech" type="text" placeholder="Prénom Formateur" name="txt_rech_pre" required>
                </div>
                <button id="btn_rech" type="submit" name="btn_rech"  ><i class="bi bi-search" ></i></button>
                <!-- <button  type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></button> -->
                <button style="float:right;" class="btn btn-warning" onclick="imprimer('emploi_formateur')">Imprimer</button>

        </form>

       
            
            <?php if($nbr==1) : ?>
                <div class="alert alert-danger" style="width: 30%; margin: 0 auto; height: 50px; text-align: center;position: absolute;transform:translate(355px,10px);">Le Formateur n'existe pas</div>
            <?php else: ?>
                
            <div class="div_table" id="emploi_formateur" name="emploi_formateur" >
                    <table class=""  >
                    <thead class="" >
                        
                        
                        <tr >
                            <td></td>
                            <td colspan="2">MATIN</td>
                            <td ></td>
                            <td colspan="2">APRES MIDI</td>
                            
                            
                        </tr>
                    </thead>
                        <thead class="" >
                        
                        
                        <tr>
                            <td>Jour/Heure</th>
                            <td>8-10</th>
                            <td>10-12</th>
                            <td></th>
                            
                            <td>14-16</th>
                            <td>16-18</th>
                            
                        </tr>
                    </thead>
                    <tr>
                   
                        
                            <td>Lundi</th>
                        
                            <td>
                            <?php
                            $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Lundi 8-10
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Lundi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }
                                                           
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                                <?php endif;?>
                            </td>
                        
                      
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Lundi 10-12
                                        $resultatt= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Lundi' ");
                                        if($resultatt-> rowCount()>0){
                                            $ligne = $resultatt ->fetch();
                                            $ref_sallt=$ligne['nom_salle'];
                                            $groupt = $ligne['nom_groupe'];
                                            $formationt = $ligne['libelle_formation'];
                                            $affichert="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }
                                                          
                                }
                                
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            

                                <?php endif;?>
                        </td>
                        
                        <td> </td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Lundi 14-16
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Lundi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?>
                        </td>
                        <td>
                            <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Lundi 14-16
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Lundi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?>
                        </td>
                        
                    </tr>
                    <tr>
                    
                        <td>Mardi</th>
                        <td>
                            <?php
                                 $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Mardi 08-10
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Mardi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?>
                        </td>
                        <td>
                        <?php
                                 $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //mardi 10-12
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Mardi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?>
                        </td>
                        <td></td>
                        <td>
                            <?php
                            $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //mardi 14-16
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Mardi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        <td>
                            <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //mardi 16-18
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Mardi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                    
                        <td>Mercredi</th>
                        <td>
                            <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Mercredi 08-10
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Mercredi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Mercredi 10-12
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Mercredi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>
                        <td></td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Mercredi 14-16
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Mercredi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Mercredi 16-18
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Mercredi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>

                    </tr>
                    <tr>
                    
                        <td>Jeudi</th>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Jeudi 08-10
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Jeudi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Jeudi 10-12
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Jeudi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>
                        <td></td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Mercredi 14-16
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Jeudi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Mercredi 16-18
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Jeudi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>

                    </tr>
                    <tr>
                    
                        <td>Vendredi</th>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Vendredi 08-10
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Vendredi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Vendredi 10-10
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Vendredi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>
                        <td></td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Vendredi 14-16
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Vendredi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td>
                        </td>
                        <td><?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Vendredi 16-18
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Vendredi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td></td>

                    </tr>
                    <tr>
                    
                        <td>Samedi</th>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Samedi 08-10
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Samedi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td></td>
                        </td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Samedi 10-12
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Samedi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td></td>
                        </td>
                        <td></td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Samedi 14-16
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Samedi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }

                                                          
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td></td>
                        </td>
                        <td>
                        <?php
                        $afficher="non";
                                if(isset($_POST["btn_rech"])){
                                    if(isset($_POST["txt_rech_nom"]) && isset($_POST["txt_rech_pre"])){
                                        require_once("connexion.php");
                                        $nom=trim($_POST["txt_rech_nom"]) ;
                                        $prenom=trim($_POST["txt_rech_pre"]);
                                        //Samedi 16-18
                                        $resultat= $connexion -> query("select sl.nom_salle , g.nom_groupe,fm.libelle_formation from seance s join groupe g on s.id_groupe=g.id_groupe 
                                        join salle sl on sl.id_salle=s.id_salle join formateur fr on fr.id_formateur=g.id_formateur join formation fm on g.id_formation=fm.id_formation where fr.nom_formateur='$nom' and fr.prenom_formateur='$prenom' 
                                        and  s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Samedi' ");
                                        if($resultat-> rowCount()>0){
                                            $ligne = $resultat ->fetch();
                                            $ref_sall=$ligne['nom_salle'];
                                            $group = $ligne['nom_groupe'];
                                            $formation = $ligne['libelle_formation'];
                                            $afficher="oui";
                                            $nbr+=1;
                                        }else{
                                            $trouver=false;
                                        }                                   
                                }
                            }
                            ?>
                            <?php if($afficher=="oui") : ?>
                                <?php echo 'Salle : '. $ref_sall ?><br>
                                <?php echo 'Groupe : '. $group ?><br>
                                <?php echo 'Formation : '. $formation ?>
                            
                            <?php endif;?></td></td>
                        </td>

                    </tr>

            </div>
            <?php endif; ?>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


    </div>

    <style>

      
    </style>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->

    <?php include_once('linkjs.html');?>

</body>

</html>