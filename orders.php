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
            $count = 0; 
            $lines = array();
            
            foreach($idList as $id) {
                
                if($_POST[$id]>0) {
                    $count++;
                    
                    if($count === 1) {
                        $placed = date(Y-m-d G:i:s);
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
                        return $orderId;
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
                
                if ($count>0) {
                    $orderSvc = new OrderService();
                    $orderSvc->setNewLines($lines);
                }
                
            }
            
            if($count>0) {
                $placed = date();
                $userId = $_SESSION["id"];
                $extra = $_POST["extra"];
                $orderSvc = new orderService();
                $orderSvc->newOrder($id, $userId, $placed, $extra);
            }
            
        }
        
        $orderSvc = new orderService();
        $list = $orderSvc->getOrderByUserId();        
        include("presentation/orders.php");
    }
    elseif($_SESSION["employee"] == 1) {
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