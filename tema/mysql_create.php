<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "tema3");

$sql_create = "CREATE TABLE coord
(
ID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(ID),
Nume varchar(20),
Latitudine varchar(20),
Longitudine varchar(20),
Dimensiune varchar(20),
Culoare text(20)
)
";

$retval = mysqli_query($conn, $sql_create);
if(! $retval )
{
  die('Could not create table: '. mysqli_error());
}
echo "Table created successfully\n";


?>
