<?php  //logout.php  BROODJESBAR

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_destroy();
header("location: list.php");
exit(0);
