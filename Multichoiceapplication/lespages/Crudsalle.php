<?php
    session_start();
                
    include("connexion.php");

    /*AJOUTER FORMATION*/
    if(isset($_POST["nv_salle"])){

        $update=false;

        try{

            if($_POST['txt_nom']!="" && $_POST['txt_capacite']!=""){

                $nom=$_POST["txt_nom"];
                $capacite=$_POST["txt_capacite"];  
    
                $req ="insert into salle values (null,'$nom',$capacite)";
                $connexion->exec($req);
                
                $_SESSION['message']="Salle Ajoutée avec succées";
                $_SESSION['msg_type']="success";
    
                header("location:affichage_salle.php");
    
            }
            else{
                header("location:affichage_salle.php");
            }

        }catch(Exception $e){

            $_SESSION['message']='Exception reçue : '.$e->getMessage()."";
            $_SESSION['msg_type']="danger";
        
            header("location:ajoutsalle.php");
        }

    }

    /*SUPPRIMER FORMATION*/

    if(isset($_POST["delete"])){

        $id=$_POST["id"];
        
        $req ="delete from salle where id_salle = $id";
        $connexion->exec($req);

    }

    /* MODIFIER FORMATION */

    if(isset($_POST["modifier"])){

        try{

            if($_POST['txt_nom']!="" && $_POST['txt_capacite']!=""){

                $update=false;
    
                $id=$_POST["id_salle"];
                $nom=$_POST["txt_nom"];
                $capacite=$_POST["txt_capacite"];
                
                
                $req ="update salle set nom_salle= '$nom' , capacite_salle=$capacite  where id_salle=$id";
                $connexion ->exec($req);
    
                $_SESSION['message']="Modification Réussite";
                $_SESSION['msg_type']="success";
                
                header("location:affichage_salle.php");
            }
            else{
                header("location:affichage_salle.php");
            }
        

        }catch(Exception $e){
            
           header("location:affichage_salle.php");

        }

    }

?>