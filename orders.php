<?php  //orders.php FRITUUR

require_once("business/itemsService.php");
require_once("business/ordersService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["userId"])) {
    
    if($_SESSION["employee"] == 0) {
        
        if(isset($_GET["id"])) {  //placing item in waiting state for adjustments etc.
            $id = $_GET["id"];
            $itemsSvc = new ItemsService();
            $item = $itemsSvc->getById($id);
                
            if($item != null) {  //check for a valid broodjesId, if correct, load options
                
                $active = true;
                
                $sauceSvc = new SauceService();
                $sauceList = $sauceSvc->getAll();
                $toppingsSvc = new ToppingsService();
                $toppingsList = $toppingsSvc->getAll();
                $ingredientsSvc = new IngredientsService();
                $ingredientsList = $ingredientsSvc->getById($id);
                
            }
            else {
                //ERROR HANDLER TO BE BUILD
            }
            
        }
        else {
            
            if(isset($_POST["basket"])) {  //placing order in the basket
                
                
                //setting session arrays if not already set
                if(!isset($_SESSION["lines"])) {
                    $_SESSION["lines"] = array();
                }
                
                
                
                
                //making sure the amount is set and within limits
                if(!isset($_POST["amount"])) {
                    $amount = 1;
                }
                elseif($_POST["amount"]<0) {
                    $amount = 1;
                }
                elseif($_POST["amount"]>50) {
                    $amount = 50;
                }
                else{
                    $amount = $_POST["amount"];
                }
                array_push($_SESSION["amount"], $amount);
                
                //building arrays containing 
                
                //first we check if selected, if selected the id goes into an array if the array is empty, an empty space will be added to the array so the amount of lines in each array will be the same and equal to the amount of items in the order, this is for easy extraction of the data
                
                //collecting the desired (extra) sauces
                $sauceSvc = new SauceService();
                $sauceIdList = $sauceSvc->getIds();
                $sauceArr = array();
                
                foreach($sauceIdList as $id) {
                    
                    $text = "sauce";
                    $text .= $id;
                    
                    if(isset($_POST[$text])) {
                        array_push($sauceArr, $id);
                    }
                    
                }
                
                if(empty($removeIngredientsArr)) {
                    array_push($sauceArr, "");
                }
                
                //collecting the desired (extra) toppings
                $toppingsSvc = new ToppingsService();
                $toppingsIdList = $toppingsSvc->getIds();
                $toppingsArr = array();
                
                foreach($toppingsIdList as $id) {
                    
                    $text = "topping";
                    $text .= $id;
                    
                    if(isset($_POST[$text])) {
                        array_push($toppingsArr, $id);
                    }
                }
                
                if(empty($removeIngredientsArr)) {
                    array_push($toppingsArr, "");
                }
                
                //collecting the desired ingredients to be added
                $ingredientsSvc = new IngredientsService();
                $ingredientsIdList = $ingredientsSvc->getIds();
                $addIngredientsArr = array();
                $removeIngredientsArr = array();
                
                foreach($ingredientsIdList as $id) {
                    
                    $text = "addIngredient";
                    $text .= $id;
                    
                    if(isset($_POST[$text])) {
                        array_push($addIngredientsArr, $id);
                    }
                    
                }
                
                if(empty($removeIngredientsArr)) {
                    array_push($addIngredientsArr, "");
                }
                
                //collecting the desired ingredients to be left out
                foreach($ingredientsIdList as $id) {
                    
                    $text = "removeIngredient";
                    $text .= $id;
                    
                    if(isset($_POST[$text])) {
                        array_push($removeIngredientsArr, $id);
                    }
                    
                }
                
                if(empty($removeIngredientsArr)) {
                    array_push($removeIngredientsArr, "");
                }
                
            }
            
        }
                
                
                
                
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
        
                    $line = entities\Lines::create(
                        null,
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
        
        //displaying orders
        $orderSvc = new orderService();
        $orderList = $orderSvc->getOrdersByUserId($_SESSION["userId"]);
        include("presentation/orders.php");
    }
    elseif($_SESSION["employee"] == 1) {
        $orderSvc = new orderService();
        $orderList = $orderSvc->getAllOrders();
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
