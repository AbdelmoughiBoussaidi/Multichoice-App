<?php


session_start();

include_once('connexion.php');

if(isset($_POST['nv_seance'])){

    //njabdo les données;    

    $resultat = $connexion ->query("select sea.*,fo.id_formateur, concat(fo.nom_formateur,' ',fo.prenom_formateur) as 'formateur' , gr.nom_groupe from seance sea inner JOIN groupe gr on sea.id_groupe=gr.id_groupe INNER JOIN formateur fo on gr.id_formateur=fo.id_formateur ");
    
    $id_groupe=$_POST['groupe'];
    $id_salle=$_POST['salle'];
    $heure_debut=$_POST['txt_hd'].':00';
    $heure_fin=$_POST['txt_hf'].':00';
    $jour=$_POST['jour'];

    $exist=0;


    $formateur_row= $connexion ->query("select fo.id_formateur ,concat(fo.nom_formateur,' ',fo.prenom_formateur) from groupe gr INNER join formateur fo on fo.id_formateur=gr.id_formateur where gr.id_groupe=$id_groupe");
    
    $ligne2 = $formateur_row->fetch();

                while ($ligne = $resultat -> fetch()) {
            
                    if($id_groupe==$ligne['id_groupe'] && $heure_debut==$ligne['heure_debut'] && $heure_fin==$ligne['heure_fin'] && $jour==$ligne['jour'] ){

                        
                        $_SESSION['message']="Le Groupe a deja une Seance dans cette periode";
                        $_SESSION['msg_type']="warning";
                        header("location:emplois.php");
                        break;

                    }else{

                        if($id_salle==$ligne['id_salle'] && $heure_debut==$ligne['heure_debut'] && $heure_fin==$ligne['heure_fin'] && $jour==$ligne['jour'] ){

                            $_SESSION['message']="Le Salle est deja Occupé pendant cette Période";
                            $_SESSION['msg_type']="warning";
                            header("location:emplois.php");
                            break;

                        }else{

                            if($id_salle==$ligne['id_salle'] && $heure_debut==$ligne['heure_debut'] && $heure_fin==$ligne['heure_fin'] && $jour==$ligne['jour'] ){

                                $_SESSION['message']="Le Salle est deja Occupé pendant cette Période";
                                $_SESSION['msg_type']="warning";
                                header("location:emplois.php");
                                break;
    
                            }else{

                                if($ligne2['id_formateur']==$ligne['id_formateur'] && $heure_debut==$ligne['heure_debut'] && $heure_fin==$ligne['heure_fin'] && $jour==$ligne['jour'] ){

                                    $_SESSION['message']="Le Formateur de ce groupe n'est pas disponible pendant cette Période";
                                    $_SESSION['msg_type']="warning";
                                    header("location:emplois.php");
                                    break;
        
                                }else{

                                    $exist++;
                                    
                                }

                            }
                            
                        }
                        
                    }
                         
                }
                echo $exist;
        
        
                if($exist==$resultat->rowCount()){
             
                                    $requete = $connexion -> prepare("insert into seance values (null,:groupe,:salle,:hd,:hf,:jour)");

                                    $requete->bindParam(':groupe',$_POST['groupe']);
                                    $requete->bindParam(':salle',$_POST['salle']);
                                    $requete->bindParam(':hd',$_POST['txt_hd']);
                                    $requete->bindParam(':hf',$_POST['txt_hf']);
                                    $requete->bindParam(':jour',$_POST['jour']);
                                    
                                    $requete->execute();

                                    $_SESSION['message']="Seance Ajouté avec succès".$nbr;
                                    $_SESSION['msg_type']="success";
                                    header("location:emplois.php");
                                   

                }
        
    
}

  //SUPPRIMER SEANCE 

    if(isset($_POST["delete"])){
            
        $id=$_POST["id"];
        
        $req ="delete from seance where id_seance =$id";
        $connexion->exec($req);

    }


    
  //MODIFIER SEANCE 

  if(isset($_POST["modifier"])){
     
    $ids = $_POST['id_seance'];
    $group=$_POST["group"];
    $sall=$_POST["sall"];
    $heurd=$_POST["txt_hd"];
    $heurf=$_POST["txt_hf"];
    $jour=$_POST["jour"];
    
    $req ="update seance set id_groupe= '$group' , id_salle= '$sall' , heure_debut= '$heurd' ,heure_fin = '$heurf' ,jour='$jour'   where id_seance =$ids";
    $connexion ->exec($req);  
    header('location:emplois.php');

}


?>