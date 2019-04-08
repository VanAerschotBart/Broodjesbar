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
        
        //timestamp for pickup ON HOLD
        /*list($hour, $minute) = explode(":", date("H:i"));
        
        if($minute != 0 || $minute != 5) {  //rounding the minutes up
            
            //TO DO: laatste char van $minute afzonderen!
            if($minute < 5) {
                $minute = 5;
            }
            else{
                $minute = 0;
            }
            
        }
        */
        
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