<?php
include_once('./inc/header.php');
include_once('./inc/navbar.php');
include_once('./inc/sidebar.php');
?>
    <div class="myDashboard">
        <div class="toggle-bars">
        <i class="fa fa-bars"></i>
       </div>
      <div class="navbarLinks">
       <div class="personalInfoMenuLinks">
        <a href="personalInfo.html">Biodata</a>
        <a href="examinationHistory.html" class="activePersonalLink">Examination background</a>
        <a href="programmeChoice.html">Choice of Programme</a>
        <a href="#">Uploads</a>
        <a href="#">Referee</a>
        <a href="#">Summary</a>
        <a href="#">Declaration</a>
       </div>
      </div>
      <div class="bioDataForm">
        <div class="form-instruction">
        <!-- <h3>Referees</h3> -->
        <!-- <p>All fields are required <span style="color: red;">*</span></p>  -->
      </div>
        <form action="">
            <div class="form-group">
                <div>
                <label for="">Name of Secondary School Attended</label>
               <input type="text">
               </div>

                <div>
                <label for="">Address</label>
               <input type="text">
               </div>
               
            </div>
            <div class="form-group">
                <div>
                <label for="">From</label>
               <input type="text">
               </div>

                <div>
                <label for="">To</label>
               <input type="text">
               </div>

            </div>
        </form>
      </div>
       <div class="dashboard-result">
        <div class="result-table">
        <form action="">
            <table border="1">
                <tr>
                  <!-- <th style="width:10%"></th> -->
                  <th>Sitting</th>
                  <th> Core Subjects</th>
                  <th> Electives (if available)</th>
                </tr>
                <tr>
                  <!-- <td></td> -->
                  <td><b>1st sitting</b> <br><br>
                  <p>Index Number</p>
                  <input type="number"> <br><br>
                  <p>Aggregate</p>
                  <input type="number">
                   </td>
                  <td>
                    <div class="table_form_group" >
                    <p>Aggregate</p>
                    <p>Grades</p>
                    </div>
                    <div class="table_form_group">
                    <p>Mathematics</p>
                    <input type="number">
                    </div>
                    <div class="table_form_group" >
                    <p>English</p> 
                    <input type="number">
                    </div>
                    <div class="table_form_group">
                    <p>Science</p>
                    <input type="number">
                    </div>
                  </td>
                  <td>
                    <div class="table_form_group" >
                    <p>Subjects</p>
                    <p>Grades</p>
                    </div>
                    <div class="table_form_group">
                    <input type="text">
                    <input type="number">
                    </div>
                    <div class="table_form_group" >
                    <input type="text">
                    <input type="number">
                    </div>
                    <div class="table_form_group">
                    <input type="text">
                    <input type="number">
                    </div>
                  </td>
                </tr>
        
                <tr>
                  <!-- <td></td> -->
                  <td><b>2nd sitting</b> <br><br>
                  <p>Index Number</p>
                  <input type="number"> <br><br>
                  <p>Aggregate</p>
                  <input type="number">
                   </td>
                   <td>
                    <div class="table_form_group" >
                    <p>Aggregate</p>
                    <p>Grades</p>
                    </div>
                    <div class="table_form_group">
                    <p>Mathematics</p>
                    <input type="number">
                    </div>
                    <div class="table_form_group" >
                    <p>English</p> 
                    <input type="number">
                    </div>
                    <div class="table_form_group">
                    <p>Science</p>
                    <input type="number">
                    </div>
                  </td>
                  <td>
                    <div class="table_form_group" >
                    <p>Subjects</p>
                    <p>Grades</p>
                    </div>
                    <div class="table_form_group">
                    <input type="text">
                    <input type="number">
                    </div>
                    <div class="table_form_group" >
                    <input type="text">
                    <input type="number">
                    </div>
                    <div class="table_form_group">
                    <input type="text">
                    <input type="number">
                    </div>
                  </td>
                </tr>
        
                <tr>
                  <!-- <td></td> -->
                  <td><b>3rd sitting</b> <br><br>
                  <p>Index Number</p>
                  <input type="number"> <br><br>
                  <p>Aggregate</p>
                  <input type="number">
                   </td>
                   <td>
                    <div class="table_form_group" >
                    <p>Aggregate</p>
                    <p>Grades</p>
                    </div>
                    <div class="table_form_group">
                    <p>Mathematics</p>
                    <input type="number">
                    </div>
                    <div class="table_form_group" >
                    <p>English</p> 
                    <input type="number">
                    </div>
                    <div class="table_form_group">
                    <p>Science</p>
                    <input type="number">
                    </div>
                  </td>
                  <td>
                    <div class="table_form_group" >
                    <p>Subjects</p>
                    <p>Grades</p>
                    </div>
                    <div class="table_form_group">
                    <input type="text">
                    <input type="number">
                    </div>
                    <div class="table_form_group" >
                    <input type="text">
                    <input type="number">
                    </div>
                    <div class="table_form_group">
                    <input type="text">
                    <input type="number">
                    </div>
                  </td>
                </tr>
    
              </table>
              <div class="submit-form" style="margin-top: .5rem;">
                <button type="submit" style="background-color: #dbdada;">
                    <a href="personalInfo.html" style="color: #000;">Previous</a>
                </button>
                <button type="submit"><a href="programmeChoice.html">Save and Continue</a></button>
            </div>
            </form>
        </div>
    </div>
    </div>
</div>
 
    <script src="./js/app.js"></script>
</body>
</html>