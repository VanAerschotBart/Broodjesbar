<?php  //orders.php FRITUUR

require_once("business/itemsService.php");
require_once("business/linesService.php");
require_once("business/extraService.php");
require_once("business/accountService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION["errorText"])) {
    print($_SESSION["errorText"]);
    unset($_SESSION["errorText"]);
}

if (isset($_SESSION["user"])) {
    
    $user = $_SESSION["user"];
    
    //to select pickup time in presentation
    $date = date('H:i');
    $dateTime = new DateTime();
    $dateTime->setTimestamp($date);
    
    if($user->getEmployee() == 0) {
        
    }
    else{
        
    }
    
    include("presentation/orders.php");
}
else {
    header("Location: list.php");
    exit(0);
}