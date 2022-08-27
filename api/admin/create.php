<?php
include '../config/Global.php';
include '../config/Database.php';
include '../models/Admin.php';

// Starts the session
session_start();

// Instantiate Database
$database = new Database();
$db = $database->connect();

// Instantiate Admin Object
$admin = new Admin($db);

if (!isset($_POST['add-admin-submit']))  return;

// Set data
$admin->full_name =  $_POST['full_name'];
$admin->username = $_POST['username'];
$admin->password = md5($_POST['password']);

// Create
if ($admin->create()) {
  // Add session
  $_SESSION['add'] = "<span class='success'>Admin Added Successfully</span>";

  // Redirect
  header("location:" . SITEURL . "admin/manage-admin.php");
} else {
  // Add session
  $_SESSION['add'] = "<span class='error'>Failed to Add Admin</span>";

  // Redirect
  header("location:" . SITEURL . "admin/add-admin.php");
}