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
            <a href="studentPortal.html" class="active-list-item">Student Portal</a>
            <a href="./lecturersDashboard/lecturerLogin.html">Staff Portal</a>
        </div>
    </nav>

    <div class="contact-details student-login" style="margin: 3.4rem 0;">
        <form action="">
            <h2>Student’s Sign Up</h2>
         <div class="form-label">
             <label for="">Username</label>
             <input type="text">
         </div>
         <div class="form-label">
             <label for="">Surname</label>
             <input type="password">
         </div>
         <div class="form-label">
             <label for="">First Name</label>
             <input type="password">
         </div>
         <div class="form-label">
             <label for="">Middle Name (Optional)</label>
             <input type="password">
         </div>
         <div class="form-label">
             <label for="">Email</label>
             <input type="email">
         </div>
         <div class="form-label">
             <label for="">Mobile Number</label>
             <input type="number">
         </div>
         <div class="form-label">
             <label for="">password</label>
             <input type="password">
         </div>
         <div class="form-label">
             <label for="">Confirm password</label>
             <input type="password">
         </div>
        
         <button type="submit">Proceed</button>
         <!-- <p style="text-align: center;">Already registered? <a href="#">Login</a></p> -->
        </form>
      </div>
  
     <section class="footer  portal-footer">
         <P class="copyright">&copy; Premier Nursing College</P>
     </section>
 
     <script src="./js/jquery.min.js"></script>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script src="./js/owl.carousel.min.js"></script>
     <script src="js/carousel.js"></script>
     <script src="./js/app.js"></script>
 </body>
 </html>