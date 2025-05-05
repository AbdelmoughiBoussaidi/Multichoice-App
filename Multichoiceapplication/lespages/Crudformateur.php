<?php

    session_start();
    
                    
    include("connexion.php");

    /*AJOUTER FORMATION*/
    if(isset($_POST["nv_formateur"])){


        $update=false;

        try{

            if($_POST['txt_nom']!="" && $_POST['txt_prenom']!="" && $_POST['txt_tel']!="" && $_POST['txt_email']!="" && $_POST['txt_adresse']!="" && $_POST['specialite']!="Choisir la specialité"){

                $nom=$_POST["txt_nom"];
                $prenom=$_POST["txt_prenom"];
                $tel=$_POST["txt_tel"];
                $email=$_POST["txt_email"];
                $adresse=$_POST["txt_adresse"];
                $specialite=$_POST["specialite"];
                
    
                $req ="insert into formateur values (null,'$nom','$prenom','$tel','$adresse','$email',$specialite)";
                $connexion->exec($req);
                
                $_SESSION['message']="Formateur Ajouté avec succés";
                $_SESSION['msg_type']="success";
    
                header("location:affichageformateur.php");
            }
            else{
                header("location:affichageformateur.php");
            }

        }
        
        catch(Exception $e)
        {
            $_SESSION['message']='Exception reçue : '.$e->getMessage()."";
              $_SESSION['msg_type']="danger";
        
              header("location:ajoutformateur.php");
                    
        }

        
        
    }

    /*SUPPRIMER FORMATION*/

    if(isset($_POST["delete"])){
        $id=$_POST["id"];
        
        $req ="delete from formateur where id_formateur = $id";
        $connexion->exec($req);

        $_SESSION['message']="Suppression réussite";
        $_SESSION['msg_type']="danger";

        header("location:affichageformateur.php");

    }

    /* MODIFIER FORMATION */

    if(isset($_POST["modifier"])){

        try{

            if($_POST['txt_nom']!="" && $_POST['txt_prenom']!="" && $_POST['txt_tel']!="" && $_POST['txt_email']!="" && $_POST['txt_adresse']!="" && $_POST['specialite']!="Choisir la specialité"){
                $update=false;
    
                $id=$_POST["id_formateur"];
                $nom=$_POST["txt_nom"];
                $prenom=$_POST["txt_prenom"];
                $tel=$_POST["txt_tel"];
                $email=$_POST["txt_email"];
                $adresse=$_POST["txt_adresse"];
                $specialite=$_POST["specialite"];
                
                $req ="update formateur set nom_formateur= '$nom' , prenom_formateur= '$prenom' , tel_formateur= '$tel' , email_formateur= '$email' , adresse_formateur= '$adresse' , id_formation= $specialite where id_formateur=$id";
                $connexion ->exec($req);
        
                $_SESSION['message']="Modification Réussite";
                $_SESSION['msg_type']="success";
                
                header("location:affichageformateur.php");
            }
            else{
                header("location:affichageformateur.php");
            }

        }
        
        catch(Exception $e)
        {
            header("location:affichageformateur.php");
        }

        
    }

    /*RECHERCHER UN ETUDIANT */
?>