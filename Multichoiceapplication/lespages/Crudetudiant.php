<?php

    session_start();
    
                    
    include("connexion.php");
    /*AJOUTER ETUDIANT*/
    if(isset($_POST["inscrire"])){
        $update=false;

        try{

            if($_POST['txt_nom']!="" && $_POST['txt_prenom']!="" && $_POST['txt_tel']!="" && $_POST['txt_email']!="" && $_POST['txt_adresse']!="" && $_POST['txt_ref_etu']!="" && $_POST['txt_date_inscri']!="" && $_POST['txt_ref_inscri']!=""){

                $nom=$_POST["txt_nom"];
                $prenom=$_POST["txt_prenom"];
                $tel=$_POST["txt_tel"];
                $email=$_POST["txt_email"];
                $adresse=$_POST["txt_adresse"];
                $ref_etu=$_POST["txt_ref_etu"];
                $ref_inscri=$_POST["txt_ref_inscri"];
                $date_inscri=$_POST["txt_date_inscri"];
                $type=$_POST["type"];
    
                $req = $connexion -> prepare("insert into etudiant values (null,:nom,:prenom,:type,:tel,:email,:adresse,:ref_etu,:ref_inscri,:date_inscri)");
                            $req->bindParam(':nom',$nom);
                            $req->bindParam(':prenom',$prenom);
                            $req->bindParam(':tel',$tel);
                            $req->bindParam(':email',$email);
                            $req->bindParam(':adresse',$adresse);
                            $req->bindParam(':ref_etu',$ref_etu);
                            $req->bindParam(':ref_inscri',$ref_inscri);
                            $req->bindParam(':date_inscri',$date_inscri);
                            $req->bindParam(':type',$type);
    
                            $req->execute();
    
                            $_SESSION['message']="Etudiant Ajouté avec succées";
                            $_SESSION['msg_type']="success";
                
                header("location:recuinscription.php?ref=$ref_etu");

            }
            else{
                header("location:recuinscription.php?ref=$ref_etu");
            }

        }catch(Exception $e){

            $_SESSION['message']='Exception reçue : '.$e->getMessage()."";
            $_SESSION['msg_type']="danger";

            header("location:ajoutetu.php");
            
        }

        
        
    }

    /*SUPPRIMER ETUDIANT*/

    if(isset($_POST["delete"])){
        
        $id=$_POST["id"];
        
        $req ="delete from etudiant where id_etudiant = $id";
        $connexion->exec($req);
   
    }

    /*MODIFIER ETUDIANT*/

    if(isset($_POST["modifier"])){


        try{
            
            if($_POST['txt_nom']!="" && $_POST['txt_prenom']!="" && $_POST['txt_tel']!="" && $_POST['txt_email']!="" && $_POST['txt_adresse']!="" && $_POST['txt_ref_etu']!="" && $_POST['txt_date_inscri']!="" && $_POST['txt_ref_inscri']!=""){

                $update=false;
    
                $id=$_POST["id_etudiant"];
                $nom=$_POST["txt_nom"];
                $prenom=$_POST["txt_prenom"];
                $tel=$_POST["txt_tel"];
                $email=$_POST["txt_email"];
                $adresse=$_POST["txt_adresse"];
                $ref_etu=$_POST["txt_ref_etu"];
                $ref_inscri=$_POST["txt_ref_inscri"];
                $date_inscri=$_POST["txt_date_inscri"];
                $type=$_POST["type"];
    
               
                $req = $connexion -> prepare("update etudiant set nom_etudiant =:nom,prenom_etudiant =:prenom,tel_etudiant =:tel,email_etudiant =:email,adresse_etudiant =:adresse,reference_etudiant =:ref_etu,reference_inscription = :ref_inscri ,date_inscription=:date_inscri,type_etudiant =:type where id_etudiant =:id_etudiant");
                            $req ->bindparam(':id_etudiant',$id);
                            $req->bindParam(':nom',$nom);
                            $req->bindParam(':prenom',$prenom);
                            $req->bindParam(':tel',$tel);
                            $req->bindParam(':email',$email);
                            $req->bindParam(':adresse',$adresse);
                            $req->bindParam(':ref_etu',$ref_etu);
                            $req->bindParam(':ref_inscri',$ref_inscri);
                            $req->bindParam(':date_inscri',$date_inscri);
                            $req->bindParam(':type',$type);
    
                            $req->execute();
    
                            $_SESSION['message']="Modification Réussite";
                            $_SESSION['msg_type']="success";
                
                header("location:affichageetudiant.php");
                
            }
            else{
                header("location:affichageetudiant.php");
            }

        }catch(Exception $e){
            header("location:affichageetudiant.php");
        }      
    }

   
    /*RECHERCHER UN ETUDIANT */
?>

