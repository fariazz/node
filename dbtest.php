<?php

$host = 'qrland.mysql.ukraine.com.ua'; 
$user = 'qrland_track'; 
$pass = 'yc4v9vuu'; 
$db = 'qrland_track'; 

$link = mysql_connect($host, $user, $pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully<hr />';

$result = mysql_query("use $db");
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
else {
    
    echo 'connected to db - OK'; 
}

mysql_close($link); 

?>