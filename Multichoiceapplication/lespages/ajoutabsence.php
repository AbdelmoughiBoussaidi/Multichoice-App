<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MultiChoice Center</title>
    <!-- Favicon icon -->
    <?php include_once('linkstyle.html'); ?>
    <script src="../js/jquerymax.js"></script>
    <script>
            $(document).ready(function(){
                $('#groupe').on('change',function(){
                    var groupeID=$(this).val();
                    if(groupeID){
                        $.get(
                            "ajaxabsence.php",
                            {groupe:groupeID},
                            function(data){
                                $('#suggestionList').html(data);
                            }

                        )
                    }else{
                        $('#groupe').html('<option>Select groupe first</option>');
                    }
                });
            });
    </script>

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

                    $id_etu="";
                    $date_abs="";
                    $remarque_abs="";
                    $date_abs="";
                    $groupe="";
                    $ref_etu="";

                    if(isset($_GET["edit"])){
                        include("connexion.php");
                        $update=true;
                
                        $id=$_GET["edit"];
                        
                        $resultat = $connexion ->query("select * from absence ab inner join etudiant e on ab.id_etudiant = e. id_etudiant where id_absence = $id");
                                    
                        $ligne = $resultat->fetch();

                        $id=$ligne['id_absence'];
                        $id_etu=$ligne['id_etudiant'];
                        $remarque_abs=$ligne['remarque_absence']; 
                        $groupe=$ligne['id_groupe'];
                        $date_abs=$ligne['date_absence'];
                        $ref_etu=$ligne['reference_etudiant'];
                        
                    }

                ?>

                <div class="row d-flex justify-content-center">
                        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">

                        <?php if($update==false) : ?>
                            <i style="font-size: 60px;color:orange;" class="fa-solid fa-person-circle-xmark"></i>
                        <?php elseif($update==true) : ?>
                            <i style="font-size: 60px;color:rgb(0, 157, 209);" class="fa-solid fa-person-circle-xmark"></i>
                        <?php endif;?>
                        
                            <h1 id="titre_formulaire" style="display: inline;">Absence</h1>
                            
                            <div class="card">
                                <form class="form-card" action="Crudabsence.php" method="POST">
                                    <div id="div_header" class="row justify-content-between text-left">
                                        <?php if($update==false) : ?>
                                            <h4 style="color: orange;">Remplir les Informations</h4>
                                        <?php elseif($update==true) : ?>
                                            <h4 style="color: rgb(0, 157, 209);">Modifier l'affiche d'absence</h4>
                                        <?php endif;?>
                                    </div>
                                    <input value="<?php echo $id ?>"type="hidden" name="id_absence">

                                        <div class="row justify-content-between text-left">

                                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                                    <label class="form-control-label px-3">Groupe<span class="text-danger"> *</span></label> <!--<input type="text" id="email" name="email" placeholder="" onblur="validate(3)">--> 
                                                    <?php
                                                            require_once("connexion.php");
                                                            $res = $connexion ->query("select id_groupe , nom_groupe from groupe"); 
                                                    ?>
                                
                                                    <select id="groupe" name="groupe" class="form_select"  required>
                                                    <option value="Choisis le Groupe">Choisis le Groupe</option>       
                                                        <?php while ($ligne = $res->fetch()) : ?>
                                                            <option value="<?php echo $ligne['id_groupe']; ?>" <?php if($groupe==$ligne['id_groupe']){ echo "selected" ;} ?> ><?php echo $ligne['nom_groupe']; ?></option>
                                                        <?php endwhile ; ?>
                                                    </select>

                                                </div>

                                            

                                                <div class="form-group col-sm-6 flex-column d-flex">
                                                    <label class="form-control-label px-3">Réference Etudiant <span class="text-danger"> *</span></label> 
    
                                                    <input value="<?php echo $ref_etu ?>" list="suggestionList" id="answerInput">
                                                    <datalist id="suggestionList">
                                                        <option data-value="">Choisis Le Groupe</option>
                                                    </datalist>
                                                    <input value=" <?php echo $id_etu ?>" type="hidden" name="etudiant" id="answerInput-hidden">

                                                </div>

                                
                                        </div>

                                        <div class="row justify-content-between text-left">
                                            
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Date Absence<span class="text-danger"> *</span></label>
                                                <input value="<?php echo $date_abs; ?>" name="txt_date"  type="date" class="" id="txt_date" placeholder="Date absence" required >
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Remarque<span class="text-danger"> *</span></label>
                                                <input value="<?php echo $remarque_abs; ?>" name="txt_rem" type="text" class="" id="txt_rem" placeholder="Remarque" required >          
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
                                                    <button id="btn_inscri" type="submit" name="nv_absence" class=""><span></span><span></span><span></span><span></span>Ajouter</button>
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