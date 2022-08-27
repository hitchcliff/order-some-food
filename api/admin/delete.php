<?php
include '../config/Global.php';
include '../config/Database.php';
include '../models/Admin.php';

// Starts the session
session_start();

// Instantiate Database
$database = new Database();
$db = $database->connect();

// Instantiate Admin
$admin = new Admin($db);

if (isset($_GET['id'])) {

  // Set data
  $admin->id = $_GET['id'];

  // Delete admin
  $admin->delete();

  $_SESSION['delete'] = '<span class="success">Admin Deleted Successfully</span>';

  // Redirect user back to manage-admin.php
  header("location:" . MANAGE_ADMIN_URL);
} else {

  $_SESSION['delete'] = '<span class="error">Admin not deleted</span>';

  // Redirect user back to manage-admin.php
  header("location:" . DELETE_ADMIN_URL);
}