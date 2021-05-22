<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "tema3");

$sql_create = "CREATE TABLE conturi
(
user varchar(20),
password varchar(20),
isAdmin boolean
)
";

$retval = mysqli_query($conn, $sql_create);
if(! $retval )
{
  die('Could not create table: ' . mysqli_error());
}
echo "Table created successfully\n";


?>
