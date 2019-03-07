<?php  //basket.php FRITUUR

require_once("business/extraService.php");
require_once("business/linesService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST["amount"])) {
                
    //making sure the amount is within limits
    if($_POST["amount"]<0) {
        $amount = 1;
    }
    elseif($_POST["amount"]>50) {
        $amount = 50;
    }
    else{
        $amount = $_POST["amount"];
    }
    
    //creating a session array for storing all lines before comitting the order
    if(!isset($_SESSION["lines"])) {
        $_SESSION["lines"] = array();
    }
    
    $itemId = $_SESSION["itemId"];
    
    //creating a line
    $line = entities\Lines::create(
        null,
        null,
        $itemId,
        $amount
    );
    
    //putting the line in the session array
    array_push($_SESSION["lines"], $line);
    
    $extraSvc = new ExtraService();
    
    //collecting the desired extra sauces
    $sauceIdList = $extraSvc->getSauceIds();
    $sauceArr = array();
                
    foreach($sauceIdList as $id) {
        $text = "sauce";
        $text .= $id;
                    
        if(isset($_POST[$text])) {
            array_push($sauceArr, $id);
        }
                    
    }
            
    //collecting the desired extra toppings
    $toppingIdList = $extraSvc->getToppingIds();
    $toppingsArr = array();
            
    foreach($toppingIdList as $id) {
        $text = "topping";
        $text .= $id;
                
        if(isset($_POST[$text])) {
            array_push($toppingsArr, $id);
        }
        
    }
            
    //collecting the desired ingredients to be left out
    $ingredientIdList = $extraSvc->getIngredientIds();
    $IngredientsArr = array();
        
    foreach($ingredientIdList as $id) {
        $text = "removeIngredient";
        $text .= $id;
                
        if(isset($_POST[$text])) {
            array_push($removeIngredientsArr, $id);
        }
                
    }
    
    header("location: orders.php");
    exit(0);
    
}
else {
    header("location: amountNotSet.php");
    exit(0);
}