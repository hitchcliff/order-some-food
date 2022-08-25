<?php

/**
 * Object function that Creates an Admin
 */
class CreateAdmin
{
  public function __construct($db)
  {

    return $this->start($db);
  }

  private function start($db)
  {
    // Instantiate Admin Object
    $admin = new Admin($db);

    // Set data
    $admin->full_name =  $_POST['full_name'];
    $admin->username = $_POST['username'];
    $admin->password = md5($_POST['password']);

    // Create
    if ($admin->create()) {
      // Add session
      $_SESSION['add'] = "Admin Added Successfully";

      // Redirect
      header("location:" . SITEURL . "admin/manage-admin.php");
    } else {
      // Add session
      $_SESSION['add'] = "Failed to Add Admin";

      // Redirect
      header("location:" . SITEURL . "admin/add-admin.php");
    }
  }
}