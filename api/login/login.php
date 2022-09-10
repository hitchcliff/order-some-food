<?php
include '../config/Global.php';
include '../config/Database.php';
include '../models/Login.php';

// Starts the Session
session_start();

// Instantiate Database
$database = new Database();
$db = $database->connect();

// Instanstiate Login Object
$login = new Login($db);

// Check if Form submitted
if (!isset($_POST['login-submit'])) return;

// Get Data then Set
$login->username = $_POST['username'];
$login->password = md5($_POST['password']);

// Call the Login class
$result = $login->read();

$count = $result->rowCount();

// There is an Admin
if ($count == 1) {
  // Set cookie
  $user = serialize($result->fetch());
  setcookie('user', $user, time() + (86400 * 30), "/"); // expires after 30days;

  $_SESSION['login'] = "<span class='success'>Login Successfully</span>";

  header('location:' . ADMIN_PAGE_URL);
} else {
  $_SESSION['login'] = "<span class='error'>Error logging in</span>";

  header('location:' . LOGIN_PAGE_URL);
}