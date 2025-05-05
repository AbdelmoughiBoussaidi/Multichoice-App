<?php
session_start();

    include("connexion.php");

    /*AJOUTER FORMATION*/
    if(isset($_POST["nv_absence"])){


        try{

            $update=false;

       
            $ref_etu=$_POST["etudiant"];
            $date_abs=$_POST["txt_date"];
            $remarque_abs=$_POST["txt_rem"];
            $groupe=$_POST["groupe"];
            

            $req ="insert into absence values (null,'$date_abs','$remarque_abs',$ref_etu,$groupe)";
            $connexion->exec($req);

            $_SESSION['message']="Absence Ajouté avec succès";
            $_SESSION['msg_type']="success";
                
            
            header("location:affichageabsence.php");

        }

        catch(Exception $e){
            
            $_SESSION['message']='Exception reçue : '.$e->getMessage()."";
            $_SESSION['msg_type']="danger";
        
            header("location:ajoutabsence.php");
        }
        
        
    }   

    /*SUPPRIMER FORMATION*/

    if(isset($_POST["delete"])){
        $id=$_POST["id"];
        
        $req ="delete from absence where id_absence= $id";
        $connexion->exec($req);

    }

    /* MODIFIER FORMATION */

    if(isset($_POST["modifier"])){

        try{

            if($_POST['etudiant']!="" && $_POST['txt_date']!="" && $_POST['txt_rem']!="" && $_POST['groupe']!=""){

                $update=false;
                $id=$_POST["id_absence"];
                $ref_etu=$_POST["etudiant"];
                $date_abs=$_POST["txt_date"];
                $remarque_abs=$_POST["txt_rem"];
                $groupe=$_POST["groupe"];
                
                $req ="update absence set id_etudiant=$ref_etu , date_absence= '$date_abs' , remarque_absence= '$remarque_abs' , id_etudiant=$ref_etu , id_groupe = $groupe where id_absence =$id";
                $connexion ->exec($req);
    
                $_SESSION['message']="Modification avec succes";
                $_SESSION['msg_type']="success";
                
                header("location:affichageabsence.php");
            }
            else{
                header("location:affichageabsence.php");
            }

        }catch(Exception $e){
            
            header("location:affichageabsence.php");

        }


        
        
    }

    /*RECHERCHER UN ETUDIANT */

?>