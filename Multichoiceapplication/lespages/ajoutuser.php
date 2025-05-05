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
                    $email="";
                    $mdp="";
                    $role="";
                    $image="";
                    if(isset($_GET["edit"])){

                        include("connexion.php");
                        $update=true;
                
                        $id=$_GET["edit"];
                        
                        $resultat = $connexion ->query("select * from utilisateur where id_utilisateur = $id");
                                    
                        $ligne = $resultat->fetch();

                        $id=$ligne['id_utilisateur'];
                        $nom=$ligne['nom_utilisateur'];
                        $prenom=$ligne['prenom_utilisateur'];
                        $email=$ligne['email_utilisateur'];
                        $mdp=$ligne['mdp_utilisateur'];
                        $role=$ligne['role_utilisateur'];
                        $image=$ligne['image_utilisateur'];
                        
                    }
                ?>
                <div class="row d-flex justify-content-center">
                        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">

                        <?php if($update==false) : ?>
                            <i style="font-size: 60px;color:orange;"  class="fa-solid fa-user-tie"></i>
                        <?php elseif($update==true) : ?>
                            <i style="font-size: 60px;color:rgb(0, 157, 209);"  class="fa-solid fa-user-tie"></i>
                        <?php endif; ?>
                        
                            <h1 style="display: inline;">Utilisateur</h1>
                            
                            <div class="card">
                                <form class="form-card" action="Cruduser.php" method="POST" enctype="multipart/form-data">
                                    <input value="<?php echo $id ?>"type="hidden" name="id_utilisateur">
                                    <?php if ($update==true) : ?>
                                        <input value="<?php echo $image ?>" type="text" name="image_utilisateur">
                                    <?php endif; ?>

                                        <div id="div_header" class="row justify-content-between text-left">
                                            <?php if($update==false) : ?>
                                                <h4 style="color: orange;">Remplir les Informations</h4>
                                            <?php elseif($update==true) : ?>
                                                <h4 style="color: rgb(0, 157, 209);">Modifier l'utilisateur</h4>
                                            <?php endif;?>
                                        </div>

                                        <div class="row justify-content-between text-left">

                                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                                <label class="form-control-label px-3">Nom <span class="text-danger"> *</span></label> 
                                                <input value="<?php echo $nom; ?>" name="txt_nom" type="text" class="" id="" placeholder="Nom" required>
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Prénom<span class="text-danger"> *</span></label> 
                                                <input value="<?php echo $prenom; ?>" name="txt_prenom" type="text" class="" id="" placeholder=" Prénom" required>
                                            </div>

                                        </div>


                                        <div class="row justify-content-between text-left">

                                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                                <label class="form-control-label px-3">Email <span class="text-danger"> *</span></label> 
                                                <input value="<?php echo $email; ?>" name="txt_email" type="email" class="" id="" placeholder="Email" required >
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Mot de Passe<span class="text-danger"> *</span></label> 
                                                <input value="<?php echo $mdp; ?>" name="txt_mdp" type="text" class="" id="" placeholder="Mot de passe" required >
                                            </div>
                                        </div>

                                        <div class="row justify-content-between text-left">

                                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                                <label class="form-control-label px-3">Rôle <span class="text-danger"> *</span></label> 
                                                <select name="txt_role" class="form_select">
                                                    <option >Choisis le Rôle</option>
                                                    <option <?php if($role=="Gérant"){ echo "selected" ;} ?>  >Gérant</option>
                                                    <option <?php if($role=="Réceptionniste"){ echo "selected" ;} ?>  >Réceptionniste</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Image<span class="text-danger"> *</span></label> 
                                                <label style="text-align:center; width: 40%;margin:0 auto;cursor:pointer;" for="imgage_forma">
                                                    
                                                    <?php if($update==false) : ?>
                                                        <i style="color: orange;font-size:50px;" class="bi bi-cloud-plus"></i>
                                                    <?php elseif($update==true) : ?>
                                                        <i style="color: rgb(0, 157, 209);font-size:50px;" class="bi bi-cloud-plus"></i>
                                                    <?php endif;?>
                                                    
                                                </label>
                                                <input style="display: none;" name="img" type="file" class="" id="imgage_forma" onchange="getimage(event)" <?php if($update==false){ echo 'required';} ?> >
                                                <div id="preview">
                                                    <?php if($update==true) :?>
                                                        <img style="width: 200px; height: 200px; border-radius: 5px; margin-left: 55px;" src="../imageusers/<?php echo $image ?>" alt="">
                                                        <p style="text-align: center;"><?php echo $image ?></p>
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

                                        <?php endif;?>


                                        <div id="div_footer" class="row justify-content-between text-left">

                                            <div  class="form-group col-sm-6 flex-column d-flex">

                                                <?php if($update==false): ?>
                                                    <button id="btn_inscri" type="submit" name="nv_user" class=""><span></span><span></span><span></span><span></span>New User</button>
                                                    <!-- <button type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise" ></i></button> -->
                                                <?php endif;?>


                                                <?php if($update==true): ?>
                                                    <button id="btn_modifier" name="modifier" type="submit" class=""><span></span><span></span><span></span><span></span>Modifier</button>
                                                    <!-- <button type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise" ></i></button> -->
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

