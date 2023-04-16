<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelPlanner";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("connection failed " . $connection->connect_error);
} else {
    if ($_SERVER['SCRIPT_NAME'] == '/travelPlanner/frontend/includes/database.php') {
        echo "connection was successful";
    }
}
