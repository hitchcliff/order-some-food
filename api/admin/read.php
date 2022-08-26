<?php

/**
 * Object function that reads data from DB
 */
class ReadAdmin
{
  public $db;

  public function __construct($db)
  {
    $this->db = $db;
    return $this->start($db);
  }


  public function start()
  {
    // Instantiate admin object
    $admin = new Admin($this->db);
    // Admin query
    $result = $admin->read();
    // Get row count
    $num = $result->rowCount();

    // Admin array
    $admins_arr = array();
    $admins_arr['data'] = array();

    // Check if there are results
    if ($num > 0) {

      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $admin_item = array(
          'id' => $id,
          'full_name' => $full_name,
          'username' => $username
        );

        // Push admin item
        array_push($admins_arr['data'], $admin_item);
      }
    }

    return $admins_arr;
  }
}