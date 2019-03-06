<?php  //orders.php FRITUUR

require_once("business/itemsService.php");
require_once("business/ordersService.php");
require_once("business/extraService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["userId"])) {
    
    if($_SESSION["employee"] == 0) {
        
        if(isset($_GET["id"])) {  //retrieving the correct item by id
            $id = $_GET["id"];
            $itemsSvc = new ItemsService();
            $item = $itemsSvc->getById($id);
                
            if($item != null) {  //check for a valid broodjesId, if correct, load options
                
                $active = true;
                
                $extraSvc = new ExtraService();
                $ingredientList = $extraSvc->getIngredients();
                $toppingList = $extraSvc->getToppings();
                $sauceList = $extraSvc->getSauces();
                
                include("presentation/orders.php");
                
            }
            else {
                //ERROR HANDLER TO BE BUILD
            }
            
        }
    }
}