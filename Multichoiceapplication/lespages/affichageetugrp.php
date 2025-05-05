
<?
    $x=false;

    require_once("connexion.php");
    $resultat= $connexion -> query("SELECT e.reference_etudiant , e.id_etudiant ,e.nom_etudiant , e.prenom_etudiant , f.libelle_formation , g.nom_groupe ,g.id_groupe FROM etudiant e INNER JOIN etudiant_groupe eg on e.id_etudiant=eg.id_etudiant INNER JOIN groupe g on g.id_groupe=eg.id_groupe INNER JOIN formation f on g.id_formation = f.id_formation order by e.id_etudiant asc");

    if(isset($_POST['btn_rech'])){
        $x=true;
        $nom_groupe=trim($_POST['txt_rech_groupe']);

        $resultat2= $connexion -> query("SELECT e.reference_etudiant , e.id_etudiant , e.nom_etudiant , e.prenom_etudiant , f.libelle_formation , g.nom_groupe ,g.id_groupe FROM etudiant e INNER JOIN etudiant_groupe eg on e.id_etudiant=eg.id_etudiant INNER JOIN groupe g on g.id_groupe=eg.id_groupe INNER JOIN formation f on g.id_formation = f.id_formation where g.nom_groupe='$nom_groupe'"); 
    }
?>

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
<style>
        .txt_rech_groupe{
            border: none;
            border-radius: none;
            transition: 0.3s ease;
            width: 200px;
            background:transparent;
            outline: none;
        }

        .div_rech{
            margin-bottom: 10px;
            display: inline-block;
            border-bottom: 3px solid orange;
        }

        #btn_rech{
            background: transparent;
            border: none;
        }

        #btn_rech i{
            font-size: 20px;
            font-weight: bold;
            color: orange;
            
        }

    </style>

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
                        <?php if($x==false) :?>
                            <a href="affichageetudiant.php" class="btn btn-outline-warning" id="" name="" style="">Afficher les etudiants</a>
                        <?php endif; ?>
                <form action="#" method="post">
                    
                        <div class="div_rech">
                            <input class="txt_rech_groupe" type="text" placeholder="Nom Groupe" name="txt_rech_groupe" style="" required>
                            <button id="btn_rech" type="submit" name="btn_rech"  ><i class="bi bi-search" ></i></button>
                            
                        </div>
                        <a href="affichageetugrp.php"  name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></a>
                        

                </form>

                <?php if(isset($_SESSION['message'])) : ?>

                    <div style="width:400px;margin:20px auto;text-align: center;" class="alert alert-<?=$_SESSION['msg_type']?> ">
                        <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        ?>
                    </div>

                <?php endif;?>
                
                <div class="div_table">
                    <table class="" >
                        <thead class="" >
                            <tr>
                                <td>Réference etudiant</td>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>Formation</td>
                                <td>Groupe</td>
                                <td>Suppression</td>
                            </tr>
                        </thead>
                        <?php if($x==false) : ?>
                            <?php while ($ligne = $resultat -> fetch()) : ?>
                                <tr> 
                                    <td><?php echo $ligne['reference_etudiant'] ?></td>
                                    <td><?php echo $ligne['nom_etudiant'] ?></td>
                                    <td><?php echo $ligne['prenom_etudiant'] ?></td>
                                    <td><?php echo $ligne['libelle_formation'] ?></td>
                                    <td><?php echo $ligne['nom_groupe'] ?></td>
                                    
                                    <td>
                                        <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_etudiant']; ?>">
                                        
                                        <a href="javascript:void(0)" class="btn_supp" value="<?php echo $ligne['id_etudiant'];?>" class="btn_actions"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile;?>
                              
                        <?php else : ?>
                            <?php while ($ligne2 = $resultat2 -> fetch()) : ?>
                                <tr> 
                                    <td><?php echo $ligne2['reference_etudiant'] ?></td>
                                    <td><?php echo $ligne2['nom_etudiant'] ?></td>
                                    <td><?php echo $ligne2['prenom_etudiant'] ?></td>
                                    <td><?php echo $ligne2['libelle_formation'] ?></td>
                                    <td><?php echo $ligne2['nom_groupe'] ?></td>
                                    
                                    <td>
                                        <input type="hidden" class="delete_id_value" value="<?php echo $ligne2['id_etudiant']; ?>">
                                        <input type="hidden" class="delete_idgrp_value" value="<?php echo $ligne2['id_groupe']; ?>">
                                        <a href="javascript:void(0)" value="<?php echo $ligne2['id_etudiant'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile;?>
                        <?php endif; ?>
                        
                    </table>
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

            $(document).ready(function() {
            $('.btn_supp').click(function(e) {
            e.preventDefault();
            var deleteid = $(this).closest("tr").find('.delete_id_value').val();
            var deletegrp = $(this).closest("tr").find('.delete_idgrp_value').val();
            // console.log(deleteid);

            swal({
            title: "Vous êtes sûr de supprimer?",
            text: "Une fois supprimez, vous n'etes plus capable de récuperer les données !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                type: "POST",
                url: "Crudetu_grp.php",
                data:{
                    "delete":1,
                    "id_etu":deleteid
                    
                },
                
                success: function(response) {
                    swal( "Suppression Réussite !", {

                        icon: "success",
                        button: "Ok!",
                    }).then((result)=>{
                        location.reload();
                    });
                }
                })
            } 
            })
            });
            });
    </script>

</body>

</html>