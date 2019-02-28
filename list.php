<?php  //list.php FRITUUR

require_once("business/itemsService.php");
require_once("business/accountService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION["errorText"])) {
    print($_SESSION["errorText"]);
    unset($_SESSION["errorText"]);
}

$itemsSvc = new ItemsService();
$list = $itemsSvc->getList();

include("presentation/list.php");