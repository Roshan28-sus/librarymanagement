<?php

include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		
		.search
		{

			padding-left: 800px;
		}
    .form-control
    {
      width: 300px;
      height: 40px;
      background-color: black;
      color: white;
    }
body 
{
  background-image: url("images/adminbook.jpg");
  background-repeat: no-repeat;
  color: red;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}

.h:hover
{
   color:white;
   width: 300px;
   height:50px;
   background-color: blue;
}		

.container
{
  height:500px;
  background-color: black;
  opacity: .8;
  color: white;
}

.Approve
{
   margin-left: 420px;
}
	</style>


</head>
<body>

	            <!------------------------------------sidenav------------------------------------------------------->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <div style="color:white; margin-left: 60px;font-size: 20px;">
                <?php
                   if(isset($_SESSION['login_user']))
                   {
                    echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic'] ."'>";
                    echo "</br></br>";
                    echo " Welcome ". $_SESSION['login_user'];
                   }
                ?>
            </div><br>
<div class="h">  <a href="books.php"> Books</a> </div>
<div class="h"> <a href="request.php">Books request</a></div>
<div class="h"> <a href="issue_info.php">Issue Information</a></div>
</div>



<div id="main">
 
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

<div class="container">

 <br> <h2 style="text-align: center;">Approve Request</h2><br><br>

  <form class="Approve" method="post" action="">
    <input  class="form-control" type="text" name="approve" placeholder="Yes Or No" required=""><br>
    <input class="form-control" type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required=""><br>
    <input class="form-control" type="text" name="expire" placeholder="Expire Date yyyy-mm-dd" required=""><br>
    <button class="btn btn-default" type="submit" name="submit">Approve</button>
      </form>
  </div>
</div>
<?php
       if(isset($_POST['submit']))
       {
        mysqli_query($db,"UPDATE `issue_book` SET `approve`='$_POST[approve]',`issue`='$_POST[issue]',`expire`='$_POST[expire]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");

        mysqli_query($db,"UPDATE books SET quantity = quantity-1 WHERE bid='$_SESSION[bid]';");

        $res=mysqli_query($db,"SELECT qunatity FROM books WHERE bid='$_SESSION[bid]' ;");

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['qunatity']==0)
          {
            console.log("hello");
            mysqli_query($db,"UPDATE books SET status='not-available' WHERE bid='$_SESSION[bid]';");
          }
        }
        ?>
        <script type="text/javascript">
          alert("Approved Successfully.");
          window.location="request.php";
        </script>
        <?php
        
       }

?>
</body>
</html>