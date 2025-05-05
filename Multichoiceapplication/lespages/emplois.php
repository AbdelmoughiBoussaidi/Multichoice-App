
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
            <!-- Button trigger modal -->
            <button id="btn_inscri" type="button" style="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModalCenter">
            Ajouter une Seance
            <span></span><span></span><span></span><span></span>
            
            </button>

            <?php if(isset($_SESSION['message'])) : ?>

            <div style="width:400px;margin:20px auto;text-align: center;" class="alert alert-<?=$_SESSION['msg_type']?> ">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>

            <?php endif;?>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color: orange;">
                    <h5 class="modal-title" id="exampleModalLongTitle"  style=" color: white;position: relative; left: -40px;" >AJOUTER UNE SEANCE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white;" >&times;</span>
                    </button>
                </div>
                
                <form  style="padding: 10px;"  action="crudseance.php" method="post">
                <div class="row justify-content-between text-left">

                    <div class="form-group col-sm-6 flex-column d-flex"> 

                            

                        <label class="form-control-label px-3">Groupe <span class="text-danger"> *</span></label> 
                            <?php
                                require_once("connexion.php");
                                $res = $connexion ->query("select id_groupe , nom_groupe from groupe"); 
                            ?>    
                            <select id="groupe" name="groupe" class="form_select"  required>
                            <option value="Choisis le groupe">Choisis le Groupe</option>       
                                <?php while ($ligne = $res->fetch()) : ?>
                                    <option value="<?php echo $ligne['id_groupe']; ?>"><?php echo $ligne['nom_groupe']; ?></option>
                                <?php endwhile ; ?>
                            </select>

                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex">

                            <?php
                                require_once("connexion.php");
                                $res = $connexion ->query("select id_salle,nom_salle from salle"); 
                            ?>
                        <label class="form-control-label px-3">Salle<span class="text-danger"> *</span></label> 
                        <select name="salle" class="form_select"  required>
                            <option value="Choisir la specialité">Choisir une Salle</option>
                           
                                <?php while ($ligne = $res->fetch()) : ?>
                                    <option value="<?php echo $ligne['id_salle']; ?>"  ><?php echo $ligne['nom_salle']; ?></option>
                                <?php endwhile ; ?>
                        </select>
                    </div>

                </div>


                <div class="row justify-content-between text-left">

                    <div class="form-group col-sm-6 flex-column d-flex"> 
                        <label class="form-control-label px-3">Heure Début <span class="text-danger"> *</span></label> 
                        <input  name="txt_hd" type="time" class=""  placeholder="Heure Début" required>
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label px-3">Heure Fin<span class="text-danger"> *</span></label>
                        <input  name="txt_hf" type="time" class=""  placeholder="Heure Fin" required >
                    </div>
                </div>

                <div class="row justify-content-between text-left">

                    <div class="form-group col-sm-6 flex-column d-flex"> 
                        <label class="form-control-label px-3">Jour <span class="text-danger"> *</span></label> 
                        <select name="jour" class="form_select"  required>
                            <option value="Choisir la specialité">Choisir un Jour</option>
                            <option value="Lundi" >Lundi</option>
                            <option value="Mardi" >Mardi</option>
                            <option value="Mercredi" >Mercredi</option>
                            <option value="Jeudi" >Jeudi</option>
                            <option value="Vendredi" >Vendredi</option>
                            <option value="Samedi" >Samedi</option>
                        </select>
                    </div>
                </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="nv_seance" class="btn btn-warning">Enregistrer</button>
                        </div>
                        
                   
                    </form>
                
                </div>
            </div> 
        </div>
    
            <div class="div_table">
                    <table class=""  >
                    <thead class="" >
                        
                        
                        <tr>
                            <td></td>
                            <th colspan="2">MATIN</td>
                            <th ></td>
                            <th colspan="2">APRES MIDI</td>
                            
                            
                        </tr>
                    </thead>
                        <thead class="" >
                        
                        
                        <tr>
                            <td>Jour/Heure</td>
                            <td>8-10</td>
                            <td>10-12</td>
                            <td></td>
                            
                            <td>14-16</td>
                            <td>16-18</td>
                            
                        </tr>
                    </thead>
                    <tr>
                    
                        <td>Lundi</td>
                        <td>
                        <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#es">
                            <i class="bi bi-alarm-fill"></i>
                        </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg bd-example-modal-lg" id="es" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top: 200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE LUNDI 8-10</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Lundi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td>
                         <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#l2">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="l2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE LUNDI 10-12</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Lundi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td></td>
                        <td>
                        <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#l3">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="l3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE LUNDI 14-16</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Lundi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                    </td>
                        <td>
                        <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#l4">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="l4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE LUNDI 16-18</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Lundi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                                         
                        
                    </tr>

                    <tr>
                        <td>Mardi</td>
                        <td>
                            <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#m1">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="m1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE MARDI 08-10</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Mardi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#m2">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="m2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE MARDI 10-12</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Mardi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td></td>
                        <td>
                              <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#m2">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="m2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE MARDI 14-16</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Mardi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td>
                              <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#m4">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="m4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE MARDI 16-18</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Mardi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        
                    </tr>
                    <tr>
                    <td>Mercredi</td>
                        <td>
                        <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#mc1">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="mc1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE MERCREDI 8-10</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Mercredi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#mc2">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="mc2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE MERCREDI 10-12</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Mercredi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td></td>
                        <td>
                            <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#mc3">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="mc3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE MERCREDI 14-16</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Mercredi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td><!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#mc4">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="mc4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE MERCREDI 16-18</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Mercredi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Actions</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// --></td>
                        
                    </tr>
                    <tr>
                    <td>Jeudi</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#j1">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="j1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE JEUDI 8-10</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Jeudi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                    </td>
                        <td>
                             <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#j2">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="j2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE JEUDI 10-12</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Jeudi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td></td>
                        <td>
                             <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#j3">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="j3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE JEUDI 14-16</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Jeudi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td>
                             <!-- Button trigger modal -->
                        <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#j4">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="j4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE JEUDI 14-16</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Jeudi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        
                    </tr>
                    <tr>
                    <td>Vendredi</td>
                    <td>
                         <!-- Button trigger modal -->
                         <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#v1">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="v1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE Vendredi 8-10</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Vendredi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                    </td>
                        <td>
                            <!-- Button trigger modal -->
                         <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#v2">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="v2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE Vendredi 10-12</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Vendredi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td></td>
                        <td><!-- Button trigger modal -->
                         <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#v3">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="v3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE Vendredi 14-16</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Vendredi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                    </td>
                        <td>
                            <!-- Button trigger modal -->
                         <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#v1">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="v1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE Vendredi 16-18</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Vendredi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Actions</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        
                    </tr>
                    <tr>
                       <td>Samedi</td>
                       <td>
                           <!-- Button trigger modal -->
                         <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#s1">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="s1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE SAMEDI 8-10</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='08:00' and s.heure_fin ='10:00' and s.jour='Samedi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// -->
                        </td>
                        <td><!-- Button trigger modal -->
                         <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#s2">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="s2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE SAMEDI 10-12</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='10:00' and s.heure_fin ='12:00' and s.jour='Samedi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// --></td>
                        <td></td>
                        <td><!-- Button trigger modal -->
                         <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#s3">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="s3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE SAMEDI 14-16</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='14:00' and s.heure_fin ='16:00' and s.jour='Samedi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Actions</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>

                                           
                                            
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// --></td>
                        <td><!-- Button trigger modal -->
                         <button type="submit"  class="btn btn-outline-warning"    name="" id="" data-toggle="modal" data-target="#s4">
                            <i class="bi bi-alarm-fill"></i>
                            </button>
                           
                    

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="s4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="margin-top:200px;">
                            <div class="modal-content">
                            <div class="modal-header"  >
                                <h5 class="modal-title" id="exampleModalLongTitle"   >SEANCE SAMEDI 16-18</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            </div>
                            
                            <div class="modal-body">
                            <?php 
                           
                                require_once("connexion.php");
                                $resultat= $connexion -> query("select s.id_seance, g.nom_groupe,sl.nom_salle,fm.nom_formateur,fm.prenom_formateur,s.heure_debut,s.heure_fin,s.jour from seance s join groupe g on s.id_groupe=g.id_groupe join salle sl on sl.id_salle=s.id_salle join formateur fm on fm.id_formateur = g.id_formateur where s.heure_debut='16:00' and s.heure_fin ='18:00' and s.jour='Samedi'");
                            ?>
                            <div class="div_table">
                                <table class="" >
                                    <thead class="" >
                                        <tr>
                                            <td>Groupe</td>
                                            <td>Salle</td>
                                            <td>Nom Formateur</td>
                                            <td>Prenom Formateur</td>
                                            <td>Action</td>
                                            
                                            
                                        </tr>
                                    </thead>

                                    <?php while ($ligne = $resultat -> fetch()) : ?>
                                        <tr>
                                            <td><?php echo $ligne['nom_groupe'] ?></td>
                                            <td><?php echo $ligne['nom_salle'] ?></td>
                                            <td><?php echo $ligne['nom_formateur'] ?></td>
                                            <td><?php echo $ligne['prenom_formateur'] ?></td>
                                            <td>
                                                <input type="hidden" class="delete_id_value" value="<?php echo $ligne['id_seance']; ?>">
                                                <a href="modifierSeance.php?edit=<?php echo $ligne['id_seance']; ?>" class="btn_actions"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
                                                <a href="javascript:void(0)"  value="<?php echo $ligne['id_seance'];?>" class="btn_supp"><i class="bi bi-trash" style="color: red; font-size: 20px;"></i></a>
                                            </td>               
                                        </tr>
                                    <?php endwhile;?>
                                </table>
                            </div>
                             
                            
                            </div>
                            </div>
                        </div>
                        <!--/////// --></td>
                    </tr>
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
    url: "Crudseance.php",
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
<style>

 
table {
  border-collapse: collapse;
}

.div_table {
  width: 100%;
  overflow: hidden;
  
}

.div_table thead tr {
  background: rgb(252,249,247);
background: linear-gradient(90deg, rgba(252,249,247,1) 1%, rgba(252,234,214,1) 51%, rgba(242,213,196,1) 100%);
  font-size: 18px;
  padding: 20px;
  font-weight: bold;
}

th,
td {
  border-bottom: 1px solid #dddddd;
  padding: 7px 18px;
  font-size: 14px;
  text-align: center;
}

tr:nth-child(even) {
  background: rgb(252,249,247);
background: linear-gradient(90deg, rgba(252,249,247,1) 1%, rgba(254,250,246,1) 51%, rgba(255,243,237,1) 100%);
}

tr:nth-child(odd) {
  background-color: white;
}

.div_table table {
  width: 100%;
}

table {
  text-align: center;
  width: 100%;
}

table thead {
  height: 50px;
  font-weight: bold;
}

table thead tr td {
  padding: 0 10px;
}

table tr td {
  padding: 5px;
  height: 40px;
}

</style>

</body>

</html>