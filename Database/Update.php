<?php

require_once 'Database.php';

// Class to Perform Update operations.
class Update extends Database {

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
   * @param string $task
   *   New task.
   * @param integer $task_id
   *   Task's id which will be updated
   */
  public function updateTodo(string $task, int $task_id) {
    $sql_update = $this->getConnection()->prepare("UPDATE todo SET task = ?
    WHERE task_id = ?");
    $sql_update->execute([$task, $task_id]);
  }
}
