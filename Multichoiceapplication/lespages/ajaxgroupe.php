<?php
if(isset($_GET['formation']) && !empty($_GET['formation'])){

    $connexion = new PDO("mysql:host=localhost;dbname=multichoice_center","root","root");
    $id=$_GET['formation'];
    $res = $connexion ->query("select id_formateur , concat(nom_formateur,' ',prenom_formateur) as 'formateur' from formateur where id_formation = $id");
    $count = $res->rowCount();

    if($count>0){
        while ($ligne = $res->fetch()){
            echo '<option data-value="'.$ligne['id_formateur'].'" >'.$ligne['formateur'].'</option>';
        }
    }else{
        echo '<option>Pas de formateur Disponible</option>';
    }


}else{
    echo "eroor";
}
?>