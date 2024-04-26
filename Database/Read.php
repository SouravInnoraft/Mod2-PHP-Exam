<?php

require_once 'Database.php';

// Class to Perform read operations.
class Read extends Database {

  /**
   * Constructor function to initialise objects at the time of creation.
   *
   * @param string $username
   *   Database's username.
   * @param string $dbpassword
   *   Databse password.
   * @param string $dbname
   *   Database name.
   */
  public function __construct(string $username, string $dbpassword, string $dbname) {
    parent::__construct($username, $dbpassword, $dbname);
  }

  /**
   * Function to fetch todos.
   *
   * @return array|null
   *   Returns array on success and null on failure.
   */
  public function fetchData(): array {
    $sql_select = $this->getConnection()->prepare("SELECT * from todo");
    $sql_select->execute();
    $rows = $sql_select->fetchAll(PDO::FETCH_ASSOC);
    if (!count($rows)) {
      return null;
    }
    else {
      return $rows;
    }
  }
}
