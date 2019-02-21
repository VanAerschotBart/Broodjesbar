<?php  //orders.php BROODJESBAR

require_once("business/broodjesService.php");
require_once("business/orderService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["userId"])) {
    
    if($_SESSION["employee"] == 0) {
        
        if(isset($_POST["order"])) {
            $broodjesSvc = new BroodjesService();
            $idList = $broodjesSvc->getIds();
            $pointer = 0;
            $count = 0; 
            $lines = array();
            
            foreach($idList as $ids) {
                
                $id = $ids[$pointer];
                
                if($_POST[$id]>0) {
                    $count++;
                    if($count === 1) {
                        $placed = date("Y-m-d G:i:s");
                        $order = entities\Orders::create(
                            null,
                            $_SESSION["userId"],
                            $placed,
                            $_POST["sidenote"],
                            0
                        );
                        $orderSvc = new OrderService();
                        $addedOrder = $orderSvc->setNewOrder($order);
                        $orderId = $addedOrder->getId();
                    }
                    
                    $amount = $_POST[$id];
                    
                    if($amount>50) {
                        $amount = 50;
                    }
                    $line = entities\Lines::create(
                        $id,
                        $amount,
                        $orderId
                    );
                    array_push($lines, $line);
                }
                
            }
            
            if ($count>0) {
                $orderSvc = new OrderService();
                $orderSvc->setNewLines($lines);
            }
            
        }
        
        print_r($order);
        print_r($lines);
        //$orderSvc = new orderService();
        //$list = $orderSvc->getOrderByUserId();
        //include("presentation/orders.php");
    }
    elseif($_SESSION["employee"] == 1) {
        header("location: 1");
        exit(0);
        $orderSvc = new orderService();
        $list = $orderSvc->getAllOrders();
        include("presentation/orders.php");
    }
    else {
        header("Location: sessionIDerror.watnu?");
        exit(0);
    }
    
}
else {    
    header("location: list.php");
    exit(0);    
}