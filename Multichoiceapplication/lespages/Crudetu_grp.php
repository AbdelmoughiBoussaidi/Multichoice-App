<?php
    session_start();
     require_once("connexion.php");

     if(isset($_POST["delete"])){
        $id_etu=$_POST["id"];
        
        
        $req ="delete from etudiant_groupe where id_etudiant = $id_etu" ;
        $connexion->exec($req);

    }

    if(isset($_POST["nv_etu_groupe"])){

        try{

            $etudiant=$_POST['etudiant'];
            $groupe=$_POST['groupe'];
            
            $req ="insert into etudiant_groupe values ($etudiant,$groupe)" ;
            $connexion->exec($req);

            $_SESSION['message']="Choix Ajouté";
            $_SESSION['msg_type']="success";
            
            header("location:affichageetugrp.php");

        }
        
        catch(Exception $e)
        {
            $_SESSION['message']='Exception reçue : '.$e->getMessage()."";
            $_SESSION['msg_type']="danger";
        
            header("location:choixfilier.php");
                    
        }
        
        
    }

?>