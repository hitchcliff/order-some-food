<?php

class Login
{
  // db stuff
  private $conn;

  // Login Properties
  public $username;
  public $password;

  public function __construct($db)
  {

    $this->conn = $db;
  }

  public function read()
  {
    // SQL Query
    $query = 'SELECT * FROM tbl_admin
    WHERE 
      username = :username 
      AND 
      password = :password
    ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean Data
    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->password = htmlspecialchars(strip_tags($this->password));

    // Bind Data
    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':password', $this->password);

    // Execute query
    $stmt->execute();

    return $stmt;
  }
}