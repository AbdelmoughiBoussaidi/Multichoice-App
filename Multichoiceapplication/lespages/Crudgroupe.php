<?php

    session_start();
    
                    
    include("connexion.php");

    /*AJOUTER FORMATION*/
    if(isset($_POST["nv_groupe"])){

        $update=false;

        

        try{

            if($_POST['txt_nom_grp']!="" && $_POST['formation']!="" && $_POST['formateur']!=""){

                $nom_groupe=$_POST["txt_nom_grp"];
                $formation=$_POST["formation"];
                $formateur=$_POST["formateur"];
                
                $req =" insert into groupe values (null,'$nom_groupe','$formation',$formateur) ";
                $connexion->exec($req);
                $_SESSION['message']="Groupe Ajouté avec succés";
                $_SESSION['msg_type']="success";
    
                header("location:affichagegroupe.php");
            }
            else{
                header("location:affichagegroupe.php");
            }

        }
        
        catch(Exception $e)
        {
            $_SESSION['message']= 'Exception reçue : '.$e->getMessage()."";
            $_SESSION['msg_type']="danger";
        
              header("location:ajoutgroupe.php");
                    
        }

        
        
    }

    /*SUPPRIMER FORMATION*/

    if(isset($_POST["delete"])){
        $id=$_POST["id"];
        
        $req ="delete from groupe where id_groupe = $id";
        $connexion->exec($req);

        $_SESSION['message']="Suppression réussite";
        $_SESSION['msg_type']="danger";

        header("location:affichagegroupe.php");

    }

    /* MODIFIER FORMATION */

    if(isset($_POST["modifier"])){

        try{

            if($_POST['txt_nom_grp']!="" && $_POST['formation']!="" && $_POST['formateur']!=""){

                $update=false;
    
                $id=$_POST["id_groupe"];
                $nom_groupe=$_POST["txt_nom_grp"];
                $formation=$_POST["formation"];
                $formateur=$_POST["formateur"];
                
                $req ="update groupe set nom_groupe= '$nom_groupe' , id_formation= '$formation' , id_formateur= '$formateur' where id_groupe =$id";
                $connexion ->exec($req);
    
                $_SESSION['message']="Modification Réussite";
                $_SESSION['msg_type']="success";
                
                header("location:affichagegroupe.php");
            }
            else{
                header("location:affichagegroupe.php");
            }

        }
        
        catch(Exception $e)
        {
            header("location:affichagegroupe.php");               
        }

        
    }

    /**/

?>