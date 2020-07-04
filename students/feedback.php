<?php

include "navbar.php";
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width, initial sacle=1">
   
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
	body
	{
		background-image: url("images/30.webp");
	}

	.wrapper
	{
		padding :10px;
		margin :-20px auto;
		width: 900px;
		height :605px;
		background-color: black;
		opacity: .7;
		color : white;
	}

	.form-control
	{
		width: 60%;
		height:80px;
	}

	.scroll
	{
	   width:100%;
       height:300px;
       overflow: auto;

	}
</style>
</head>
<body>
	<div class="wrapper">
	<h4>If you have any suggestion and questions please  comment below</h4>
     
     <form style="" action="" method="post">
     	<input class="form-control" type="text" name="comment" placeholder="write someting...."><br>
     	<input class="btn btn-default" type="submit" name="submit" value="comment" style="width:100px ; height: 30px">
     </form>


<br>
<div class="scroll">
	
	<?php
        
        if(isset($_POST['submit']))
        {

        	$sql = "INSERT INTO comments VALUES ('','$_POST[comment]');";
        	 if(mysqli_query($db,$sql))
        	 {
        	 	$q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC ";
        	 	$res = mysqli_query($db,$q);

        	 	echo "<table class='table table-bordered'>";

        	 	while($row=mysqli_fetch_assoc($res))

        	 	{
        	 		echo "<tr>";

        	 		echo "<td>"; echo $row['comments'];  echo "</td>";
                                
                              

        	 		echo "</tr>";

        	 	}
        	 }
        }

        else
          
        {
           $q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC ";
        	 	$res = mysqli_query($db,$q);

        	 	echo "<table class='table table-bordered'>";

        	 	while($row=mysqli_fetch_assoc($res))

        	 	{
        	 		echo "<tr>";

        	 		echo "<td>"; echo $row['comments'];  echo "</td>";
                                echo "</tr>";
                }
        }

	?>
       </div>
    </div>      
</body>
</html>