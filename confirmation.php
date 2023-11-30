<?php
 if ( isset( $_COOKIE[ 'pin' ] ) && isset( $_COOKIE[ 'serial' ] ) ) {
    header("Location: myDashboard.php");
    exit;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="font-awesome-6/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Heebo:wght@100;200;300;400;500;600;700;800;900&family=Lobster+Two:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
     <title> Premier Nursing College</title>

</head>
<body>
    <nav class="navbar_1 ">
        <div class="logo">
            <a href="#" style="color: gray; font-weight: 800; font-size: 1.1rem;">
                Premier Nursing College
            </a>
        </div>
        <div class="portal">
            <a href="studentPortal.html" class="active-list-item">Student Portal</a>
            <a href="#">Staff Portal</a>
        </div>
    </nav>

    <div class="contact-details student-login" style="margin: 3.4rem 0;">
        <form id= "login_form" method="post">
            <h2>Confirmation Page</h2>
            <div id="error_container">
		</div>

         <div class="form-label">
             <label for="">Serial Number</label>
             <input type="text" name="serial_no">
         </div>
         <div class="form-label">
             <label for="">Pin</label>
             <input type="password" name="pin">
         </div>
         <button type="submit" id="login_button" name="login_button">Proceed</button>
         <p style="text-align: center;">Already registered? <a href="#">Login</a></p>
        </form>
      </div>
  
     <section class="footer  portal-footer">
         <P class="copyright">&copy; Premier Nursing College</P>
     </section>
 
     <script src="./js/jquery.min.js"></script>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script src="./js/owl.carousel.min.js"></script>
     <script src="js/carousel.js"></script>
     <!-- <script src="./js/app.js"></script> -->
     <script type="text/javascript" src="js/validation.min.js"></script>
     <script type="text/javascript" src="js/confirmation.js"></script>
     <script src="js/bootstrap.js"></script>
 </body>
 </html>