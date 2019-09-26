<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'imails';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

