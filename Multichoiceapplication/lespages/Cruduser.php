<?php

    session_start();
    
                    
    include("connexion.php");
    /*AJOUTER user*/
    if(isset($_POST["nv_user"])){
        $update=false;
        
        try{


            if($_POST['txt_nom']!="" && $_POST['txt_prenom']!="" && $_POST['txt_email']!="" && $_POST['txt_mdp']!="" && $_POST['txt_role']!="" && $_FILES['img']!=""){

                $fileInfo = pathinfo($_FILES['img']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'svg', 'png'];
                    if (in_array($extension, $allowedExtensions))
                    {
    
                        $nom=$_POST["txt_nom"];
                        $prenom=$_POST["txt_prenom"];
                        $email=$_POST["txt_email"];
                        $mdp=crypt($_POST["txt_mdp"],PASSWORD_DEFAULT) ;
                        $role=$_POST["txt_role"];
                        $image=$_FILES['img']['name'];
                        $upload="../imageusers/".$image;
    
                        move_uploaded_file($_FILES['img']['tmp_name'],$upload);
    
                        $req ="insert into utilisateur values (null,'$nom','$prenom','$email','$mdp','$role','$image')";
                        $connexion->exec($req);

                        $_SESSION['message']="Utilisateur Bien Ajouté";
                        $_SESSION['msg_type']="success";
                            
                        header("location:affichageuser.php");  
    
                    }                 
            }
            else{
                header("location:affichageuser.php");
            }
        }
        
        catch(Exception $e)
        {
            $_SESSION['message']='Exception reçue : '.$e->getMessage()."";
              $_SESSION['msg_type']="danger";
        
              header("location:ajoutuser.php");
                    
        }
        
        
        
    }

    /*SUPPRIMER ETUDIANT*/

    if(isset($_POST["delete"])){
        
        $id=$_POST["id"];
        
        $req ="delete from utilisateur where id_utilisateur = $id";
        $connexion->exec($req);

        
        header("location:affichageuser.php");

    }

    /*MODIFIER ETUDIANT*/

    if(isset($_POST["modifier"])){


        try{

            if($_POST['txt_nom']!="" && $_POST['txt_prenom']!="" && $_POST['txt_email']!="" && $_POST['txt_mdp']!="" && $_POST['txt_role']!=""  ){

                if($_FILES['img']['name']!=""){
                    $update=false;
                
                    $fileInfo = pathinfo($_FILES['img']['name']);
                    $extension = $fileInfo['extension'];
                    $allowedExtensions = ['jpg', 'jpeg', 'svg', 'png'];
                    if (in_array($extension, $allowedExtensions))
                    {
                        $id=$_POST["id_utilisateur"];
                        $nom=$_POST["txt_nom"];
                        $prenom=$_POST["txt_prenom"];
                        $email=$_POST["txt_email"];
                        $mdp=crypt($_POST["txt_mdp"],PASSWORD_DEFAULT) ;
                        $role=$_POST["txt_role"];
                        $image=$_FILES['img']['name'];
                        $upload="../imageusers/".$image;
    
                        move_uploaded_file($_FILES['img']['tmp_name'],$upload);
                        
                        $req ="update utilisateur set nom_utilisateur= '$nom' , prenom_utilisateur= '$prenom' , email_utilisateur= '$email' , mdp_utilisateur= '$mdp' , role_utilisateur= '$role' , image_utilisateur='$image' where id_utilisateur = $id";
                        $connexion ->exec($req);
                        
                        $_SESSION['message']="Utilisateur Modifié";
                        $_SESSION['msg_type']="success";

                        header("location:affichageuser.php");
                    }
    
                }else{
    
                    $update=false;
                
                    
                        $id=$_POST["id_utilisateur"];
                        $nom=$_POST["txt_nom"];
                        $prenom=$_POST["txt_prenom"];
                        $email=$_POST["txt_email"];
                        $mdp=crypt($_POST["txt_mdp"],PASSWORD_DEFAULT) ;
                        $role=$_POST["txt_role"];
                        $image=$_POST['image_utilisateur'];
                                           
                        $req ="update utilisateur set nom_utilisateur= '$nom' , prenom_utilisateur= '$prenom' , email_utilisateur= '$email' , mdp_utilisateur= '$mdp' , role_utilisateur= '$role' , image_utilisateur='$image' where id_utilisateur = $id";
                        $connexion ->exec($req);

                        $_SESSION['message']="Modification Réussite";
                        $_SESSION['msg_type']="success";
                        
                        header("location:affichageuser.php");
                    
    
                }               
            }

        }
        
        catch(Exception $e)
        {
            header("location:affichageuser.php");
                    
        }
        
    }

   
    /*RECHERCHER UN ETUDIANT */

    if(isset($_POST["modifier_param"])){

        $id=$_SESSION["id_utili"];

        if($_POST['txt_nom']!="" && $_POST['txt_prenom']!="" && $_POST['txt_email']!="" && $_POST['txt_mdp']!="" && $_FILES['img']['name']!="" )
        {
            
            $fileInfo = pathinfo($_FILES['img']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'svg', 'png'];
                if (in_array($extension, $allowedExtensions))
                {
                    
                    $nom=$_POST["txt_nom"];
                    $prenom=$_POST["txt_prenom"];
                    $email=$_POST["txt_email"];
                    $mdp=$_POST["txt_mdp"];
                    $image=$_FILES['img']['name'];
                    $upload="../imageusers/".$image;

                    move_uploaded_file($_FILES['img']['tmp_name'],$upload);
                    
                    $req ="update utilisateur set nom_utilisateur= '$nom' , prenom_utilisateur= '$prenom' , email_utilisateur= '$email' , mdp_utilisateur= '$mdp' , image_utilisateur='$image' where id_utilisateur = $id";
                    $connexion ->exec($req);
                    
                    header("location:test.php");
                    
                }         
        }
        else{
                    $nom=$_POST["txt_nom"];
                    $prenom=$_POST["txt_prenom"];
                    $email=$_POST["txt_email"];
                    $mdp=$_POST["txt_mdp"];

                    $req ="update utilisateur set nom_utilisateur= '$nom' , prenom_utilisateur= '$prenom' , email_utilisateur= '$email' , mdp_utilisateur= '$mdp' where id_utilisateur = $id";
                    $connexion ->exec($req);
                    header("location:test.php");
        }
        
    }
?>

