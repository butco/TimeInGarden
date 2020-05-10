<?php

session_start();

require "config/Db.php";
// require "classes/Users.php";
require "classes/Timespent.php";

$conn = new Db();
$db = $conn->connect();

// $users = new Users($db);
$timespent = new Timespent($db);