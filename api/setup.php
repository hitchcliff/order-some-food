<?php
include_once 'config/Global.php';
include_once 'config/Database.php';
include_once 'models/Admin.php';
include_once 'admin/read.php';

// Start session
session_start();

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();