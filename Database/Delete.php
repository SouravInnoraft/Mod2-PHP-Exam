<?php

require_once 'Database.php';

// Class to Perform delete operations.
class Delete extends Database {

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
   * Function to update todo data.
   *
   * @param integer $task_id
   *   Task's id which will be updated
   */
  public function deleteTodo(int $task_id) {
    $sql_update = $this->getConnection()->prepare("DELETE FROM todo
    WHERE task_id = ?");
    $sql_update->execute([$task_id]);
  }
}
