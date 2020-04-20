<?php
  include_once "include/util.php";

  function post_index() {
    $dbFilename = CONFIG['databaseFile'];
    $output = `sqlite3 {$dbFilename}.db3 < {$dbFilename}.sql 2>&1`;
    if ($output) {
      errorPage(500, "SQLite errors in {$dbFilename}.sql\n " . $output);
    }
    flash("Database reset successfully.");
    redirectRelative("index");
  }
?>