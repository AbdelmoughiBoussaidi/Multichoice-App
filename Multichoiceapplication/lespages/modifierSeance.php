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
                    

                    $heure_debut="";
                    $heure_fin="";
                    

                    if(isset($_GET["edit"])){
                        include("connexion.php");
                        $update=true;
                
                        $id=$_GET["edit"];
                        
                        $resultat = $connexion ->query("select * from seance where id_seance= $id");
                        $i = $resultat ->fetch();
                        $ids = $i['id_seance'];
                        $heure_debut = $i['heure_debut'];
                        $heure_fin = $i['heure_fin'];
                        $groupe = $i['id_groupe'];
                        $salle = $i['id_salle'];
                        $jour=$i['jour'];
                                    
                       
                    }
                ?>
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                        
                        
                        <div class="card">
                            <form class="form-card" action="crudseance.php" method="POST">

                                <div id="div_header" class="row justify-content-between text-left">

                                    <h4 style="color: rgb(0, 157, 209);">Modifier la Seance</h4>

                                </div>
                                <input value="<?php echo $ids ?>" name="id_seance" type="hidden" class=""  placeholder="" required>

                                    <div class="row justify-content-between text-left">

                                        <div class="form-group col-sm-6 flex-column d-flex"> 
                                            <label class="form-control-label px-3">Groupe<span class="text-danger"> *</span></label> <!--<input type="text" id="email" name="email" placeholder="" onblur="validate(3)">--> 
                                            <select name="group" class="form_select"  required>
                                                <option value="Choisir la specialité">Choisir un Groupe</option>
                                                <?php
                                                    require_once("connexion.php");
                                                    $res = $connexion ->query("select * from groupe"); 
                                                ?>
                                                <?php while ($ligne = $res->fetch()) : ?>
                                                    <option value="<?php echo $ligne['id_groupe']; ?>"  <?php if($groupe==$ligne['id_groupe']){ echo "selected" ;} ?>><?php echo $ligne['nom_groupe']; ?></option>
                                                <?php endwhile ; ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Salle<span class="text-danger"> *</span></label> <!--<input type="text" id="mob" name="mob" placeholder="" onblur="validate(4)">  -->
                                            <select name="sall" class="form_select"  required>
                                                <option value="Choisir la specialité">Choisir une Salle</option>
                                                <?php
                                                    require_once("connexion.php");
                                                    $res = $connexion ->query("select * from salle"); 
                                                ?>
                                                    <?php while ($ligne = $res->fetch()) : ?>
                                                        <option value="<?php echo $ligne['id_salle']; ?>" <?php if($salle==$ligne['id_salle']){ echo "selected" ;} ?> ><?php echo $ligne['nom_salle']; ?></option>
                                                    <?php endwhile ; ?>
                                            </select>
                                        </div>

                                    </div>


                                    <div class="row justify-content-between text-left">

                                        <div class="form-group col-sm-6 flex-column d-flex"> 
                                            <label class="form-control-label px-3">Heure Début <span class="text-danger"> *</span></label> <!--<input type="text" id="email" name="email" placeholder="" onblur="validate(3)">--> 
                                            <input value="<?php echo $heure_debut; ?>" name="txt_hd" type="time" class=""  placeholder="Heure Début" required>
                                        </div>

                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Heure Fin<span class="text-danger"> *</span></label> <!--<input type="text" id="mob" name="mob" placeholder="" onblur="validate(4)">  -->
                                            <input value="<?php echo $heure_fin; ?>" name="txt_hf" type="time" class=""  placeholder="Heure Fin" required >
                                        </div>
                                    </div>

                                    <div class="row justify-content-between text-left">

                                        <div class="form-group col-sm-6 flex-column d-flex"> 
                                            <label class="form-control-label px-3">Jour <span class="text-danger"> *</span></label> <!--<input type="text" id="email" name="email" placeholder="" onblur="validate(3)">--> 
                                            <select name="jour" class="form_select"  required>
                                                <option value="Choisir la specialité">Choisir un Jour</option>
                                                <option value="Lundi" <?php if($jour=="Lundi"){ echo "selected" ;} ?> >Lundi</option>
                                                <option value="Mardi" <?php if($jour=="Mardi"){ echo "selected" ;} ?>>Mardi</option>
                                                <option value="Mercredi" <?php if($jour=="Mercredi"){ echo "selected" ;} ?>>Mercredi</option>
                                                <option value="Jeudi" <?php if($jour=="Jeudi"){ echo "selected" ;} ?>>Jeudi</option>
                                                <option value="Vendredi" <?php if($jour=="Vendredi"){ echo "selected" ;} ?>>Vendredi</option>
                                                <option value="Samedi" <?php if($jour=="Samedi"){ echo "selected" ;} ?>>Samedi</option>
                                            </select>
                                        </div>

                                        
                                    </div>

                                    <div id="div_footer" class="row justify-content-between text-left">

                                        
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <button id="btn_modifier" name="modifier" type="submit" class=""><span></span><span></span><span></span><span></span>Modifier</button>
                                            <!-- <button type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></button> -->
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