<?php
require_once '../config/config_db.php';
$con = new mysqli(IP, USER, PASSWORD, DATABASE);
mysqli_query($con, "SET NAMES 'UTF8'");
$bd = mysqli_select_db($con, DATABASE) or die("Problemas al conectar la base de datos");
