<?php  //delete.php  //FRITUUR

require_once("business/accountService.php");
require_once("business/itemsService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user"])) {
    
    $user = $_SESSION["user"];
    
    if($user->getEmployee() == 1) {
        
        if(isset($_GET["id"])) {
            $itemSvc = new ItemsService();
            $itemSvc->deleteItem($_GET["id"]);
        }
        
    }
    
    header("Location: list.php");
    exit(0);
}