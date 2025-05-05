<?php
    if(isset($_GET['groupe']) && !empty($_GET['groupe'])){

        $connexion = new PDO("mysql:host=localhost;dbname=multichoice_center","root","root");
        $id=$_GET['groupe'];
        $res = $connexion ->query("select e.id_etudiant ,e.reference_etudiant from etudiant e inner join  etudiant_groupe eg on e.id_etudiant = eg.id_etudiant where id_groupe =$id");
        $count = $res->rowCount();

        if($count>0){
            while ($ligne = $res->fetch()){
                echo '<option data-value="'.$ligne['id_etudiant'].'" >'.$ligne['reference_etudiant'].'</option>';
            }
        }else{
            echo '<option>Pas detudiants</option>';
        }


    }else{
        echo "eroor";
    }
?>