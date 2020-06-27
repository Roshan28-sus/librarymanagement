<?php

  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>ShankerDev Library Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width, initial sacle=1">
	<style type="text/css">
		nav
{
    float:right; 
    word-spacing:30px;

    padding: 20px;
}
nav li
{
    display: inline-block;
    line-height: 55px;
}


	</style>
</head>
<body>
	<div class="wrapper">

           <header>
            <div class="logo">
           	<img src="images/9.png">
           	<h1 style="color: white">SHANKERDEV LIBRARY MANAGEMENT SYSTEM</h1></div>

                <?php
                     if(isset($_SESSION['login_user']))
                     { ?>
                        <nav>
               	            <ul>
               	     	        <li><a href="index.php">HOME</a></li>
               	     	         <li><a href="books.php">BOOKS</a></li>
               	     	         <li><a href="logout.php">LOGOUT</a></li>	
               	     	
               	     	        <li><a href="feedback.php">FEEDBACK</a></li>	
               	           </ul>
                 	   </nav>
                 	<?php
                     }

                     else

                  {  ?>
                     	<nav>
               	             <ul>
               	     	             <li><a href="index.php">HOME</a></li>
               	     	             <li><a href="books.php">BOOKS</a></li>
               	     	             <li><a href="student_login.php">STUDENT-LOGIN</a></li>	
               	     	
               	     	             <li><a href="feedback.php">FEEDBACK</a></li>	
               	             </ul>
                    	</nav>


                     <?php
                 }
                  

                ?>


               
	      </header>
                
	      <section>
	      	<div class="sec_img">
	      	<br><br><br>
	      	<div class="box">
	      		<br><br><br><br>
	      		<h1 style="text-align:center; font-size:35px;">Welcome to Library</h1><br><br>
	      		<h1 style="text-align:center; font-size:20px;">Opens at: 09:00 </h1><br>
	      		<h1 style="text-align:center; font-size:20px;">Closes at: 05:00 </h1><br>
	      		
	      	</div>
		
		
           </div>

	      </section>

	      
</div>
<?php

   include "footer.php";
?>

</body>
</html>