<?php  //placer.php FRITUUR

require_once("business/itemsService.php");
require_once("business/ordersService.php");
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
    
    if($user->getEmployee() == 0) {  //customer handling
        
        if(isset($_SESSION["lines"])) {  //check for lines in the basket
            
            if(isset($_POST['extraNote'])) {
                $extraNote = htmlspecialchars($_POST['extraNote']);
            } 
            else {
                $extraNote = "";
            }
            
            //pickup time check
            $pickup = $_POST["pickup"];
            $dateTime = new DateTime();
            $diff = $dateTime->format("i") % 5;  //difference minutes from 5 last 5th minute
            date_add($dateTime, date_interval_create_from_date_string(25-$diff . " minutes"));
            $firstPickup = $dateTime->format("H:i");
                
            //buffer for pickup time            
            if($pickup < $firstPickup) {
                $pickup = $firstPickup;
            }
            
            $placed = date('d-m-Y/G:i');
            $order = entities\Orders::create(
                null,
                $user->getId(),
                $placed,
                $pickup,
                $extraNote,
                0,
                $_SESSION["lines"]
            );
            $orderSvc = new OrdersService();
            $orderSvc->setNewOrder($order);
            unset($_SESSION["lines"]);
            
        }
        else {
            $_SESSION["errorText"] = "<h1 style='color: red;'>Geen lijnen gevonden om in bestelling te plaatsen</h1>";
            header("Location: orders.php");
            exit(0);
        }
        
        header("Location: orders.php");
        exit(0);
        
    }
    else{  //employee handler
        
        header("Location: orders.php");
        exit(0);
    }
}
else {
    header("Location: list.php");
    exit(0);
}