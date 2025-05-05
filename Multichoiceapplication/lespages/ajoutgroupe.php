<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MultiChoice Center</title>
    <script src="../js/jquerymax.js"></script>
    <script>
            $(document).ready(function(){
                $('#formation').on('change',function(){
                    var formaID=$(this).val();
                    if(formaID){
                        $.get(
                            "ajaxgroupe.php",
                            {formation:formaID},
                            function(data){
                                $('#suggestionList').html(data);
                            }

                        )
                    }else{
                        $('#groupe').html('<option>Select formation first</option>');
                    }
                });
            });
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
        <?php
                    $update = false;

                    $nom_groupe="";
                    $formation="";
                    $formateur="";
                    $id_formateur="";

                    if(isset($_GET["edit"])){
                        include("connexion.php");
                        $update=true;
                
                        $id=$_GET["edit"];
                        
                        $resultat = $connexion ->query("select g.id_groupe , g.nom_groupe,f.libelle_formation,CONCAT(fo.nom_formateur,' ',fo.prenom_formateur) AS 'formateur' , fo.id_formateur from formation f INNER JOIN groupe g on f.id_formation=g.id_formation INNER JOIN formateur fo ON g.id_formateur=fo.id_formateur where id_groupe = $id");
                                    
                        $ligne = $resultat->fetch();

                        $id=$ligne['id_groupe'];
                        $nom_groupe=$ligne['nom_groupe'];
                        $formation=$ligne['libelle_formation'];
                        $formateur=$ligne['formateur'];
                        $id_formateur=$ligne['id_formateur'];
                    }
                ?>
                <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <?php if($update==false) : ?>
                <i style="font-size: 60px;color:orange;" class="fa-solid fa-people-group"></i>
            <?php elseif($update==true) : ?>
                <i style="font-size: 60px;color:rgb(0, 157, 209);" class="fa-solid fa-people-group"></i>
            <?php endif;?>
            
            <h1 style="display: inline;">Groupe</h1>
            <div class="card">
                <form class="form-card" action="Crudgroupe.php" method="POST">
                <div id="div_header" class="row justify-content-between text-left">
                    <?php if($update==false) : ?>
                        <h4 style="color: orange;">Remplir les Informations</h4>
                    <?php elseif($update==true) : ?>
                        <h4 style="color: rgb(0, 157, 209);">Modifier le Groupe</h4>
                    <?php endif;?>
                </div>
                <input value="<?php echo $id ?>"type="hidden" name="id_groupe">

                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Nom Groupe <span class="text-danger"> *</span></label>
                                <input value="<?php echo $nom_groupe; ?>" name="txt_nom_grp" type="text" class="" id="txt_nom_grp" placeholder="Nom Groupe" required>
                            </div>

                        </div>


                        <div class="row justify-content-between text-left">
                            
                            <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Formation<span class="text-danger"> *</span></label>
                                <?php
                                    require_once("connexion.php");
                                    $res = $connexion ->query("select id_formation , libelle_formation from formation"); 
                                ?>    
                                <select id="formation" name="formation" class="form_select"  required>
                                    <option value="Choisis la formation">Choisis la Formation</option>       
                                    <?php while ($ligne = $res->fetch()) : ?>
                                        <option value="<?php echo $ligne['id_formation']; ?>" <?php if($formation==$ligne['libelle_formation']){ echo "selected" ;} ?>><?php echo $ligne['libelle_formation']; ?></option>
                                    <?php endwhile ; ?>
                                </select>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Formateur<span class="text-danger"> *</span></label> <!--<input type="text" id="mob" name="mob" placeholder="" onblur="validate(4)">  -->
                                <!-- <select id="formateur" name="formateur" class="form_select"  required>
                                    <option value="Choisis le formateur">Choisis la Formation</option>       
                                </select> -->
                                <input value="<?php echo $formateur ?>" list="suggestionList" id="answerInput" >
                                <datalist id="suggestionList">
                                    <option data-value="">Choisis La Formation</option>
                                </datalist>
                                <input value=" <?php echo $id_formateur ?>" type="hidden" name="formateur" id="answerInput-hidden">
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
                                    <button id="btn_inscri" type="submit" name="nv_groupe" class=""><span></span><span></span><span></span><span></span>Nouveau Groupe</button>
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

    <script>    
                document.querySelector('input[list]').addEventListener('input', function(e) {
                    var input = e.target,
                        list = input.getAttribute('list'),
                        options = document.querySelectorAll('#' + list + ' option'),
                        hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
                        inputValue = input.value;

                    hiddenInput.value = inputValue;

                    for(var i = 0; i < options.length; i++) {
                        var option = options[i];

                        if(option.innerText === inputValue) {
                            hiddenInput.value = option.getAttribute('data-value');
                            break;
                        }
                    }
                });
    </script>

</body>

</html>