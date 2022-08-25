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

    $queryUsername = 'SELECT * from tbl_admin
    WHERE 
      username = :username
    ';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $stmtUsername = $this->conn->prepare($queryUsername);

    // Clean Data
    $this->full_name = htmlspecialchars(strip_tags($this->full_name));
    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->password = htmlspecialchars(strip_tags($this->password));

    // Validation
    if (strlen($this->full_name) <= 0 || strlen($this->username) <= 0 || strlen($this->password) <= 0) {
      return false;
    }

    // Bind data
    $stmt->bindParam(':full_name', $this->full_name);
    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':password', $this->password);

    $stmtUsername->bindParam(":username", $this->username);

    // Execute query
    $executeUsername = $stmtUsername->execute();
    if (strlen($executeUsername) >= 1) { // username exists
      // return false;
    }

    echo $executeUsername;

    if ($stmt->execute()) { // Add query to DB
      return true;
    }

    // Print error something goes wrong
    printf('Error: ', $stmt->error);

    return false;
  }
}