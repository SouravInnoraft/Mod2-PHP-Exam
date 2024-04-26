<?php

require_once __DIR__ . '/ActionController.php';

// Creating object of ActionController class.
$action = new ActionController();

// Function to delete a specific todo.
$action->deleteTodo($_POST['id']);

// Calling insert function.
$rows = $action->fetchData();

$cnt = 0;
?>
<table class="table table-success table-striped-columns">
  <thead>
    <tr>
      <th scope=" col">#</th>
      <th scope="col">task_id</th>
      <th scope="col" colspan="2">task</th>
      <th scope="col">Delete task</th>
      <th scope="col">Update task</th>
      <th scope="col">Marked</th>
    </tr>
  </thead>
  <?php

  // Checking is data exists or not.
  if ($rows != null) {
    foreach ($rows as $row) {
      $cnt++;
  ?>
      <tbody>
        <del>
          <tr class="table-row">
            <th scope="row cnt"><?= $cnt ?></th>
            <td id='<=?$cnt?>'><?= $row['task_id'] ?></td>
            <td id='<=?$cnt?>' colspan="2" class="row-data"><?= $row['task'] ?></td>
            <td><button data-taskid='<?= $row['task_id'] ?>' class='delete-todo'>Delete</button></td>
            <td><input type="text" id='<?= $row['task_id'] ?>'><button data-taskid='<?= $row['task_id'] ?>' class='update-todo'>update</button></td>
            <td><button data-taskid='<?= $row['task_id'] ?>' class='mark-todo'>Marked</button></td>
          </tr>
      </tbody>
      </del>
    <?php
    }
  }
  else {
    ?>
    <h1>Empty</h1>
  <?php
  }
  ?>
</table>
