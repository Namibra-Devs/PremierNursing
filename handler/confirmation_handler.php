<?php
session_start();   
include("../db/conn.php"); 
 
if(isset($_POST['login_button'])) {
	$username = trim($_POST['serial_no']);
	$password = trim($_POST['pin']);
	
				
	                $sq="SELECT * FROM Declared  WHERE Serial='$username' && Pin='$password'";
                   $resul=mysqli_query($db,$sq);                    
                         if($row=mysqli_num_rows($resul)!=0)
                         {                             	
							setcookie("pin",$password,time()+(60*60*24*7));
							setcookie("serial",$username,time()+(60*60*24*7), '/');
		                          echo"member";								   		  
						 }
				 else{
		            
		                $sql="SELECT * FROM Applicants  WHERE Serial='$username' && Pin='$password'";
                         $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                             	
                              	 		  
								 setcookie("pin",$password,time()+(60*60*24*7), '/');
                                 setcookie("serial",$username,time()+(60*60*24*7), '/');
		                           echo "ok";								   		  
						 }
  
	                else {				
		                     echo "Wrong serial number or pin. Try again!"; // wrong details 
	                     }		
                    }                     
}


 	
?>