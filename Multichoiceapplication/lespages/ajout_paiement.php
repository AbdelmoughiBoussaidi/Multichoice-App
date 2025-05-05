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

                $ref_pai="";
                $type="";
                $date="";
                $montant="";
                $ref_etu="";
                $user="";
                if(isset($_GET['ajout'])){
                    $id_etu=$_GET['ajout'];
                }
                
                

                if(isset($_GET["edit"])){
                    include("connexion.php");
                    $update=true;
            
                    $id=$_GET["edit"];
                    
                    $resultat = $connexion ->query("select * from paiement where id_paiement = $id");
                                
                    $ligne = $resultat->fetch();

                    $id=$ligne['id_paiement'];
                    $ref_pai=$ligne["reference_paiement"];
                    $type=$ligne['type_paiement'];
                    $date=$ligne['date_paiement'];
                    $montant=$ligne['montant_paye'];
                    $id_etudiant=$ligne['id_etudiant'];
                    $user=$ligne['id_utilisateur']; 
                    
                }

            ?>
            
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">


                    <?php if($update==false) : ?>
                        <i style="font-size: 60px;color:orange;" class="fa-solid fa-sack-dollar"></i>
                    <?php elseif($update==true) : ?>
                        <i style="font-size: 60px;color:rgb(0, 157, 209);" class="fa-solid fa-sack-dollar"></i>
                    <?php endif;?>
                    
                    
                        <h1 id="titre_formulaire" style="display: inline;color:#303030;">Paiement</h1>
                        
                        <div class="card">
                            
                            <form class="form-card" action="Crud_paiement.php" method="POST">


                                <div id="div_header" class="row justify-content-between text-left">

                                    <?php if($update==false) : ?>
                                        <h4 style="color: orange;">Remplir les Informations</h4>
                                    <?php elseif($update==true) : ?>
                                        <h4 style="color: rgb(0, 157, 209);">Modifier le Paiement</h4>
                                    <?php endif?>
                                    
                                </div>


                                <input value="<?php echo $id ?>"type="hidden" name="id_paiement">
                                <input value="<?php if(isset($id_etu)) {echo $id_etu;} else{echo $id_etudiant;} ?>"type="hidden" name="id_etudiant">
                                <input value="<?php echo $_SESSION['id_utili'] ?>"type="hidden" name="user">

                                    <div class="row justify-content-between text-left">

                                        <?php if($update==true): ?>

                                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                                <label class="form-control-label px-3">Réference Paiement <span class="text-danger"> *</span></label> <!--<input type="text" id="email" name="email" placeholder="" onblur="validate(3)">--> 
                                                <input readonly  value="<?php echo $ref_pai; ?>" name="txt_ref_paiement" type="text" class="" id="txt_ref_paiement" placeholder="Réference Paiement" required>
                                            </div>

                                        <?php else: ?>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Réference Paiement <span class="text-danger"> *</span></label> 
                                                <input readonly  value="<?php echo 'P'.rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)?>" name="txt_ref_paiement" type="text" class="" id="txt_ref_paiement" placeholder="Réference Paiement" required>
                                            </div>

                                        <?php endif;?>

                                        <?php

                                            if(isset($id_etu)){
                                                require_once('connexion.php');
                                                $resultat = $connexion ->query("select * from etudiant where id_etudiant = $id_etu");
                                                    
                                                $ligne2 = $resultat->fetch();
                                                $ref_etu=$ligne2['reference_etudiant'];
                                            }else{
                                                require_once('connexion.php');
                                                $resultat = $connexion ->query("select * from etudiant where id_etudiant = $id_etudiant");
                                                    
                                                $ligne2 = $resultat->fetch();
                                                $ref_etu=$ligne2['reference_etudiant'];
                                            }
                                    
                                        ?>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Réference Etudiant <span class="text-danger"> *</span></label> 
                                                <input readonly value="<?php echo $ref_etu; ?>" name="etudiant" type="text" class="" id="etudiant" placeholder="Réference Etudiant" required >
                                            </div>
                                    </div>

                                    <div class="row justify-content-between text-left">
                                        
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Qui a réçu le paiment ?<span class="text-danger"> *</span></label>
                                            <input readonly value="<?php echo $_SESSION['nom_utili'].' '.$_SESSION['prenom_utili']; ?>" name="" type="text" class="" id="etudiant" placeholder="Récepteur" required >
                                        </div>

                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Type Paiement<span class="text-danger"> *</span></label>
                                            <select name="txt_type" class="form_select"  required>
                                                <option >Comment payer ?</option>
                                                <option <?php if($type=="Cash") echo "selected";?>>Cash</option>
                                                <option <?php if($type=="Virement Bancaire")  echo "selected" ;?>>Virement Bancaire</option>
                                            </select>
                                            
                                        </div>

                                    </div>

                                    <div class="row justify-content-between text-left">
                                        
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Date Transaction<span class="text-danger"> *</span></label>
                                            <input value="<?php echo $date; ?>" name="txt_date" type="date" class="" id="txt_date" placeholder="Date paiement" required >
                                        </div>

                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Montant Payé<span class="text-danger"> *</span></label>
                                            <input value="<?php echo $montant; ?>" name="txt_montant" type="text" class="" id="txt_montant" placeholder="Montant payé" required > 
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
                                        
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <?php if($update==false) : ?>
                                                <button id="btn_inscri" type="submit" name="nv_paiement" class=""><span></span><span></span><span></span><span></span>Effectuer</button>
                                                <!-- <button type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></button> -->
                                            <?php else :?>
                                                <button id="btn_modifier" name="modifier" type="submit" class=""><span></span><span></span><span></span><span></span>Modifier</button>
                                                <!-- <button type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></button> -->
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                
                            </form>
                        </div>
                    </div>
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