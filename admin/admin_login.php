
<?php
   include "connection.php";
   include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN_LOGIN </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width, initial sacle=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
	section
	{
		margin-top:-20px;
	}
</style>

</head>
<body>
	<section>
		<div class="log_img">
			<br>
			<div class="box1">
	      		
	      		<h1 style="text-align: center;font-size: 35px;font-family: Lucida Console;color: white; "> Library management system</h1>
	      		<h1 style="text-align: center;font-size: 25px;color: white;">Users Login Form</h1>
	      		<form name="login" method="post" action="">
	      			<div class="login">
	      			<input class="form-control"  type="text" name="adminname" placeholder="adminname"  required="" ><br>
	      			<input class="form-control" type="password" name="password" placeholder="password"  required=""><br>
	      			 <input class="btn btn-primary" type="submit" name="submit" value="Login" style="color: red; width: 60px; height: 30px">
                      </div>
	      		</form>	

	      		<p style="padding-left: 15px;color: white;">
	      			<br><br>
	      			<a style="color: white;"   href="update_password.php">Forget password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
	      			new to the website?<a style="color: white" href="registration.php "> SingUp</a>
	      		</p>
	      	</div>
		</div>


	</section>


	<?php

       if(isset($_POST['submit']))
       {
            $count=0;
            $res=mysqli_query($db,"SELECT * FROM `admin` WHERE adminname ='$_POST[adminname]' && password ='$_POST[password]';");

            $row=mysqli_fetch_assoc($res);

            $count=mysqli_num_rows($res);

            if($count==0)
            {
               
               ?>
               <!--
               <script type="text/javascript">
               	
               	alert("The username and password doesn't  match.");
               </script>
                  -->

                  <div class="alert alert-danger"; style="width:600px; margin-left:400px; background-color: #f10b0b; color: white">
                       
                     <strong>The username and password doesn't  match.</strong>
                  </div>

               <?php
                }

                else
                {
                  /*-----------if username and password matches-------*/

                	$_SESSION['login_user'] = $_POST['adminname'];
                  $_SESSION['pic'] = $row['pic'];
                    ?>

                    <script type="text/javascript">
                    	window.location="index.php";
                    </script>

                    <?php

                }

       }




	?>

</body>
</html>