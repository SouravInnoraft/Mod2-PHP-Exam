<?php

require_once 'Database.php';

/**
 * Class for Inserting Data into Database.
 */
class Insertion extends Database {

  /**
   * Constructor function to initialise objects of the class.
   *
   * @param string $username
   * User's name.
   * @param string $password
   * Database password.
   * @param string $dbname
   * Database name.
   */
  public function __construct(string $username, string $dbpassword,
  string $dbname) {
    parent::__construct($username, $dbpassword, $dbname);
  }

  /**
   * Function to insert todo data into the database.
   *
   * @param string $task
   *   Task that is added in the list.
   */
  public function insertTodoData(string $task) {
    $sql_insert = $this->getConnection()->prepare("INSERT INTO todo
    (task) values (?)");
    $sql_insert->execute([$task]);
  }
}
