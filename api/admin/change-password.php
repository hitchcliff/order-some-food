<?php
include '../config/Global.php';
include '../config/Database.php';
include '../models/Admin.php';

// Starts the session
session_start();

// Instantiate DB
$database = new Database();
$db = $database->connect();

// Instantiate Admin
$admin = new Admin($db);

if (!isset($_POST['update-admin-password-submit'])) return;

// Form data
$id = $_POST['id']; // ID 
$old_password = $_POST['old_password']; // old password
$new_password = $_POST['new_password']; // new password


// Perform validation
if (!$id || !$old_password || !$new_password) {
  $_SESSION['update_password'] = '<span class="error">Password is not updated</span>';

  // Redirect the user but set back the user
  return header("location:" . UPDATE_PASSWORD_ADMIN_URL . "?id=" . $id);
}

// Set Admin properties
$admin->id = $id;
$admin->old_password = md5($old_password);
$admin->password = md5($new_password);

// Check if user exists
if (!$admin->is_exists()) {
  $_SESSION['update-password'] = '<span class="error">User does not exist</span>';

  return header("location:" . MANAGE_ADMIN_URL);
}

if ($admin->update_password()) {
  $_SESSION['update-password'] = '<span class="success">Password is updated</span>';

  return header("location:" . MANAGE_ADMIN_URL);
} else {
  $_SESSION['update-password'] = '<span class="error">Password is not updated</span>';

  return header("location:" . MANAGE_ADMIN_URL);
}