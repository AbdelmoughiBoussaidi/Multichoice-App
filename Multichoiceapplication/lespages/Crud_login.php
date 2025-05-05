<?php
  session_start();
  include_once("connexion.php");

  $_SESSION['msg']="";
  $x=false;
  if(isset($_POST['btn_login'])){
    $email=$_POST['txt_email'];
    $mdp=crypt($_POST["txt_pass"],PASSWORD_DEFAULT) ;
    

    $resultat= $connexion -> query("select * from utilisateur where email_utilisateur='$email' and mdp_utilisateur='$mdp' ");

    if($resultat->rowCount() > 0){

      $ligne = $resultat ->fetch();

      $_SESSION['id_utili']=$ligne['id_utilisateur'];
      $_SESSION['nom_utili']=$ligne['nom_utilisateur'];
      $_SESSION['prenom_utili']=$ligne['prenom_utilisateur'];
      $_SESSION['mdp_utili']=$ligne['mdp_utilisateur'];
      $_SESSION['email_utili']=$ligne['email_utilisateur'];
      $_SESSION['role_utili']=$ligne['role_utilisateur'];
      $_SESSION['image_utili']=$ligne['image_utilisateur'];
      $x=true;  
      header("location:affichageforma.php");

    }
    else{
        header("location:login.php");
        $_SESSION['msg']= "Email ou Mot de passe incorrect" ;       
    } 
  }
?>