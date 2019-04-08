<?php  //placer.php FRITUUR

require_once("business/itemsService.php");
require_once("business/orderService.php");
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
        
        if(isset($_SESSION["lines"])) {  //
            
            if(isset($_POST['extraNote'])) {
                $extraNote = $_POST['extraNote']
            } 
            else {
                $extraNote = "";
            }
            
            $placed = date('d-m-Y-G:i');
            $order = entities\Orders::create(
                null,
                $user->getId(),
                $placed,
                null,  //$pickup->ON HOLD
                $extraNote,
                0,
                $_SESSION["lines"]
            )
            $orderSvc = new OrderService();
            
        }
        else {
            $_SESSION["errorText"] = "<h1 style='color: red;'>Geen lijnen gevonden om in bestelling te plaatsen</h1>";
            header("Location: orders.php");
            exit(0);
        }
        
        include("presentation/orders.php");
        
    }
    else{  //employee handler
        
        include("presentation/orders.php");
    }
}
else {
    header("Location: list.php");
    exit(0);
}