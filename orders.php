<?php  //orders.php FRITUUR

require_once("business/itemsService.php");
require_once("business/ordersService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["userId"])) {
    
    if($_SESSION["employee"] == 0) {
        
        if(isset($_GET["id"])) {  //retrieving the correct item by id
            $id = $_GET["id"];
            $itemsSvc = new ItemsService();
            $item = $itemsSvc->getById($id);
            print_r($item);
                
            if($item != null) {  //check for a valid broodjesId, if correct, load options
                
                $active = true;
                
                $sauceSvc = new SauceService();
                $sauceList = $sauceSvc->getAll();
                $toppingsSvc = new ToppingService();
                $toppingsList = $toppingSvc->getAll();
                $ingredientsSvc = new IngredientService();
                $ingredientsList = $ingredientSvc->getById($id);
                
                include("presentation/orders.php");
                
            }
            else {
                //ERROR HANDLER TO BE BUILD
            }
            
        }
    }
}

                
                
                
