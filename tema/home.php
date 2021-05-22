<?php

session_start();

if ( isset( $_SESSION['username'] ) ) {
  echo 'Bun venit ' . $_SESSION['username'];
} else {
    header('Location: home.php');
}


$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "tema3");

$sql_read = "SELECT * FROM coord";

$result = mysqli_query($conn, $sql_read);
if(! $result )
{
  die('Could not read data: ' . mysqli_error());
}

echo "<table border='1'>

<tr>
<th>Id</th>
<th>Nume</th>
<th>Latitudine</th>
<th>Longitudine</th>
<th>Dimensiune</th>
<th>Culoare</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
	$id = $row['ID'];
  $nume = $row['Nume'];
	$lat = $row['Latitudine'];
	$long = $row['Longitudine'];
  $dim = $row['Dimensiune'];
  $color = $row['Culoare'];
  echo "<tr>";
	echo "<td>" .  $id . "</td>";
  echo "<td>" .  $nume . "</td>";
  echo "<td>" .  $lat . "</td>";
  echo "<td>" .  $long . "</td>";
  echo "<td>" .  $dim . "</td>";
  echo "<td>" .  $color . "</td>";
  echo "</tr>";
}

	 echo ' <br> Click here to <a href = "logout.php" tite = "Logout">logout</a>.
   <br> Apasa pentru a vizualiza <a href = "map.php" tite = "Harta">harta</a>.';

   if($_SESSION['isAdmin'] == 1)
   {
     echo ' <br><br>
     <form  method = "post">
        Nume <input type = "text" name = "Nume" required> </br>
        Latitudine <input type = "text" name = "Latitudine" required> <br>
        Longitudine <input type = "text" name = "Longitudine" required> <br>
        Dimensiune <input type = "text" name = "Dimensiune" required> <br>
        Culoare: <br>
        Verde<input type = "radio" name = "Culoare"  value = "green" required>
        Rosu<input type = "radio" name = "Culoare"  value = "red" required>
        Albastru<input type = "radio" name = "Culoare"  value = "blue" required>
        Galben<input type = "radio" name = "Culoare"  value = "yellow" required>
        Roz<input type = "radio" name = "Culoare"  value = "pink" required>
        Negru<input type = "radio" name = "Culoare"  value = "black" required> <br><br>
        <input type = "submit" name = "Submit">
     </form>

      <br><br>';

      if (isset($_POST['Submit'])
      //  && !empty($_POST['Nume'])
       //  && !empty($_POST['Latitudine'])
        //  && !empty($_POST['Longitudone'])
         //  && !empty($_POST['Dimensiune'])
          //  && isset($_POST['Culoare'])
         ) {

         $nume = $_POST['Nume'];
         $lat = $_POST['Latitudine'];
         $long = $_POST['Longitudine'];
         $dim = $_POST['Dimensiune'];
         $color = $_POST['Culoare'];


         $sql_insert="INSERT INTO coord (Nume, Latitudine, Longitudine,Dimensiune, Culoare) VALUES (
		 '$nume' ,
		 '$lat', 
		 '$long' ,
		 '$dim' ,
		 '$color')";

         $retval = mysqli_query($conn, $sql_insert);
         if(! $retval )
         {
           die('Could not insert data: ' . mysqli_error());
         }
		  
		 header('Location: home.php');

         }


   }
?>
