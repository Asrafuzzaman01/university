<!DOCTYPE html>
<html>

           <head>
	            <title> University </title>


	           <link href="css/w2.css"  rel="stylesheet">
	           <script type="text/javascript" src="js/main.js"> </script>
	         
             </head>

	       <body>
        
			 <?php include("common/connection.php"); ?>


             <?php


?>
	       	<h1> University Website </h1>
	       	    <div class="A">
	       	    	<ul>
       	    		   <li  ><a href="index.php"> Home   </a></li> 
       	    		   <li><a href="admission.php">Addmision</a></li>
       	    		   <li><a href="Notice.php"> Notice</a></li>
       	    		   <li> <a href="gallery.php"> Gallary</a></li>
       	    		    <li>societise</li>
       	    		    <li> <a href="result.php">Result</a></li>
	       	    	    <li  > <a href="https://www.w3schools.in" target="_blank">w3school</a></li>
	       	    	    <li><a href="teacher.php">teacher</a></li>
	       	    	    	
	       	    	    		<?php if (isset($_SESSION['username'])) { ?>
	       	    	    			<li>Hi&nbsp;&nbsp;<?php echo $_SESSION['username']; ?></li>
	       	    	    			<li><a href="logout.php">Logout </a></li>
	       	    	    		    <li><a href="myprofile.php">Myprofile</a></li>


	       	    	    		<?php
}
else { ?>
	       	    	    		<li><a href="login.php">Login</a></li>
	       	    	    	<?php
}?>
	       	    	    	
	       	    	    	<li><a href="staff.php">staff</a></li>

	       	    		     	

                     </ul>


	       	         </div>
	       	       
