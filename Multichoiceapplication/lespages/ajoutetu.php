<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MultiChoice Center</title>
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
        <?php
                $update = false;
                $nom="";
                $prenom="";
                $tel="";
                $email="";
                $adress="";
                $ref_etu="";
                $ref_inscri="";
                $date_inscri="";
                $type="";

                if(isset($_GET["edit"])){
                    include("connexion.php");
                    $update=true;
            
                    $id=$_GET["edit"];
                    
                    $resultat = $connexion ->query("select * from etudiant where id_etudiant = $id");
                                
                    $ligne = $resultat->fetch();

                    $id=$ligne['id_etudiant'];
                    $nom=$ligne['nom_etudiant'];
                    $prenom=$ligne['prenom_etudiant'];
                    $type=$ligne['type_etudiant'];
                    $tel=$ligne['tel_etudiant'];
                    $email=$ligne['email_etudiant']; 
                    $adress=$ligne['adresse_etudiant'];
                    $ref_etu=$ligne['reference_etudiant']; 
                    $ref_inscri=$ligne['reference_inscription'];
                    $date_inscri=$ligne['date_inscription']; 
                }
            ?>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <?php if($update==false) : ?>
                <i style="font-size: 60px;color:orange;" class="fa-solid fa-graduation-cap"></i>
            <?php elseif($update==true) : ?>
                <i style="font-size: 60px;color:rgb(0, 157, 209);" class="fa-solid fa-graduation-cap"></i>
            <?php endif;?>
            
            <h1 style="display: inline;">Inscrire Un Etudiant</h1>
            <div class="card">
                <form action="Crudetudiant.php" method="post">
                    <div id="div_header" class="row justify-content-between text-left">
                    <?php if($update==false) : ?>
                        <h4 style="color: orange;">Remplir les Informations</h4>
                    <?php elseif($update==true) : ?>
                        <h4 style="color: rgb(0, 157, 209);">Modifier les Informations de l'etudiant</h4>
                    <?php endif;?>
                    </div>
                        <input value="<?php echo $id ?>"type="hidden" name="id_etudiant">

                        <?php if($update==true) : ?>
                            
                            <div class="row justify-content-between text-left">

                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Réference Etudiant<span class="text-danger"> *</span></label> 
                                    <input readonly value="<?php echo $ref_etu; ?>" name="txt_ref_etu" type="text" class="" id="txt_ref_etu" placeholder="Réference Etudiant" required>
                                </div>

                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Réference Inscription<span class="text-danger"> *</span></label> 
                                    <input readonly  value="<?php echo $ref_inscri; ?>" name="txt_ref_inscri" type="text" class="" id="txt_ref_inscri" placeholder="Réference Inscription" required>
                                </div>

                            </div>

                        <?php else : ?>

                            <div class="row justify-content-between text-left">

                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Réference Etudiant<span class="text-danger"> *</span></label> 
                                    <input readonly  value="<?php echo 'Mc'.rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)?>" name="txt_ref_etu" type="text" class="" id="txt_ref_etu" placeholder="Réference Etudiant" required>
                                </div>

                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Réference Inscription<span class="text-danger"> *</span></label> 
                                    <input readonly value="<?php echo 'Multi'.rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)?>" name="txt_ref_inscri" type="text" class="" id="txt_ref_inscri" placeholder="Réference Inscription" required>
                                </div>

                            </div>

                        <?php endif;?>


                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Nom <span class="text-danger"> *</span></label>  
                                <input value="<?php echo $nom; ?>" name="txt_nom" type="text" class="" id="txt_nom" placeholder="Nom" required>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Prénom<span class="text-danger"> *</span></label> 
                                <input value="<?php echo $prenom; ?>" name="txt_prenom" type="text" class="" id="txt_prenom" placeholder="Prenom" required>
                            </div>

                        </div>


                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Télephone <span class="text-danger"> *</span></label> 
                                <input value="<?php echo $tel; ?>" name="txt_tel" type="text" class="" id="txt_tel" placeholder="Télephone" required >
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> 
                                <input value="<?php echo $email; ?>" name="txt_email" type="email" class="" id="txt_email" placeholder="Email" required >
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Adresse <span class="text-danger"> *</span></label> 
                                <input value="<?php echo $adress; ?>" name="txt_adresse" type="text" class="" id="txt_adresse" placeholder="Adresse" required>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Sexe<span class="text-danger"> *</span></label> 
                                <select class="form_select" name="type" id="" required>
                                    <option value="">Sélectionnez le genre</option>
                                    <option value="Homme" <?php if($type=='Homme'){ echo "selected" ;} ?> >Homme</option>
                                    <option value="Femme" <?php if($type=='Femme'){ echo "selected" ;} ?>>Femme</option>
                                </select>
                            </div>
                        </div>


                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Date Inscription <span class="text-danger"> *</span></label> <!--<input type="text" id="email" name="email" placeholder="" onblur="validate(3)">--> 
                                <input value="<?php echo $date_inscri; ?>" name="txt_date_inscri" type="date" class="" id="txt_date_inscri" placeholder="Date Inscription" required >
                            </div>

                            

                        </div>

                        <?php if(isset($_SESSION['message'])) : ?>

                            <div style="width:400px;margin:20px auto;text-align: center;" class="alert alert-<?=$_SESSION['msg_type']?> ">
                            <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            ?>
                        </div>
                        <?php endif;?>

                        <div id="div_footer" class="row justify-content-between text-left">

                            <div  class="form-group col-sm-6 flex-column d-flex"> 

                                <?php if($update==false) : ?>
                                    <button id="btn_inscri" type="submit" name="inscrire" class=""><span></span><span></span><span></span><span></span>Inscrire</button>
                                    <!-- <button type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise" ></i></button> -->
                                <?php else :?>
                                    <button id="btn_modifier" name="modifier" type="submit" class=""><span></span><span></span><span></span><span></span>Modifier</button>
                                    <!-- <button type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></button> -->
                                <?php endif;?>

                            </div>

                        </div>

                </form>
                
            </div>

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