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

  public function read()
  {
    $query = 'SELECT * from tbl_admin 
    ORDER BY id ASC
    ';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function update()
  {
    $query = 'UPDATE tbl_admin
    SET
      full_name = :full_name, 
      username = :username
    WHERE
      id = :id
    ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean Data
    $this->id = htmlspecialchars(strip_tags($this->id));
    $this->full_name = htmlspecialchars(strip_tags($this->full_name));
    $this->username = htmlspecialchars(strip_tags($this->username));

    // Bind params
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":full_name", $this->full_name);
    $stmt->bindParam(":username", $this->username);

    // Execute
    if ($stmt->execute()) {
      return true;
    }

    echo $stmt->execute();

    // Print error something goes wrong
    printf('Error: ', $stmt->error);

    return false;
  }

  public function delete()
  {
    $query = 'DELETE from tbl_admin
    WHERE id = :id
    ';


    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind data
    $stmt->bindParam(":id", $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    };

    // Print error something goes wrong
    printf('Error: ', $stmt->error);

    return false;
  }
}