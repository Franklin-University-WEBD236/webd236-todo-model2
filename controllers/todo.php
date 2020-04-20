<?php
include_once "include/util.php";
include_once "models/todo.php";

function get_view($id) {
  if (!$id) {
    die("No todo id specified");
  }

  $todo = findToDoById($id);
  if (!$todo) {
    die("No todo with id $id found.");
  }
  renderTemplate(
    "views/todo_view.php",
    array(
      'title' => 'Viewing To Do',
      'todo' => $todo
    )
  );
}

function get_list() {
  $todos = findAllCurrentToDos();
  $dones = findAllDoneToDos();
  renderTemplate(
    "views/index.php",
    array(
      'title' => 'Home',
      'todos' => $todos,
      'dones' => $dones
    )
  );
}

function get_edit($id) {
  if (!$id) {
    die("No todo specified");
  }
  $todo = findToDoById($id);
  if (!$todo) {
    die("No todo with id {$id} found.");
  }
  renderTemplate(
    "views/todo_edit.php",
    array(
      'title' => 'Editing To Do',
      'todo' => $todo
    )
  );
}

function post_done($id) {
  if (!$id) {
      die("No todo specified");
  }
  toggleDoneToDo($id);
  redirectRelative("index");
}

function post_add() {
  $description = safeParam($_POST, 'description', '');
  if (!$description) {
    die("no description given");
  }
  addToDo($description);
  redirectRelative("index");
}

function validate_present($elements) {
  $errors = '';
  foreach ($elements as $element) {
    if (!isset($_POST[$element])) {
      $errors .= "Missing $element\n";
    }
  }
  return $errors;
}

function post_edit($id) {
  if (!$id) {
    die("No todo specified");
  }
  $errors = validate_present(array('description', 'done'));
  if ($errors) {
    die($errors);
  }
  $description = safeParam($_POST, 'description');
  $done = safeParam($_POST, 'done');
  updateToDo($id, $description, $done);
  redirectRelative("index");
}

function post_delete($id) {
  if (!$id) {
    die("No todo specified");
  }
  $todo = findToDoById($id);
  if (!$todo) {
    die("No todo found.");
  }
  deleteToDo($id);
  redirectRelative("index");
}

?>