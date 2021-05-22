<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "tema3");

$sql_insert="INSERT INTO conturi (user, password, isAdmin) VALUES ('admin', 'admin', '1')";

$retval = mysqli_query($conn, $sql_insert);
if(! $retval )
{
  die('Could not insert data: ' . mysqli_error());
}
echo "Data inserted successfully\n";

?>
