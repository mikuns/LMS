<?php

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_db = "libraryms";
$conn_error = "Connection Not Successful";


$link = mysqli_connect($mysql_host,$mysql_user,$mysql_pass, $mysql_db);

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/*if(@!$link){
    die($conn_error);
}*/

