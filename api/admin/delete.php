<?php
include '../config/Global.php';
include '../config/Database.php';
include '../models/Admin.php';

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

  // Redirect user back to manage-admin.php
  header("location:" . MANAGE_ADMIN_URL);
}