<?php

require("../../lib/db/DbConfig.php");
require("Database.php");

$db = new Database(DB_SERVER,DB_USER,DB_PSSWD,DB_DBASE);

try {
  $db->connect();
} catch (DatabaseException $dbe) {
  echo "Caught exception\n";
  }

$db->query("select * from fb_data");
$db->insert("insert into fb_comment_data values(30,\"foobar\")");
$db->query("select * from fb_data");

?>