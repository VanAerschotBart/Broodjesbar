<?php  //list.php BROODJESBAR

require_once("business/broodjesService.php");
require_once("business/accountService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION["errorText"])) {
    print($_SESSION["errorText"]);
    unset($_SESSION["errorText"]);
}

$broodjesSvc = new BroodjesService();
$list = $broodjesSvc->getList();

include("presentation/list.php");