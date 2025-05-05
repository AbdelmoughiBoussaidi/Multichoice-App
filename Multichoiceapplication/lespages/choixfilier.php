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
                            "ajax.php",
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

                $id_etudiant="";
                $id_groupe="";
                $nom_groupe="";

                if(isset($_GET["edit"])){

                    include("connexion.php");
                    $update=true;
            
                    $id_etudiant=$_GET["edit"];
                    $id_groupe=$_GET["edit"];
                    
                    $resultat = $connexion ->query("select * from etudiant_groupe eg inner join groupe g on eg.id_groupe = g.id_groupe where id_etudiant = $id_etudiant and id_groupe = $id_groupe");
                                
                    $ligne = $resultat->fetch();

                    $id_etudiant=$ligne['id_etudiant'];
                    $id_groupe=$ligne['id_groupe'];
                    $nom_groupe=$ligne['nom_groupe'];
                }
        ?>
      <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <?php if($update==false) : ?>
                <i style="font-size: 60px;color:orange;" class="fa-solid fa-spell-check"></i>
            <?php elseif($update==true) : ?>
                <i style="font-size: 60px;color:rgb(0, 157, 209);" class="fa-solid fa-spell-check"></i>
            <?php endif;?>
                    
        
                
            <h1 style="display: inline;">Choix Formation</h1>
            <div class="card">
                <form class="form-card" action="Crudetu_grp.php" method="POST">
                <div id="div_header" class="row justify-content-between text-left">
                    <?php if($update==false) : ?>
                        <h4 style="color: orange;">Remplir les Informations</h4>
                    <?php elseif($update==true) : ?>
                        <h4 style="color: rgb(0, 157, 209);">Modifier Le Choix</h4>
                    <?php endif;?>
                </div>

                    <div class="row justify-content-between text-left">

                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Réference Etudiant <span class="text-danger"> *</span></label> 
                            <?php
                                require_once("connexion.php");
                                $res = $connexion ->query("select id_etudiant , reference_etudiant from etudiant"); 
                            ?>    
                            <select name="etudiant" class="form_select"  required>
                            <option value="Choisis l'etudiant">Choisis l'etudiant</option>
                                <?php while ($ligne = $res->fetch()) : ?>
                                    <option value="<?php echo $ligne['id_etudiant']; ?>"><?php echo $ligne['reference_etudiant']; ?></option>
                                <?php endwhile ; ?>
                            </select>
                        </div>

                    </div>


                    <div class="row justify-content-between text-left">

                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Formation <span class="text-danger"> *</span></label> 
                            <?php
                                require_once("connexion.php");
                                $res = $connexion ->query("select id_formation , libelle_formation from formation"); 
                            ?>    
                            <select id="formation" name="formation" class="form_select"  required>
                            <option value="Choisis la formation">Choisis la Formation</option>       
                                <?php while ($ligne = $res->fetch()) : ?>
                                    <option value="<?php echo $ligne['id_formation']; ?>"><?php echo $ligne['libelle_formation']; ?></option>
                                <?php endwhile ; ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-6 flex-column d-flex">

                            <label class="form-control-label px-3">Groupe<span class="text-danger"> *</span></label>
                            <!-- <select id="groupe" name="groupe" class="form_select"  required>
                                <option value="Choisis le Groupe">Choisis Une formation</option>            
                            </select> -->
                            <input value="<?php echo $nom_groupe ?>" list="suggestionList" id="answerInput">
                                <datalist id="suggestionList">
                                    <option data-value="">Choisis La Formation</option>
                                </datalist>
                            <input value=" <?php echo $id_groupe ?>" type="hidden" name="groupe" id="answerInput-hidden">

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
                                <button id="btn_inscri" type="submit" name="nv_etu_groupe" class=""><span></span><span></span><span></span><span></span>Valider le Groupe</button>
                                <!-- <button type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></button> -->
                            <?php else :?>
                                <button id="btn_modifier" name="modifier" type="submit" class=""><span></span><span></span><span></span><span></span>Modifier le Groupe</button>
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