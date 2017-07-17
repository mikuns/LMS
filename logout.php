<?php

require_once("setup/connect.php");
session_destroy();
header("Location: /lms/index.php");

?>