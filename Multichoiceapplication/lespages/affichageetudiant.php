
<?php $afficher="non"; $trouver_ref=true; $trouver_name=true; ?>
            <?php 
            require_once("connexion.php");
            use Dompdf\Dompdf;


            require_once("../dompdf/autoload.inc.php");

            if(isset($_POST['pdf'])){

                $id_etu_pdf=$_POST['id_etu_pdf'];

                $resultat1= $connexion -> query("select * from etudiant where id_etudiant=$id_etu_pdf");

    $ligne1 = $resultat1->fetch();

    $nom=$ligne1['nom_etudiant'];
    $prenom=$ligne1['prenom_etudiant'];
    $tel=$ligne1['tel_etudiant'];
    $email=$ligne1['email_etudiant'];
    $adresse=$ligne1['adresse_etudiant'];
    $ref_etu=$ligne1['reference_etudiant']; 
    $ref_inscri=$ligne1['reference_inscription'];
    $date_inscri=$ligne1['date_inscription'];
    $genre=$ligne1['type_etudiant'];


    /*------------------------------------*/

    $resultat2= $connexion -> query("SELECT f.libelle_formation,g.nom_groupe from etudiant_groupe eg INNER JOIN   groupe g on g.id_groupe=eg.id_groupe INNER JOIN formation f on f.id_formation=g.id_formation WHERE eg.id_etudiant=$id_etu_pdf");
    $formations = $resultat2->fetchAll();
    /*---------------------------------------*/

    $resultat3= $connexion -> query("SELECT p.id_paiement , p.reference_paiement,p.type_paiement,p.date_paiement,p.montant_paye,e.reference_etudiant, concat(u.nom_utilisateur,' ',u.prenom_utilisateur) as 'utilisateur' FROM etudiant e INNER join paiement p on e.id_etudiant=p.id_etudiant INNER JOIN utilisateur u on p.id_utilisateur=u.id_utilisateur where e.reference_etudiant='$ref_etu' order by p.date_paiement asc");
    $paiements = $resultat3->fetchAll();
    /*------------------------------------------*/

    $resultat4= $connexion -> query("select ab.id_absence , e.reference_etudiant ,e.nom_etudiant , e.prenom_etudiant, ab.date_absence,ab.remarque_absence ,f.libelle_formation , g.nom_groupe from etudiant e INNER JOIN absence ab on e.id_etudiant=ab.id_etudiant INNER JOIN groupe g on g.id_groupe = ab.id_groupe INNER JOIN formation f ON g.id_formation=f.id_formation where ab.id_etudiant=$id_etu_pdf");
    $absences = $resultat4->fetchAll();

    $html='
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
    
            .titre{
                font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif;
                color: white;
                font-size: 36px;
                text-align: center;
                background-color: orange;
                padding: 10px;
                border-radius: 10px;
                
            }
    
            table{
                width: 100%;
                text-align: center;
                border: 2px solid orange;
                border-radius: 5px;
            }
    
            tr{
                
            }
    
            thead{
                background-color: rgba(255, 195, 0,0.7);
                color: orangered;
                font-family: \'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif;
                font-weight: bold;
            }
    
            thead td{
                padding: 20px;
            }
    
            tbody td {
                padding: 5px;
                text-align: center;
            }
    
            .info_etu p{
                color: darkorange;
                font-size: 18px;
                font-weight: bold;
                font-family: \'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif;
            }
    
            .info_etu table td{
                text-align: center;
            }
            
            .table_formation{
                width: 40%;
                margin: 0 auto;
                border: 2px solid orangered;
                text-align: center;
            }
    
            .titre_info{
                font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 17px;
                text-decoration: underline;
                color: orange;
            }
    
            div{
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
    <h1 class="titre">Details de l\'etudiant</h1>


    <div class="info_etu">

        <h3 class="titre_info">Informations de l\'etudiant</h3>
        <table style="width: 100% ;">
        
            <tr>
                <td><p>Nom</p>'.$nom.'</td>
                <td><p>Prénom</p>'.$prenom.'</td>
                <td><p>Genre</p>'.$genre.'</td>
            </tr>

            <tr>
                <td><p>Tél</p>'.$tel.'</td>
                <td><p>Email</p>'.$email.'</td>
                <td><p>Adresse</p>'.$adresse.'</td>
            </tr>

            <tr>
                <td><p>Réference etudiant</p>'.$ref_etu.'</td>
                <td><p>Réference Inscription</p>'.$ref_inscri.'</td>
                <td><p>Date Inscription</p>'.$date_inscri.'</td>
            </tr>

        </table>

    </div>
';


$html .='
<div class="grp_formation">

<h3 class="titre_info">Formations et groupes Inscrits</h3>
<table class="table_formation">
    
    <thead class="blabla">

        <tr>
            <td>Fomation</td>
            <td>Groupe</td>
        </tr>

    </thead>
    
    <tbody>';

    foreach($formations as $forma){
        $html .='<tr><td>'.$forma['libelle_formation'].'</td><td>'.$forma['nom_groupe'].'</td></tr>';
    }

    $html .='</tbody>
    </table>
    </div> 
    <div class="paiements">

    <h3 class="titre_info">Paiements effectué</h3>

    <table class="table_paiements" >

                    <thead class="blabla" >
                        <tr>
                            <td>Réference Paiement</td>
                            <td>Type Paiement</td>
                            <td>Date Paiement</td>
                            <td>Montant Payé (DH)</td>
                            <td>Récepteur de la caisse</td>
                        </tr>
                    </thead>';

        foreach($paiements as $paie){
            $html .='<tr><td>'.$paie['reference_paiement'].'</td><td>'.$paie['type_paiement'].'</td><td>'.$paie['date_paiement'].'</td><td>'.$paie['montant_paye'].'</td><td>'.$paie['utilisateur'].'</td></tr>';
        }

    $html .='</table></div> <div class="Absences">

    <h3 class="titre_info">Liste Des Absences</h3>

    <table class="" >
                    <thead class="blabla" >
                        <tr>

                            <td>Date Absence</td>
                            <td>Remarque Absence</td>
                            <td>Formation </td>
                            <td>Groupe</td>

                        </tr>
                    </thead>';

                    foreach($absences as $abs){
                        $html .='<tr><td>'.$abs['date_absence'].'</td><td>'.$abs['remarque_absence'].'</td><td>'.$abs['libelle_formation'].'</td><td>'.$abs['nom_groupe'].'</td></tr>';
                    }

    $html .='</table></div>
</body>
</html>
';

$n=$nom.'Details';

$dompdf = new Dompdf();

        $dompdf ->loadHtml($html);
        $dompdf->setPaper('A4','Portrait');
        $dompdf ->render();
        $dompdf->stream($n, ['Attachment' => true ] );

            }

            try{
                if(isset($_POST["btn_reset"])){
                    header("location:affichageetudiant.php");
                }

                if(isset($_POST["btn_rech"])){
                    if(isset($_POST["txt_rech_nom"])){
                        

                        $nom=trim($_POST["txt_rech_nom"]) ;
                       
                        
                        $resultat= $connexion -> query("select * from etudiant where nom_etudiant='$nom'");
                        if($resultat-> rowCount()>0){
                            $ligne = $resultat ->fetch();
                        
                        
                            $id=$ligne['id_etudiant'];
                            $nom=$ligne['nom_etudiant'];
                            $prenom=$ligne['prenom_etudiant'];
                            $tel=$ligne['tel_etudiant'];
                            $email=$ligne['email_etudiant']; 
                            $adress=$ligne['adresse_etudiant'];
                            $ref_etu=$ligne['reference_etudiant']; 
                            $ref_inscri=$ligne['reference_inscription'];
                            $date_inscri=$ligne['date_inscription'];
                            
                            $resultat2= $connexion -> query("SELECT e.id_etudiant , e.nom_etudiant , e.prenom_etudiant , g.nom_groupe , f.libelle_formation , g.id_groupe FROM etudiant e INNER JOIN etudiant_groupe eg on e.id_etudiant=eg.id_etudiant INNER JOIN groupe g on eg.id_groupe=g.id_groupe INNER JOIN formation f on g.id_formation=f.id_formation where e.id_etudiant=$id");
                            
                            $afficher="oui";
                        }else{
                            $trouver_name=false;
                        }
                        
                    }
                    
                    if(isset($_POST["txt_rech_ref"])){
                        require_once("connexion.php");

                        $ref_etu_rech=trim($_POST["txt_rech_ref"]) ;
                        
                        
                        $resultat= $connexion -> query("select * from etudiant where reference_etudiant='$ref_etu_rech'");
                        if($resultat-> rowCount()>0){
                            $ligne = $resultat ->fetch();
                        
                        
                            $id=$ligne['id_etudiant'];
                            $nom=$ligne['nom_etudiant'];
                            $prenom=$ligne['prenom_etudiant'];
                            $tel=$ligne['tel_etudiant'];
                            $email=$ligne['email_etudiant']; 
                            $adress=$ligne['adresse_etudiant'];
                            $ref_etu=$ligne['reference_etudiant']; 
                            $ref_inscri=$ligne['reference_inscription'];
                            $date_inscri=$ligne['date_inscription'];
                            
                            $resultat2= $connexion -> query("SELECT e.id_etudiant , e.nom_etudiant , e.prenom_etudiant , g.nom_groupe , f.libelle_formation , g.id_groupe FROM etudiant e INNER JOIN etudiant_groupe eg on e.id_etudiant=eg.id_etudiant INNER JOIN groupe g on eg.id_groupe=g.id_groupe INNER JOIN formation f on g.id_formation=f.id_formation where e.id_etudiant=$id");
                            
                            $afficher="oui";
                    }else{
                        $trouver_ref=false;
                    }
                    
                }
                        
                }
            }catch(Exception $e){
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
        .txt_rech_ref{
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
        <a href="affichageetugrp.php?btn_grpetu=true" class="btn btn-outline-warning" id="btn_grpetu" name="btn_grpetu" style="margin-bottom: 20px;">Afficher les groupes des etudiants</a>
            <form action="#" method="post">
                    
                    
                        <!-- <input class="" type="text" placeholder="Nom etudiant" name="txt_rech_nom" style="margin-right: 20px;width: 200px;" >
                        <input class="" type="text" placeholder="Prénom etudiant" name="txt_rech_pre" style="margin-right: 20px;width: 200px;" > -->
                        <div class="div_rech">
                            <input id="" class="txt_rech_ref" type="text" placeholder="Réference Etudiant" name="txt_rech_ref" style=" " >
                            <button id="btn_rech" type="submit" name="btn_rech"  ><i class="bi bi-search" ></i></button>
                        </div>

                        <div style="float: right;" class="div_rech">
                            <input id="" class="txt_rech_ref" type="text" placeholder="Nom Etudiant" name="txt_rech_nom" style=" " >
                            <button id="btn_rech" type="submit" name="btn_rech"  ><i class="bi bi-search" ></i></button>
                        </div>     
                        <!-- <a href="affichageetudiant.php" type="" name="btn_reset" class="" id="btn_reset"><i class="bi bi-arrow-clockwise"></i></a>         -->
                        <?php if($trouver_name==false && $trouver_ref==false) : ?>
                             <div class="alert alert-danger" style="width: 30%; margin: 10px auto; text-align: center;">L'etudiant n'existe pas</div>
                        <?php endif; ?>         
            </form>

            <?php if($afficher=="oui") : ?>
                <div style="float: right;margin:15px;"><a href="affichageetudiant.php"><i class="bi bi-x-circle" style="font-size: 30px;color:red;"></i></a></div>
            <?php endif; ?>

            <?php 
                require_once("connexion.php");
                $resultat= $connexion -> query("select * from etudiant");
            ?>

            <?php if(isset($_SESSION['message'])) : ?>

            <div style="width:400px;margin:20px auto;text-align: center;" class="alert alert-<?=$_SESSION['msg_type']?> ">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>

            <?php endif;?>
            
            <?php if($afficher=="non") : ?>
                <div class="div_table">
                    <table class="" >
                        <thead class="" >
                            <tr>
                                <td>Réference Etudiant</td>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <!-- <td>Sexe</td> -->
                                <td>Télephone</td>
                                <td>Email</td>
                                <td>Adresse</td>
                                <td>Réference inscription</td>
                                <td>Date Inscription</td>
                                <td>Actions</td>
                            </tr>
                        </thead>

                        <?php while ($ligne = $resultat -> fetch()) : ?>
                            <tr>
                                <td><?php echo $ligne['reference_etudiant'] ?></td>
                                <td><?php echo $ligne['nom_etudiant'] ?></td>
                                <td><?php echo $ligne['prenom_etudiant'] ?></td>
                                <!-- <td><?php echo $ligne['type_etudiant'] ?></td> -->
                                <td><?php echo $ligne['tel_etudiant'] ?></td>
                                <td><?php echo $ligne['email_etudiant'] ?></td>
                                <td><?php echo $ligne['adresse_etudiant'] ?></td>
                                <td><?php echo $ligne['reference_inscription'] ?></td>
                                <td><?php echo $ligne['date_inscription'] ?></td>

                                <td>
                                    <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_etudiant']; ?>">
                                    <a href="ajoutetu.php?edit=<?php echo $ligne['id_etudiant']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                    <a href="javascript:void(0)"  value="<?php echo $ligne['id_etudiant'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                    <a href="ajout_paiement.php?ajout=<?php echo $ligne['id_etudiant']; ?>" class="btn_actions"><i class="bi bi-cash-coin" style="color: green;"></i></a>
                                    <form style="display:inline;" action="#" method="POST">
                                        <input type="hidden" value="<?php echo $ligne['id_etudiant'] ?>" name="id_etu_pdf">         
                                        <button style="border:none;background:transparent;"  type="submit" name="pdf" id="pdf"><i style="color: darkblue; font-size: 22px;" class="bi bi-eye"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile;?>
                    </table>
                </div>
            <?php endif; ?>

            <?php if($afficher=="oui") : ?>
                    <div class="div_table">
                        <table class="">
                            <thead class="">
                                <tr>
                                    <td>Réference Etudiant</td>
                                    <td>Nom</td>
                                    <td>Prenom</td>
                                    <td>Télephone</td>
                                    <td>Email</td>
                                    <td>Adresse</td>
                                    <td>Réference inscription</td>
                                    <td>Date Inscription</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                                <tr>
                                    <td><?php echo $ref_etu; ?></td>
                                    <td><?php echo $nom ?></td>
                                    <td><?php echo $prenom ?></td>
                                    <td><?php echo $tel ?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $adress ;?></td>
                                    <td><?php echo $ref_inscri; ?></td>
                                    <td><?php echo $date_inscri; ?></td>
                                    
                                    <td>
                                        <a href="ajoutetu.php?edit=<?php echo $ligne['id_etudiant']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: darkorange;"></i></a>
                                        
                                        <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_etudiant']; ?>">
                                        <a href="javascript:void(0)"  value="<?php echo $ligne['id_etudiant'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                        <a href="ajout_paiement.php?ajout=<?php echo $ligne['id_etudiant']; ?>" class="btn_actions"><i class="bi bi-cash-coin" style="color: green;"></i></a>
                                        <form style="display:inline;" action="#" method="POST">
                                        <input type="hidden" value="<?php echo $ligne['id_etudiant'] ?>" name="id_etu_pdf">         
                                        <button style="border:none;background:transparent;"  type="submit" name="pdf" id="pdf"><i style="color: darkblue; font-size: 22px;" class="bi bi-eye"></i></button>
                                    </form>
                                    </td>
                                </tr>
                        </table>
                       
                    </div> 
                        
                    <div class="div_table" style="width: 50%; margin: 20px auto; ">
                        <table class="" >
                            <thead class="">
                                <tr>
                                    <td>Formation</td>
                                    <td>Groupe</td>
                                    <td>Suppression</td>
                                    
                                </tr>
                            </thead>
                            <?php while ($ligne2 = $resultat2 -> fetch()) : ?>
                                <tr>
                                    <td><?php echo $ligne2['libelle_formation']; ?></td>
                                    <td><?php echo $ligne2['nom_groupe'];  ?></td>        
                                    <td>
                                        <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_etudiant']; ?>">
                                        <a href="Crudetu_grp.php?delete=<?php echo $ligne['id_etudiant']; ?>" class="btn_actions"><i class="bi bi-trash" style="color: red;"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                        <?php endif; ?>

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
                url: "Crudetudiant.php",
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