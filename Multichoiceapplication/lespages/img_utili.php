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
                <a style="float: left;" href="affichageuser.php"><i class="bi bi-arrow-left" style="font-size: 30px;color:orange;"></i></a>
                <?php 
                    if(isset($_GET['img']))
                    {
                        $image=$_GET['img'];
                    }
                ?>
                <img style="border-radius: 5px;" class="img_user" src="../imageusers/<?php echo $image; ?>" alt="<?php echo $image; ?>">
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
    .img_user{
        width: 500px;
        height: 500px;
        margin-top: 20px;
        border-radius: 10%;
        margin-left: 250px;
        box-shadow: 1px 3px 10px lightslategray;
    }
    
    </style>

</body>

</html>