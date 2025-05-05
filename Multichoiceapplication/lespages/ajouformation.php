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

                    $libelle="";
                    $nbr_heure="";
                    $dure="";
                    $prix="";
                    $descri="";
                    $type="";
                    $img="";

                    if(isset($_GET["edit"])){
                        include("connexion.php");
                        $update=true;
                
                        $id=$_GET["edit"];
                        
                        $resultat = $connexion ->query("select * from formation where id_formation = $id");
                                    
                        $ligne = $resultat->fetch();

                        $id=$ligne['id_formation'];
                        $libelle=$ligne['libelle_formation'];
                        $nbr_heure=$ligne['nbr_heure_formation'];
                        $dure=$ligne['dure_formation'];
                        $prix=$ligne['prix_total_formation']; 
                        $descri=$ligne['description_formation'];
                        $type=$ligne['type_formation'];
                        $img=$ligne['image_formation'];
                    }
                ?>
                
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <?php if($update==false) : ?>
                        <i style="font-size: 60px;color:orange;" class="fa-solid fa-language"></i>
                    <?php elseif($update==true) : ?>
                        <i style="font-size: 60px;color:rgb(0, 157, 209);" class="fa-solid fa-language"></i>
                    <?php endif;?>
                    
                        <h1 id="titre_formulaire" style="display: inline;color:#303030;">Formations</h1>
                        <div class="card">
                            
                            <form class="form-card" action="Crudforma.php" method="POST" enctype="multipart/form-data">
                                
                                        <div id="div_header" class="row justify-content-between text-left">
                                            <span></span>

                                            <?php if($update==false) : ?>
                                                <h4 style="color: orange;">Remplir les Informations</h4>
                                            <?php elseif($update==true) : ?>
                                                <h4 style="color: rgb(0, 157, 209);">Modifier la Formation</h4>
                                            <?php endif;?>
                                        </div>
                                <input value="<?php echo $id ?>"type="hidden" name="id_formation">
                                <?php if ($update==true) : ?>
                                    <input value="<?php echo $img ?>"type="hidden" name="image_formation">
                                <?php endif; ?>
                                    <div class="row justify-content-between text-left">

                                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                                <label class="form-control-label px-3">Libélle Formation<span class="text-danger"> *</span></label> <!--<input type="text" id="email" name="email" placeholder="" onblur="validate(3)">--> 
                                                <input value="<?php echo $libelle; ?>" name="txt_libelle" type="text" class="" id="txt_libelle" placeholder="Libélle" required>
                                            </div>

                                        

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Nombre Des Heures<span class="text-danger"> *</span></label> 
                                                <input value="<?php echo $nbr_heure; ?>" name="txt_nbr_heure" type="number" class="" id="txt_nbr_heure" placeholder="Nombres des heures" >
                                            </div>

                            
                                    </div>

                                    <div class="row justify-content-between text-left">
                                        
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Durée<span class="text-danger"> *</span></label>
                                            <input value="<?php echo $dure; ?>" name="txt_dure" type="text" class="" id="txt_dure" placeholder="Durée de la formation" required >
                                        </div>

                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Prix Par mois<span class="text-danger"> *</span></label>
                                            <input value="<?php echo $prix; ?>" name="txt_prix" type="text" class="" id="txt_prix" placeholder="Prix de la formation" required >          
                                        </div>

                                    </div>

                                    <div class="row justify-content-between text-left">
                                        <label class="form-control-label px-3">Déscription<span class="text-danger"> *</span></label>
                                        <textarea style="width: 100%;" class="" name="txt_descri" id="" cols="30" rows="7" placeholder="Description" required><?php echo $descri ?></textarea>
                                    </div>

                                    <div class="row justify-content-between text-left">
                                        
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Type Formation<span class="text-danger"> *</span></label>
                                            <select name="txt_type" class="form_select" id="" required>
                                                <option value="Type Formation ?">Type Formation ?</option>
                                                <option value="Languistique" <?php if($type=='Languistique'){ echo "selected" ;} ?>>Languistique</option>
                                                <option value="Professionelle" <?php if($type=='Professionelle'){ echo "selected" ;} ?> >Professionelle</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">Image<span class="text-danger"> *</span></label>
                                            <label style="text-align:center; width: 40%;margin:0 auto;cursor:pointer;" for="imgage_forma">
                                            <?php if($update==false) : ?>
                                                <i style="color: orange;font-size:50px" class="bi bi-cloud-plus"></i>
                                            <?php elseif($update==true) : ?>
                                                <i style="color: rgb(0, 157, 209);font-size:50px" class="bi bi-cloud-plus"></i>
                                            <?php endif;?>
                                            </label>
                                            <input style="display: none;" name="img" type="file" class="" id="imgage_forma" onchange="getimage(event)" <?php if($update==false){ echo 'required';} ?> >
                                            <div id="preview">
                                                <?php if($update==true) :?>
                                                    <img style="width: 200px; height: 200px; border-radius: 5px; margin-left: 55px;" src="../imageformation/<?php echo $img ?>" alt="">
                                                    <p style="text-align: center;"><?php echo $img ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <p id="image_name"></p>
                                            
                                            <script>

                                                function getimage(event){

                                                    var image = URL.createObjectURL(event.target.files[0]);
                                                    var image_forma= document.getElementById('imgage_forma');
                                                    var imagediv = document.getElementById('preview');
                                                    var newimg = document.createElement('img');
                                                    var image_nom = document.getElementById('image_name');
                                                    
                                                    imagediv.innerHTML="";
                                                    newimg.src=image;
                                                    newimg.width="200";
                                                    newimg.height="200";
                                                    newimg.style.borderRadius="5px";
                                                    newimg.style.marginLeft="55px";
                                                    imagediv.appendChild(newimg);

                                                    var just_image = image_forma.replace(/^.*\\/,"");
                                                    image_nom.innerHTML+=just_image;

                                                }

                                            </script>          
                                        </div>

                                    </div>

                                    <?php if(isset($_SESSION['message'])) : ?>

                                        <div style="width:400px;margin:20px auto;text-align: center;" class="alert alert-<?=$_SESSION['msg_type']?> ">
                                            <?php
                                                echo $_SESSION['message'];
                                                unset($_SESSION['message']);
                                            ?>
                                        </div>

                                    <?php endif ?>

                                    <div id="div_footer" class="row justify-content-between text-left">
                                        
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <?php if($update==false) : ?>
                                                <div class="wrapper"><button id="btn_inscri" type="submit" name="nv_formation" class=""><span></span><span></span><span></span><span></span>ADD Formation</button></div> 
                                                <!-- <button type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></button> -->
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