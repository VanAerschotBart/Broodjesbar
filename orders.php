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
    
    if($user->getEmployee() == 0) {  //customer handling
        
        if(isset($_GET["id"])) {  //retrieving the correct item by id
            $itemId = $_GET["id"];
            $itemsSvc = new ItemsService();
            $item = $itemsSvc->getById($itemId);
                
            if($item != null) {  //check for a valid broodjesId, if correct, load options
                
                $_SESSION["itemId"] = $itemId;
                $active = true;
                $extraSvc = new ExtraService();
                $ingredientList = $extraSvc->getIngredients();
                $toppingList = $extraSvc->getToppings();
                $sauceList = $extraSvc->getSauces();
                
            }
            else {
                $_SESSION["errorText"] = "<h1 style='color: red;'>Onbekend broodjesId!</h1>";
        header("Location: orders.php");
        exit(0);
            }
            
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