<?php
if(isset($_GET['formation']) && !empty($_GET['formation'])){

    $connexion = new PDO("mysql:host=localhost;dbname=multichoice_center","root","root");
    $id=$_GET['formation'];
    $res = $connexion ->query("select id_groupe , nom_groupe from groupe where id_formation = $id");
    $count = $res->rowCount();

    if($count>0){
        while ($ligne = $res->fetch()){
            echo '<option data-value="'.$ligne['id_groupe'].'" >'.$ligne['nom_groupe'].'</option>';
        }
    }else{
        echo '<option>Pas de Groupe disponible</option>';
    }

}else{
    echo "eroor";
}
?>