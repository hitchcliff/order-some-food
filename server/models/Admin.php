<?php

class Admin
{
  // db stuff
  private $conn;

  // Admin properties
  public $id;
  public $full_name;
  public $username;
  public $password;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function create()
  {
    $query = 'INSERT INTO tbl_admin
    SET
      full_name = :full_name,
      username = :username,
      password = :password
    ';

    // Prepare statment
    $stmt = $this->conn->prepare($query);

    // Clean Data
    $this->full_name = htmlspecialchars(strip_tags($this->full_name));
    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->password = htmlspecialchars(strip_tags($this->password));

    // Bind data
    $stmt->bindParam(':full_name', $this->full_name);
    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':password', $this->password);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error something goes wrong
    printf('Error: ', $stmt->error);

    return false;
  }
}