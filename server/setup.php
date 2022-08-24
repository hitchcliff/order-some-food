<?php
include_once 'config/Database.php';
include_once 'models/Admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();