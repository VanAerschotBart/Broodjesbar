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
    
    if($user->getEmployee() == 0) {
        //$orderList maken (persoonlijk)
        
        $dateTime = new DateTime();
        $diff = $dateTime->format("i") % 5;  //difference minutes from 5 last 5th minute
        date_add($dateTime, date_interval_create_from_date_string(20-$diff . " minutes"));  //buffer for pickup time (keep the auto +5min in presentation for-loop in mind!)
       
        
    }
    else{
        //$orderList maken (alle)
    }
    
    include("presentation/orders.php");
}
else {
    header("Location: list.php");
    exit(0);
}