<?php
define('DB_SERVER','172.19.0.2');
// define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_NAME','crud_app');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(!$conn){
   die('Could not Connect MySql Server:' .mysqli_connect_error());
 }
?> 