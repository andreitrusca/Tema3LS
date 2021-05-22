<?php
   session_id("mainID");
   session_start();

   $conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
   mysqli_select_db($conn, "tema3");

   $sql_read = "SELECT * FROM conturi";

   $result = mysqli_query($conn, $sql_read);
   if(! $result )
   {
     die('Could not read data: ' . mysqli_error());
   }

?>

<html>

   <head>
      <title>Login</title>
   </head>

   <body>

      <h2>Login form</h2>

         <?php
            $msg = '';

            while($row = mysqli_fetch_array($result)) {
            $user = $row['user'];
          	$password = $row['password'];
            $isAdmin = $row['isAdmin'];

            if (isset($_POST['login']) && !empty($_POST['username'])
               && !empty($_POST['password'])) {

               if ($_POST['username'] == $user &&
                  $_POST['password'] == $password ) {
				  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $user;
                  $_SESSION['isAdmin'] = $isAdmin;
                  header('Location: home.php');
               }else {
                  echo 'Wrong username or password';
               }
            }
          }
         ?>
      </div>

      <div>

         <form  method = "post">
            <input type = "text" name = "username"> </br>
            <input type = "password" name = "password" required> <br>
            <button type = "submit" name = "login">Login</button>
         </form>

      </div>

   </body>
</html>
