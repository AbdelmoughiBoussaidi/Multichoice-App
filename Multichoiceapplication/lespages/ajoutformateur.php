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
                $adresse="";
                $specialite="";

                if(isset($_GET["edit"])){
                    include("connexion.php");
                    $update=true;
            
                    $id=$_GET["edit"];
                    
                    $resultat = $connexion ->query("select * from formateur where id_formateur = $id");
                                
                    $ligne = $resultat->fetch();

                    $id=$ligne['id_formateur'];
                    $nom=$ligne['nom_formateur'];
                    $prenom=$ligne['prenom_formateur'];
                    $tel=$ligne['tel_formateur'];
                    $email=$ligne['email_formateur'];
                    $adresse=$ligne['adresse_formateur']; 
                    $specialite=$ligne['id_formation']; 
                }
            ?>
            
            <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <?php if($update==false) : ?>
                <i style="font-size: 60px;color:orange;" class="fa-solid fa-suitcase"></i>
            <?php elseif($update==true) : ?>
                <i style="font-size: 60px;color:rgb(0, 157, 209);" class="fa-solid fa-suitcase"></i>
            <?php endif?>
        
            <h1 style="display: inline;">Formateur</h1>
            
            <div class="card">
                <form class="form-card" action="Crudformateur.php" method="POST">

                <div id="div_header" class="row justify-content-between text-left">
                    <?php if($update==false) : ?>
                        <h4 style="color: orange;">Remplir les Informations</h4>
                    <?php elseif($update==true) : ?>
                        <h4 style="color: rgb(0, 157, 209);">Modifier le Formateur</h4>
                    <?php endif;?>
                </div>

                <input type="hidden" name="id_formateur" id="" value="<?php echo $ligne['id_formateur']?>">
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
                                <input value="<?php echo $adresse; ?>" name="txt_adresse" type="text" class="" id="txt_adresse" placeholder="Adresse" required>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Spéialité<span class="text-danger"> *</span></label> 
                                <select name="specialite" class="form_select"  required>
                                    <option value="Choisir la specialité">Choisir la specialité</option>
                                        <?php
                                            require_once("connexion.php");
                                            $res = $connexion ->query("select distinct id_formation , libelle_formation from formation"); 
                                        ?>
                                            <?php while ($ligne = $res->fetch()) : ?>
                                                <option value="<?php echo $ligne['id_formation']; ?>" <?php if($specialite==$ligne['id_formation']){ echo "selected" ;} ?> ><?php echo $ligne['libelle_formation']; ?></option>
                                            <?php endwhile ; ?>
                                </select>
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
                                    <button id="btn_inscri" type="submit" name="nv_formateur" class=""><span></span><span></span><span></span><span></span>Ajouter</button>
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