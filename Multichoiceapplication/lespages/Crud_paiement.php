<?php
               
    session_start();
    include("connexion.php");

    /*AJOUTER Paiment*/
    if(isset($_POST["nv_paiement"])){

        $update=false;

        try{

            if($_POST['txt_ref_paiement']!="" && $_POST['txt_type']!="" && $_POST['txt_date']!="" && $_POST['user']!="" && $_POST['txt_montant']!=""){

                $ref_pai=$_POST["txt_ref_paiement"];
                $type=$_POST['txt_type'];
                $date=$_POST['txt_date'];
                $montant=$_POST['txt_montant'];
                $id_etudiant=$_POST['id_etudiant'];
                $user=$_POST['user']; 
                
    
                $req ="insert into paiement values (null,'$ref_pai','$type','$date',$montant,$id_etudiant,$user)";
                $connexion->exec($req);
                
                $_SESSION['message']="Paiement effectué Avec succés";
                $_SESSION['msg_type']="success";
    
                header("location:affichage_paiement.php");
            }
            else{
                header("location:affichage_paiement.php");
            }

        }catch(Exception $e){
            
            $_SESSION['message']='Exception reçue : '.$e->getMessage()."";

            $_SESSION['msg_type']="danger";
        
            header("location:ajout_paiement.php");
        }
    }

    /*SUPPRIMER Paiment*/

    if(isset($_POST["delete"])){
        $id=$_POST["id"];
        
        $req ="delete from paiement where id_paiement = $id";
        $connexion->exec($req);

    }


    /*MODIFIER Paiment*/
    
    if(isset($_POST["modifier"])){

        try{

            if($_POST['txt_ref_paiement']!="" && $_POST['etudiant']!="" && $_POST['user']!="" && $_POST['txt_type']!="Comment payer ?" && $_POST['txt_date']!="" && $_POST['txt_montant']!="" ){

                $update=false;
    
                        $id=$_POST["id_paiement"];
                        $ref_pai=$_POST["txt_ref_paiement"];
                        $type=$_POST['txt_type'];
                        $date=$_POST['txt_date'];
                        $montant=$_POST['txt_montant'];
                        $id_etudiant=$_POST['id_etudiant'];
                        $user=$_POST['user']; 
                        
                        $req ="update paiement set reference_paiement= '$ref_pai' , type_paiement= '$type' , date_paiement= '$date' , montant_paye= '$montant' , id_etudiant= $id_etudiant , id_utilisateur=$user where id_paiement = $id";
                        $connexion ->exec($req);
    
                        $_SESSION['message']="Paiement Modifiée";
                        $_SESSION['msg_type']="success";
                        
                        header("location:affichage_paiement.php");
    
            }
            else{
                header("location:affichage_paiement.php");
            }
        

        }catch(Exception $e){
            
            header("location:affichage_paiement.php");
        }

       
    }

?>