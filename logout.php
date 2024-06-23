<?php

require_once("dbcon.php");

$_SESSION = [];
session_unset();
session_destroy();
header("location: landing.php");

?>