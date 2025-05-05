<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MultiChoice Center</title>
    <!-- Favicon icon -->
    <?php include_once('linkstyle.html'); ?>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Header and Sidebar
        ***********************************-->
        <?php include_once('nav_header_all.php'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <?php 

                require_once("connexion.php");
                $resultat= $connexion -> query("SELECT YEAR(date_inscription) as date_inscription, count(*) as coun from etudiant GROUP by YEAR(date_inscription)");
                foreach($resultat as $data){
                    $date_inscription[] = $data['date_inscription'];
                    $coun [] = $data['coun'];
                }


                $type= $connexion -> query("select type_paiement ,SUM(montant_paye) as MONTANT from paiement group by type_paiement");
                foreach($type as $data) {
                    
                    $montant [] = $data['MONTANT'];
                }

            ?>
            <div class="charts_grp">
                <div class="stats"  >
                 <p>Total Des Etudiants </p> 
                 
                    <?php
                        $sql = $connexion ->query("select count(*)as totale from etudiant ");
                        $ligne = $sql ->fetch();
                        echo ''.$ligne['totale'].''.'<i class="bi bi-people-fill"></i>' ; 
                     ?>
                     
                </div>
  
                <div class="stats" >
                <p>Nombre Des Garçons </p> 
                 
                 <?php
                     $sql = $connexion ->query("select COUNT(*)as totalh from etudiant where type_etudiant='homme' ");
                     $ligne = $sql ->fetch();
                     echo ''.$ligne['totalh'].''.'<i class="bi bi-gender-male"></i>' ; 
                  ?>
                </div>

                <div class="stats" >
                <p>Nombre Des Filles</p> 
                 
                 <?php
                     $sql = $connexion ->query("select COUNT(*)as totalf from etudiant where type_etudiant='femme' ");
                     $ligne = $sql ->fetch();
                     echo ''.$ligne['totalf'].''.'<i class="bi bi-gender-female"></i>' ; 
                  ?>
                </div>

                <div class="stats" >
                <p>Nombre Des Formateurs </p> 
                 
                 <?php
                     $sql = $connexion ->query("select COUNT(*)as totalf from formateur   ");
                     $ligne = $sql ->fetch();
                     echo ''.$ligne['totalf'].''.'  <i class="fa fa-suitcase" aria-hidden="true"></i>' ; 
                  ?>
                </div>

                <div class="stats" >
                <p>Nombre Des Salles</p> 
                 
                 <?php
                     $sql = $connexion ->query("select COUNT(*)as totals from salle   ");
                     $ligne = $sql ->fetch();
                     echo ''.$ligne['totals'].''.'<i class="fa-solid fa-building-columns"></i>' ; 
                  ?>
                </div>

                <div class="chart2">
                    <canvas id="myChart"></canvas>
                    <p style="text-align:center;">Nombre des inscriptions par année </p>
                </div>

                <div class="chart2"   >
                    <canvas id="typechart" ></canvas>           
                </div>
        </div>


        <div class="charts_grp">
                <div class="stats2" >
                <p>Chiffre d'affaire total</p> 
                 
                 <?php
                     $sql = $connexion ->query("select sum(montant_paye) as ca_total  from paiement");
                     $ligne = $sql ->fetch();
                     echo '<span>'.$ligne['ca_total'].'</span>'.' DH' ; 
                ?>
                </div>

                
                <div class="stats2" >
                <p>Chiffre d'affaire du mois en cours</p> 
                 
                 <?php
                     $sql = $connexion ->query("select sum(montant_paye) as ca_mois  from paiement where MONTH(date_paiement)=MONTH(CURRENT_DATE())");
                     $ligne = $sql ->fetch();
                     echo '<span>'.$ligne['ca_mois'].'</span>'.' DH' ; 
                  ?>
                </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->

    <?php include_once('linkjs.html');?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
                    .charts_grp{
                        display: flex;
                        flex-wrap: wrap;
                        justify-content:space-between;
                    }

             .chart2{
                width: 500px;
                
                margin:20px ;
                box-shadow:1px 1px 5px rgba(0, 0, 0, 0.2);
                border-radius:5px;
                padding:50px;
             }
             
             i{
                 
             }

             .stats{

                 font-family: 'Poppins', sans-serif;
                 padding: 10px;
                 width: 170px;
                 height: 170px;
                 margin:20px auto;
                 /* border-left:10px solid #4D77FF; */
                 box-shadow:1px 1px 5px rgba(0, 0, 0, 0.2);
                 backdrop-filter: blur(5px); 
                 transition: 0.3s ease-in-out all;
                 text-align: center;
                 font-size: 35px;color:orange;
                 border-radius:3px;
                 cursor: pointer;
                 border-left:10px solid #252525;
                border-bottom:10px solid orange; 
             }

             .stats p, .stats2 p {
                 font-size: 18px;
                 transition: 0.3s ease-in-out all;
                 color: #252525;
             }

             .stats p::first-letter ,.stats2 p::first-letter {
                 font-size: 22px;
                 color: orange;
             }

             .stats:hover{
                
                background-color: #252525;
                border-left:10px solid orange;
                border-bottom:10px solid orange;
                
             }

             .stats:hover p{
                color: white;
             }


             .stats2{

                font-family: 'Poppins', sans-serif;
                padding: 10px;
                width: 400px;
                margin:20px auto;
                /* border-left:10px solid #4D77FF; */
                box-shadow:1px 1px 5px rgba(0, 0, 0, 0.2);
                backdrop-filter: blur(5px); 
                transition: 0.3s ease-in-out all;
                text-align: center;
                font-size: 25px;color:orange;
                border-radius:3px;
                cursor: pointer;
                border-left:10px solid #252525;
                border-bottom:10px solid orange;
            }

            .stats2 span{
                color: #252525;
            }

    
             
            </style>

            <script>
                    const labels =<?php echo json_encode($date_inscription)?>;
                    const data = {
                    labels: labels,
                    datasets: [{
                        label: 'My First Dataset',
                        data:<?php echo json_encode($coun)?> ,
                        backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                    };
                    const config = {
                    type: 'line',
                    data: data,
                    options: {
                        scales: {
                        y: {
                            beginAtZero: true
                        }
                        }
                    },
                    };
                    var myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
            </script>

            <script>

                const datatype = {
                labels: [
                'Red',
                'Green',
                'Yellow',
                'Grey',
                'Blue'
                    ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [11, 16, 7, 3, 14],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(54, 162, 235)'
                    ]
                }]
                };
                const configtyp = {
                type: 'polarArea',
                data: datatype,
                options: {}
                };
                const typechart = new Chart(
                    document.getElementById('typechart'),
                    configtyp
                );
                
            </script>

</body>

</html>