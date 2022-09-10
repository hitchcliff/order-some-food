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

// Perform Redirection in `Admin` if User is Logged
// Prevents too many redirection
// Serves as middleware
$request_uri = $_SERVER['REQUEST_URI'];
if (strpos($request_uri, 'login.php')) { // check if we're at login page
	if (isset($_COOKIE['user'])) {
		header("location:" . ADMIN_PAGE_URL);
	}
} else {
	if (!isset($_COOKIE['user'])) { // check if we're not at login page
		header("location:" . LOGIN_PAGE_URL);
	}
}