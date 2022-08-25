<?php
include_once 'config/Database.php';
include_once 'models/Admin.php';
include_once 'admin/create.php';
include_once 'admin/read.php';

// Start session
session_start();

// Global Variables
define('SITEURL', 'http://localhost/order-some-food/');

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();