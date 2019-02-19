<?php  //orders.php BROODJESBAR

require_once("business/broodjesService.php");
require_once("business/orderService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["id"])) {
    
    if($_SESSION["employee"] == 0) {
        
        if(isset($_POST["order"])) {
            $broodjesSvc = new BroodjesService();
            $idList = $broodjesSvc->getIds();
            $count = 0;
            
            foreach($idList as $id) {
                
                if($_POST[$id]>0) {
                    $count++;
                    $amount = $_POST[$id];
                    
                    if($amount>50) {
                        $amount = 50;
                    }
                    
                    $orderSvc = new orderService();
                    $orderSvc->newLine($id, $amount);
                    //print($_POST[$id]);
                }
                
            }
            
            if($count>0) {
                $id = ;  // fuck fuck fuck fuck fuck fuck fuck fuck
                $date = date();
                $userId = $_SESSION["id"];
                $extra = $_POST["extra"];
                $orderSvc = new orderService();
                $orderSvc->newOrder($id, $userId, $date, $extra);
            }
            
        }
        
        $orderSvc = new orderService();
        $list = $orderSvc->getPersonalOrder();        
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