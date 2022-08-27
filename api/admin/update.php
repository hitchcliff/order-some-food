<?php
include '../config/Global.php';
include '../config/Database.php';
include '../models/Admin.php';

// Starts the session
session_start();

// Instantiate DB
$database = new Database();
$db = $database->connect();

// Instantitate Admin
$admin = new Admin($db);

// Check if there is an ID
if (isset($_POST['update-admin-submit'])) {
  $id = $_POST['id'];
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];

  $admin->id = $id;
  $admin->full_name = $full_name;
  $admin->username = $username;

  echo $id . $full_name . $username;

  // Perform validation
  if (!$id || !$full_name || !$username) {
    $_SESSION['update'] = '<span class="error">Admin is not updated</span>';

    // Redirect the user but set back the user
    return  header("location:" . MANAGE_UPDATE_ADMIN_URL . "?id=" . $id);
  }

  if ($admin->update()) {
    $_SESSION['update'] = '<span class="success">Admin is updated</span>';

    // Redirect the user
    header("location:" . MANAGE_ADMIN_URL);
  } else {
    $_SESSION['update'] = '<span class="error">Admin is not updated</span>';

    // Redirect the user
    header("location:" . MANAGE_UPDATE_ADMIN_URL);
  }
}