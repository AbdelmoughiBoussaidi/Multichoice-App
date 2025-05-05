<?php 
            require_once("connexion.php");
            $afficher="non";
            $trouver=true;
            try{
                if(isset($_POST["btn_rech"]))
                {
                    if($_POST["txt_rech"]!="")
                    {
                        require_once("connexion.php");

                        $ref_etu=trim($_POST["txt_rech"]) ;
                        
                        $resultat= $connexion -> query("SELECT p.id_paiement , p.reference_paiement,p.type_paiement,p.date_paiement,p.montant_paye,e.reference_etudiant, concat(u.nom_utilisateur,' ',u.prenom_utilisateur) as 'utilisateur' FROM etudiant e INNER join paiement p on e.id_etudiant=p.id_etudiant INNER JOIN utilisateur u on p.id_utilisateur=u.id_utilisateur where e.reference_etudiant='$ref_etu' order by p.date_paiement asc");

                        if($resultat-> rowCount()>0)
                        {
                            $resultat2=$connexion -> query("select SUM(montant_paye) as 'total',Count(*) as 'nbr'  from paiement p INNER JOIN etudiant e on p.id_etudiant=e.id_etudiant where e.reference_etudiant='$ref_etu'");
                            $total = $resultat2 ->fetch();
                            $afficher="oui_etudiant";
                        }
                        else
                        {
                            $trouver=false;
                        }
                    }

                    if($_POST["txt_rech_d1"]!="" && $_POST["txt_rech_d2"]!="")
                        {
                            require_once("connexion.php");
    
                            $date1=trim($_POST["txt_rech_d1"]) ;
                            $date2=trim($_POST["txt_rech_d2"]);
                            
                            $resultat= $connexion -> query("SELECT p.id_paiement , p.reference_paiement,p.type_paiement,p.date_paiement,p.montant_paye,e.reference_etudiant, concat(u.nom_utilisateur,' ',u.prenom_utilisateur) as 'utilisateur' FROM etudiant e INNER join paiement p on e.id_etudiant=p.id_etudiant INNER JOIN utilisateur u on p.id_utilisateur=u.id_utilisateur where p.date_paiement BETWEEN '$date1' AND '$date2' order by p.date_paiement asc");
    
                            if($resultat-> rowCount()>0)
                            {
                                $resultat2=$connexion -> query("select SUM(montant_paye) as 'total',Count(*) as 'nbr'  from paiement where date_paiement BETWEEN '$date1' AND '$date2' ");
                                $total = $resultat2 ->fetch();
                                $afficher="oui_date";
                            }
                            else
                            {
                                $trouver=false;
                            }
                        }
                        
                }
                }
                catch(Exception $e)
                {
                    echo ("L'etudiant n'existe pas.");
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
        .txt_rech{
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

        .div_rech p{
            text-transform: uppercase;
            color: orange;
            text-decoration: underline;
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
        <div class="content-body">

            <form action="#" method="post">

                    <div class="div_rech">
                        <p>Rechercher Par Etudiant :</p>
                        <input class="txt_rech" type="text" placeholder="Réference Etudiant" name="txt_rech" style="" >
                        <button id="btn_rech" type="submit" name="btn_rech"  ><i class="bi bi-search" ></i></button>
                    </div>

                    <div style="float:right;" class="div_rech">
                        <p>Rechercher Entre deux Dates :</p>
                        <input class="txt_rech" type="date" placeholder="" name="txt_rech_d1" style="" >
                        <input class="txt_rech" type="date" placeholder="" name="txt_rech_d2" style="" >
                        <button id="btn_rech" type="submit" name="btn_rech"  ><i class="bi bi-search" ></i></button>
                    </div>
                        
                        <!-- <button  type="reset" name="" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></button> -->
                        <?php if($trouver==false) : ?>
                            <div class="alert alert-danger" style="width: 30%; margin: 20px auto;  text-align: center;">Aucun Paiement</div>
                        <?php endif; ?>
            </form>

            
            

                        <?php if($afficher=="oui_date" || $afficher=="oui_etudiant" )   : ?>
                            <div style="margin:15px;float:right;clear: both;"><a href="affichage_paiement.php"><i class="bi bi-x-circle" style="font-size: 30px;color:red;"></i></a></div>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['message'])) : ?>

                            <div style="width:400px;margin:20px auto;text-align: center;" class="alert alert-<?=$_SESSION['msg_type']?> ">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                            </div>

                        <?php endif;?>

            <?php if($afficher=="non"): ?>
            <?php 
                require_once("connexion.php");
                $resultat= $connexion -> query("SELECT p.id_paiement , p.reference_paiement,p.type_paiement,p.date_paiement,p.montant_paye,e.reference_etudiant, concat(u.nom_utilisateur,' ',u.prenom_utilisateur) as 'utilisateur' FROM etudiant e INNER join 
                paiement p on e.id_etudiant=p.id_etudiant INNER JOIN utilisateur u on p.id_utilisateur=u.id_utilisateur");

                $resultat2=$connexion -> query("select SUM(montant_paye) as 'total',Count(*) as 'nbr'  from paiement ");
                $total = $resultat2 ->fetch();
            ?>
            
                <div class="div_table">
                    <table class="" >
                        <thead class="" >
                            <tr>
                                <td>Réference Paiement</td>
                                <td>Type Paiement</td>
                                <td>Date Paiement</td>
                                <td>Montant Payé (DH)</td>
                                <td>Etudiant Donneur</td>
                                <td>Récepteur de la caisse</td>
                                <td>Suppression</td>
                            </tr>
                        </thead>

                        <?php while ($ligne = $resultat -> fetch()) : ?>
                            <tr>
                                <td><?php echo $ligne['reference_paiement'] ?></td>
                                <td><?php echo $ligne['type_paiement'] ?></td>
                                <td><?php echo $ligne['date_paiement'] ?></td>
                                <td><?php echo $ligne['montant_paye'] ?></td>
                                <td><?php echo $ligne['reference_etudiant'] ?></td>
                                <td><?php echo $ligne['utilisateur'] ?></td>

                                <td>
                                    <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_paiement']; ?>">
                                    <a href="ajout_paiement.php?edit=<?php echo $ligne['id_paiement']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                    <a href="javascript:void(0)"  value="<?php echo $ligne['id_paiement'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                </td>
                            </tr>
                        <?php endwhile;?>
                    </table>
                </div>
                <div class="info_paiement">
                    <p> <span>Total :</span>  <?php echo $total['total']." DH"?></p>
                    <p> <span>Total des Paiements effectué:</span> <?php echo $total['nbr']?></p>
                </div>

                <?php elseif($afficher=="oui_etudiant") : ?>
                        <div class="div_table">
                        <table class="" >
                            <thead class="" >
                                <tr>
                                    <td>Réference Paiement</td>
                                    <td>Type Paiement</td>
                                    <td>Date Paiement</td>
                                    <td>Montant Payé (DH)</td>
                                    <td>Etudiant Donneur</td>
                                    <td>Récepteur de la caisse</td>
                                    <td>Suppression</td>
                                </tr>
                            </thead>

                            <?php while ($ligne = $resultat -> fetch()) : ?>
                                <tr>
                                    <td><?php echo $ligne['reference_paiement'] ?></td>
                                    <td><?php echo $ligne['type_paiement'] ?></td>
                                    <td><?php echo $ligne['date_paiement'] ?></td>
                                    <td><?php echo $ligne['montant_paye'] ?></td>
                                    <td><?php echo $ligne['reference_etudiant'] ?></td>
                                    <td><?php echo $ligne['utilisateur'] ?></td>

                                    <td>
                                        <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_paiement']; ?>">
                                        <a href="javascript:void(0)"  value="<?php echo $ligne['id_paiement'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile;?>
                        </table>
                    </div>

                    <div class="info_paiement">
                        <p> <span>Total :</span>  <?php echo $total['total']." DH"?></p>
                        <p> <span>Nombre des Paiements :</span> <?php echo $total['nbr']?></p>
                    </div>

                <?php elseif($afficher=="oui_date") : ?> 
                    <div class="div_table">
                    <table class="" >
                        <thead class="" >
                            <tr>
                                <td>Réference Paiement</td>
                                <td>Type Paiement</td>
                                <td>Date Paiement</td>
                                <td>Montant Payé (DH)</td>
                                <td>Etudiant Donneur</td>
                                <td>Récepteur de la caisse</td>
                                <td>Suppression</td>
                            </tr>
                        </thead>

                        <?php while ($ligne = $resultat -> fetch()) : ?>
                            <tr>
                                <td><?php echo $ligne['reference_paiement'] ?></td>
                                <td><?php echo $ligne['type_paiement'] ?></td>
                                <td><?php echo $ligne['date_paiement'] ?></td>
                                <td><?php echo $ligne['montant_paye'] ?></td>
                                <td><?php echo $ligne['reference_etudiant'] ?></td>
                                <td><?php echo $ligne['utilisateur'] ?></td>

                                <td>
                                    <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_paiement']; ?>">
                                    <a href="javascript:void(0)"  value="<?php echo $ligne['id_paiement'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                </td>
                            </tr>
                        <?php endwhile;?>

                    </table>
                    </div>
                    

                    <div class="info_paiement">
                        <p> <span>Total :</span>  <?php echo $total['total']." DH"?></p>
                        <p> <span>Nombre des Paiements :</span> <?php echo $total['nbr']?></p>
                    </div>
                <?php endif ;?>
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
    url: "Crud_paiement.php",
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