<?php
/*Databe Credential.
IMPORTANT!
*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo_employee');
//Attempt to connect  to MySQL Database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//Check connectio
if($link == false){
    die("ERROR: Could not Connect!" . mysqli_connect_error());
}
else {
    echo "Connected!";
}
?>