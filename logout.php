<?php
require_once './includes/database.php';
$_SESSION['user'] = '';
$_SESSION['admin'] = '';
session_destroy();
header("Location: http://localhost/travelPlanner/login.php");
