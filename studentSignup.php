<?php
 if ( isset( $_COOKIE[ 'username' ] ) ) {
    header("Location: myDashboard.php");
    exit;
 }
?>
<?php
include_once('./inc/header.php');
?>

    <nav class="navbar_1 ">
        <div class="logo">
            <a href="index.html" style="color: gray; font-weight: 800;">
                Premier Nursing College
            </a>
        </div>
        <div class="portal">
            <a href="#" class="active-list-item">Student Portal</a>
            <a href="#">Staff Portal</a>
        </div>
    </nav>

    <div class="contact-details student-login" style="margin: 3.4rem 0;">

    <form id="signupForm" method="post">
        <h2>Student’s Sign Up</h2>
        <div id="error_container">
		</div>
        <div class="form-label">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="form-label">
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname">
        </div>
        <div class="form-label">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname">
        </div>
        <div class="form-label">
            <label for="middlename">Middle Name (Optional)</label>
            <input type="text" id="middlename" name="middlename">
        </div>
        <div class="form-label">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="form-label">
            <label for="mobile">Mobile Number</label>
            <input type="text" id="mobile" name="mobile">
        </div>
        <div class="form-label">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="form-label">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password">
        </div>
        <button name="signup_button" id="signup_button" type="submit">Proceed</button>
    </form>

        
      </div>
  
     <section class="footer  portal-footer">
         <P class="copyright">&copy; Premier Nursing College</P>
     </section>
 
     <script src="./js/jquery.min.js"></script>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script src="./js/owl.carousel.min.js"></script>
     <script src="js/carousel.js"></script>
     <script type="text/javascript" src="js/validation.min.js"></script>
     <script src="js/signup.js"></script>

 </body>
 </html>