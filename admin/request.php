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
  <div class="search">
    <form method="post" action="" name=form1>
      <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
      <input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
      <button class="btn btn-danger" name="submit" type="submit">Submit</button><br>
      
    </form>
</div>
  <h3 style="text-align: center;"> <i>Request of Book</i></h3>
<?php
   if(isset($_SESSION['login_user']))
   {
      $sql="SELECT student.username,roll,books.bid,name,authors,edition,status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =''";
      
      $res=mysqli_query($db,$sql);
   

   if(mysqli_num_rows($res)==0)
          {
            echo "<br><h2><b>";
            echo "There is no pending request.";
            echo "</br></h2></b>";
          }

          else
          {
              echo "<table class='table table-bordered ' >";
      echo "<tr style='background-color: #8787f5;'>";
        //Table header
        echo "<th>"; echo " username";  echo "</th>";
        echo "<th>"; echo " Roll No";  echo "</th>";
        echo "<th>"; echo "Book ID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Book Status";  echo "</th>";
        
      echo "</tr>";

      while ($row=mysqli_fetch_assoc($res)) 
        
      

      {
        echo "<tr>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['roll']; echo "</td>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        

        echo "</tr>";
      }
    echo "</table>" ;
  }
}

  else
  {
        

    ?>
    <br>
    <h4 style="text-align: center; color: yellow">You Need to Login First to see the Request.</h4>
    
    <?php
  }
  
  
     if(isset($_POST['submit']))
     {
        $_SESSION['name']=$_SESSION['username'];
        $_SESSION['bid'] = $_SESSION['bid'];

        ?>
        <script type="text/javascript">
          window.location="approve.php";
        </script>
        <?php
     }
  
    ?>
    </div>
</div>
</body>
</html>