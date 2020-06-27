  <?php
    include "connection.php";
    include "navbar.php";
   ?>

<!DOCTYPE html>
<html>
<head>
	<title>STUDENT_LOGIN </title>
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
    <div class="reg_img">
      <br>
      <div class="box2">
            
            <h1 style="text-align: center;font-size: 35px;font-family: Lucida Console;color: white; "> Library management system</h1>
            <h1 style="text-align: center;font-size: 25px;color: white;">Registration Form</h1><br>
            <form name="Registration" method="post" action="">
              <div class="login">
              <input class="form-control"  type="text" name="first"  placeholder="First Name" required="" ><br>
              <input class="form-control" type="text" name="last"  placeholder="Last Name" required="" ><br>
              <input class="form-control"  type="text" name="username"  placeholder="username" required="" ><br>
              <input class="form-control"  type="password" name="password" placeholder="password" required=""><br>
             
              <input class="form-control" type="text" name="contact"  placeholder=" Contact No" required="" ><br>
              <input class="form-control" type="text" name="email" placeholder="Email" required="" ><br>
                             <input class="btn btn-primary" type="submit" name="submit" value="Sign Up" style="color: red; width: 60px; height: 30px">
                      </div>
            </form> 

        </div>
    </div>


  </section>


   <?php
     
     if (isset($_POST['submit']))
     {

       $count=0;
       $sql = "SELECT username from admin";
       $res = mysqli_query($db,$sql);

       while($row= mysqli_fetch_assoc($res))
       {
         if($row['username'] ==$_POST['username'])
         {
          $count=$count+1;
         }

       }
       if($count==0)
       {
       mysqli_query($db,"INSERT INTO admin VALUES ('', '$_POST[first]',

       '$_POST[last]', '$_POST[username]', '$_POST[password]',  '$_POST[contact]', '$_POST[email]', 'd.png');");
    
    ?>
    <script type="text/javascript">
      
         alert ("Registration Successful");

    </script>

    <?php            
      }
        else
        {
           
           ?>
           <script type="text/javascript">
             alert("The username already exit.");
           </script>

           <?php

        }
        
        }

     ?>


   


</body>
</html>