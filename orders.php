<?php  //orders.php FRITUUR

require_once("business/itemsService.php");
require_once("business/linesService.php");
require_once("business/extraService.php");
require_once("business/accountService.php");
require_once("business/ordersService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION["errorText"])) {
    print($_SESSION["errorText"]);
    unset($_SESSION["errorText"]);
}

if (isset($_SESSION["user"])) {
    
    if(isset($_GET["forget"])) {
        $id = $_GET["forget"];
        unset($_SESSION["lines"][$id]);
        header("Location: orders.php");
        exit(0);
    }
    
    $user = $_SESSION["user"];
    
    if($user->getEmployee() == 0) {
        
        //get orders from costumer
        $orderSvc = new OrdersService();
        $orders = $orderSvc->getOrdersByUserId($user->getId());
        
        //create pickup starting time
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