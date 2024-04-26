<?php

require_once __DIR__ . '/Database/Insertion.php';
require_once __DIR__ . '/Database/Read.php';
require_once __DIR__ . '/Database/Update.php';
require_once __DIR__ . '/Database/Delete.php';
require_once './Core/Dotenv.php';
require_once __DIR__ . '/vendor/autoload.php';

// Creating object of Dotenv class.
$env = new Dotenv();

/**
 * Class for controlling all controller actions.
 */
class ActionController {

  private $delete;
  private $select;
  private $insert;
  private $update;

  /**
   * Constructor function to initialise variables and objects.
   */
  public function __construct() {


    // Creating object of Read class.
    $this->select = new Read($_ENV['username'], $_ENV['dbpassword'], $_ENV['dbname']);

    // Creating object of Insertion class.
    $this->insert = new Insertion($_ENV['username'], $_ENV['dbpassword'], $_ENV['dbname']);

    // Creating object of Update class.
    $this->update = new Update($_ENV['username'], $_ENV['dbpassword'], $_ENV['dbname']);

    // Creating object of Delete class.
    $this->delete= new Delete($_ENV['username'], $_ENV['dbpassword'], $_ENV['dbname']);
  }


   /**
   * Function to insert todo data into the database.
   *
   * @param string $task
   *   User provided task.
   */
  public function insertTodoData(string $task) {
    $this->insert->insertTodoData($task);
  }

  /**
   * Function to fetch todo data.
   *
   * @return array|null
   *   Returns array on success and null on failure.
   */
  public function fetchData(): array {
   return $rows=$this->select->fetchData();
  }

  /**
   * Function to update todo data.
   *
   * @param string $task
   *   Task to be updated.
   * @param integer $task_id
   *   Task's id which will be updated
   */
  public function updateTodo(string $task, int $task_id) {
    $this->update->updateTodo($task, $task_id);
  }

 /**
   * Function to delete todo data.
   *
   * @param integer $task_id
   *   Task's id which will be updated
   */
  public function deleteTodo(int $task_id) {
    $this->delete->deleteTodo($task_id);
  }
}
