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
        <div  class="content-body">
                    <?php
                    $update = false;

                    $nom="";
                    $capacite="";
                    
                    if(isset($_GET["edit"])){

                        include("connexion.php");
                        $update=true;
                
                        $id=$_GET["edit"];
                        
                        $resultat = $connexion ->query("select * from salle where id_salle = $id");
                                    
                        $ligne = $resultat->fetch();

                        $id=$ligne['id_salle'];
                        $nom=$ligne['nom_salle'];
                        $capacite=$ligne['capacite_salle'];
                        
                    }
                ?>

            <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <?php if($update==false) : ?>
                        <i style="font-size: 60px;color:orange;" class="fa-solid fa-building-columns"></i>
                    <?php elseif($update==true) : ?>
                        <i style="font-size: 60px;color:rgb(0, 157, 209);" class="fa-solid fa-building-columns"></i>
                    <?php endif; ?>
                    
                        <h1 style="display: inline;">Salles</h1>
                        <div class="card">
                                
                            <form id="myform" class="form-card" action="Crudsalle.php" method="POST"> <span></span><span></span><span></span><span></span>
                            <div id="div_header" class="row justify-content-between text-left">
                                <?php if($update==false) : ?>
                                    <h4 style="color: orange;">Remplir les Informations</h4>
                                <?php elseif($update==true) : ?>
                                    <h4 style="color: rgb(0, 157, 209);">Modifier la Salle</h4>
                                <?php endif; ?>
                            </div>
                            
                            <input value="<?php echo $id ?>"type="hidden" name="id_salle">
                                    <div class="row justify-content-between text-left">

                                        <div class="form-group col-sm-6 flex-column d-flex"> 
                                            <label class="form-control-label px-3">Salle <span class="text-danger"> *</span></label>  
                                            <input value="<?php echo $nom; ?>" name="txt_nom" type="text" class="" id="txt_nom" placeholder="Nom salle" required>
                                        </div>

                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Capaçité <span class="text-danger"> *</span></label> 
                                            <input value="<?php echo $capacite; ?>" name="txt_capacite" type="number" class="" id="txt_capacite" placeholder="Capaçité de la salle" required>
                                        </div>

                                    </div>


                                    <div id="div_footer" class="row justify-content-between text-left">
                                        
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <?php if($update==false) : ?>
                                                <button id="btn_inscri" type="submit" name="nv_salle" class=""><span></span><span></span><span></span><span></span>Nouvelle Salle</button>
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