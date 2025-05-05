<?php 
  session_start();
  if(!isset($_SESSION["msg"])){
    $_SESSION['msg']="";
  }
  $x=false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <?php include("linkstyle.html") ?>
  <title>Multi Choice | Login</title>
  <link rel="stylesheet" href="dg.scss">
  
</head>

<body>
  <div class="">
    <div class="">
      <div class="" id="body_img" >
        <div class="">
          <div class="">

            <div class="container" id="container">
                  
                  <div class="form-container sign-in-container">
                    <form action="Crud_login.php" action="Crud_login.php" method="POST">
                      <h1>Se connecter</h1>
                      <div class="social-container">
                        <a href="#" class="social"><i id="insta" class="bi bi-instagram"></i></a>
                        <a href="#" class="social"><i id="fb" class="bi bi-facebook"></i></a>
                        <a href="#" class="social"><i id="twitter" class="bi bi-twitter"></i></a>
                      </div>
                      
                      <input name="txt_email" type="email" placeholder="Email" />
                      <input name="txt_pass" type="password" placeholder="Password" />
                      <a href="#">Mot de passe oublié?</a>
                      <button type="submit" class="" name="btn_login" href="" id="btn_login">SE connecter</button>

                      <?php if($_SESSION["msg"]=="Email ou Mot de passe incorrect" && $x==false):?>
                        <div style="text-align: center;" class="alert alert-danger"><?php echo $_SESSION["msg"]; ?></div>
                      <?php endif ?>

                    </form>
                  </div>
                  
                  <div class="overlay-container">
                    <div class="overlay">
                      <div id="overlay_right" class="overlay-panel overlay-right">
                        <img class="logo_img" src="../images/multi.svg" alt="">
                        <p>Entrez vos données personelles et commencez avec nous !</p>
                      </div>
                    </div>
                  </div>
                </div>

            </div>

            
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- BUTTON AFFicher mdp -->
 
    
  <!-- plugins:js -->

  <?php include("linkjs.html") ?>
  <!-- endinject -->

  <style>
    
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
          box-sizing: border-box;
        }

        body {
          background: #f6f5f7;
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          font-family: 'Montserrat', sans-serif;
          height: 100vh;
          margin: -20px 0 50px;
        }

        h1 {
          font-weight: bold;
          margin: 0;
        }

        h2 {
          text-align: center;
        }

        p {
          font-size: 14px;
          font-weight: 100;
          line-height: 20px;
          letter-spacing: 0.5px;
          margin: 20px 0 30px;
          color: black;
        }

        span {
          font-size: 12px;
        }

        a {
          color: #333;
          font-size: 14px;
          text-decoration: none;
          margin: 15px 0;
        }

        button {
          border-radius: 20px;
          border: 1px solid black;
          background:transparent;
          color: black;
          font-size: 12px;
          font-weight: bold;
          padding: 12px 45px;
          letter-spacing: 1px;
          text-transform: uppercase;
          transition: transform 80ms ease-in;
        }

        button:active {
          transform: scale(0.95);
        }

        button:focus {
          outline: none;
        }

        button.ghost {
          background-color: transparent;
          border-color: #FFFFFF;
        }

        form {
          background-color: #FFFFFF;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          padding: 0 50px;
          height: 100%;
          text-align: center;
        }

        input {
          background-color: #eee;
          border: none;
          padding: 12px 15px;
          margin: 8px 0;
          width: 100%;
          border-radius: 5px;
        }

        .container {
          background-color: #fff;
          
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
              0 10px 10px rgba(0,0,0,0.22);
          position: relative;
          overflow: hidden;
          width: 768px;
          max-width: 100%;
          min-height: 480px;
        }

        .form-container {
          position: absolute;
          top: 0;
          height: 100%;
          transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
          left: 0;
          width: 50%;
          z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
          transform: translateX(100%);
        }

        .sign-up-container {
          left: 0;
          width: 50%;
          opacity: 0;
          z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
          transform: translateX(100%);
          opacity: 1;
          z-index: 5;
          animation: show 0.6s;
        }

        @keyframes show {
          0%, 49.99% {
            opacity: 0;
            z-index: 1;
          }
          
          50%, 100% {
            opacity: 1;
            z-index: 5;
          }
        }

        .overlay-container {
          position: absolute;
          top: 0;
          left: 50%;
          width: 50%;
          height: 100%;
          overflow: hidden;
          transition: transform 0.6s ease-in-out;
          z-index: 100;
        }

        .container.right-panel-active .overlay-container{
          transform: translateX(-100%);
        }

        .overlay {
          background: #FF416C;
          background:radial-gradient( circle 489px at 49.3% 46.6%,  rgba(255,214,126,1) 0%, rgba(253,200,0,1) 100.2% );
          /* background: radial-gradient( circle 400px at 6.8% 8.3%,  rgba(255,244,169,1) 0%, rgba(255,244,234,1) 100.2% ); */
          background-repeat: no-repeat;
          background-size: cover;
          background-position: 0 0;
          color: #FFFFFF;
          position: relative;
          left: -100%;
          height: 100%;
          width: 200%;
            transform: translateX(0);
          transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
          position: absolute;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          padding: 0 40px;
          text-align: center;
          top: 0;
          height: 100%;
          width: 50%;
          transform: translateX(0);
          transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
          transform: translateX(-20%);
          background: radial-gradient( circle 489px at 49.3% 46.6%,  rgba(255,214,126,1) 0%, rgba(253,200,0,1) 100.2% );
          
        }

        .container.right-panel-active .overlay-left {
          transform: translateX(0);
        }

        .overlay-right {
          right: 0;
          transform: translateX(0);
          background-image: radial-gradient( circle 400px at 6.8% 8.3%,  rgba(255,244,169,1) 0%, rgba(255,244,234,1) 100.2% );
        }

        .container.right-panel-active .overlay-right {
          transform: translateX(20%);
        }

        .social-container {
          margin: 20px 0;
        }

        .social-container a {
          border: 1px solid #DDDDDD;
          border-radius: 50%;
          display: inline-flex;
          justify-content: center;
          align-items: center;
          margin: 0 5px;
          height: 40px;
          width: 40px;
        }

       

        .logo_img{
          width: 250px;
        }

        
  </style>
</body>

</html>
