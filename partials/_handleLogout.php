<?php

session_start();
session_unset();
session_destroy();

header("LOCATION: /ayush/forum/index.php?logout=true");

?>