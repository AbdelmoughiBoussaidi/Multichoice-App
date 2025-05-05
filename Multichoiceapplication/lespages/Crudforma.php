<?php

    
    session_start();
                    
    include("connexion.php");

    /*AJOUTER FORMATION*/
    if(isset($_POST["nv_formation"])){

        $update=false;

        try{

            if($_POST['txt_libelle']!="" && $_POST['txt_dure']!="" && $_POST['txt_prix']!="" && $_POST['txt_descri']!="" &&$_POST['txt_type']!="Type Formation ?" && $_FILES['img']!="" ){
            
                $fileInfo = pathinfo($_FILES['img']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'svg', 'png','webp'];
                    if (in_array($extension, $allowedExtensions))
                    {
                            $libelle=$_POST["txt_libelle"];
                            $nbr_heure=$_POST["txt_nbr_heure"];
                            $dure=$_POST["txt_dure"];
                            $prix=$_POST["txt_prix"];
                            $descri=$_POST["txt_descri"];
                            $type=$_POST["txt_type"];
                            $image=$_FILES['img']['name'];
                            
    
                            $upload="../imageformation/".$image;
                            
                        
                            move_uploaded_file($_FILES['img']['tmp_name'],$upload);
                
                            $req = $connexion -> prepare("insert into formation values (null,:libelle,:nbr_heure,:dure,:prix,:descri,:type,:image)");
    
                            $req->bindParam(':libelle',$libelle);
                            $req->bindParam(':nbr_heure',$nbr_heure);
                            $req->bindParam(':dure',$dure);
                            $req->bindParam(':prix',$prix);
                            $req->bindParam(':descri',$descri);
                            $req->bindParam(':type',$type);
                            $req->bindParam(':image',$image);
    
                            $req->execute();
                            
                            $_SESSION['message']="Formation Bien Ajouté";
                            $_SESSION['msg_type']="success";
    
                            header("location:affichageforma.php");
                    } 
            }
            else{
                header("location:affichageforma.php");
            }

        }
        
        catch(Exception $e)
        {
            $_SESSION['message']='Exception reçue : '.$e->getMessage()."";
            $_SESSION['msg_type']="danger";
        
            header("location:ajouformation.php");
                    
        }
        

        
        
    }

    /*SUPPRIMER FORMATION*/

    if(isset($_POST["delete"])){
        $id=$_POST["id"];
        
        $req ="delete from formation where id_formation = $id";
        $connexion->exec($req);

    }

    /* MODIFIER FORMATION */

    if(isset($_POST["modifier"])){


        try{

            if($_POST['txt_libelle']!="" && $_POST['txt_dure']!="" && $_POST['txt_prix']!="" &&  $_POST["txt_descri"]!="" && $type=$_POST["txt_type"]!="Type Formation ?"){
            

                if($_FILES['img']['name']!=""){
                    $update=false;
    
                    $id=$_POST["id_formation"];
                    $libelle=$_POST["txt_libelle"];
                    $nbr_heure=$_POST["txt_nbr_heure"];
                    $dure=$_POST["txt_dure"];
                    $prix=$_POST["txt_prix"];
                    $descri=$_POST["txt_descri"];
                    $type=$_POST["txt_type"];
                    $image=$_FILES['img']['name'];
                    
                    $upload="../imageformation/".$image;
                            
                    move_uploaded_file($_FILES['img']['tmp_name'],$upload);
                    
                    $req = $connexion ->prepare("update formation set libelle_formation= :libelle , nbr_heure_formation= :nbr_heure , dure_formation= :dure , prix_total_formation= :prix , description_formation= :descri , type_formation= :type, image_formation= :image where id_formation =:id") ;
                    $req->bindParam(':id',$id);
                    $req->bindParam(':libelle',$libelle);
                    $req->bindParam(':nbr_heure',$nbr_heure);
                    $req->bindParam(':dure',$dure);
                    $req->bindParam(':prix',$prix);
                    $req->bindParam(':descri',$descri);
                    $req->bindParam(':type',$type);
                    $req->bindParam(':image',$image);
                    
                    $req -> execute();
    
                    $_SESSION['message']="Modification avec succes";
                    $_SESSION['msg_type']="success";
                    
                    header("location:affichageforma.php");
                }else{
                    $update=false;
    
                    $id=$_POST["id_formation"];
                    $libelle=$_POST["txt_libelle"];
                    $nbr_heure=$_POST["txt_nbr_heure"];
                    $dure=$_POST["txt_dure"];
                    $prix=$_POST["txt_prix"];
                    $descri=$_POST["txt_descri"];
                    $type=$_POST["txt_type"];
                    $image=$_POST["image_formation"];
                            
                    $req = $connexion ->prepare("update formation set libelle_formation= :libelle , nbr_heure_formation= :nbr_heure , dure_formation= :dure , prix_total_formation= :prix , description_formation= :descri , type_formation= :type, image_formation= :image where id_formation =:id") ;
                    $req->bindParam(':id',$id);
                    $req->bindParam(':libelle',$libelle);
                    $req->bindParam(':nbr_heure',$nbr_heure);
                    $req->bindParam(':dure',$dure);
                    $req->bindParam(':prix',$prix);
                    $req->bindParam(':descri',$descri);
                    $req->bindParam(':type',$type);
                    $req->bindParam(':image',$image);
                    
                    $req -> execute();
    
                    $_SESSION['message']="Modification avec succes";
                    $_SESSION['msg_type']="success";
                    
                    header("location:affichageforma.php");
                }
            }

        }catch(Exception $e)
        {
        
                    
        }          
        
    }

    /*RECHERCHER UN ETUDIANT */

?>