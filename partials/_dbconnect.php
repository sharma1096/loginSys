<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login_system';

$connection = mysqli_connect($server, $username, $password, $dbname);

if (!$connection) {
    die('Error' . mysqli_error());
}
?>