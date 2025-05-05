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
                    require_once("connexion.php");
                    $resultat= $connexion -> query("select * from salle");
                ?>

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
                                <td>Nom Salle</td>
                                <td>Capaçité</td>
                                <td>Actions</td>
                            </tr>
                        </thead>

                        <?php while ($ligne = $resultat -> fetch()) : ?>
                            <tr>
                                <td><?php echo $ligne['nom_salle'] ?></td>
                                <td><?php echo $ligne['capacite_salle'] ?></td>

                                <td>
                                    <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_salle']; ?>">
                                    <a href="ajoutsalle.php?edit=<?php echo $ligne['id_salle']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                    <a href="javascript:void(0)"  value="<?php echo $ligne['id_salle'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red;font-size:20px"></i></a>
                                </td>
                            </tr>
                        <?php endwhile;?>
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
            url: "Crudsalle.php",
            data:{
                "delete":1,
                "id":deleteid,
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