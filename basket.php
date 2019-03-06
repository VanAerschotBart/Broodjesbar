<?php  //basket.php FRITUUR

require_once("business/extraService.php");

if(isset($_POST["create"])) {
    
    //setting lines and lineId session array/var if not already set
    if(!isset($_SESSION["lines"])) {
        $_SESSION["lines"] = array();
        $_SESSION["lineId"] = 0;
        $lineId = $_SESSION["lineId"];
    }
    else {  //updating lineId session var and setting the lineId on lines session array
        $lineId = $_SESSION["lineId"] +1;
        $_SESSION["lineId"] = $lineId;
        $_SESSION["lines"][$lineId]["lineId"] = $lineId;
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
    array_push($_SESSION["lines"][$lineId]["amount"], $amount);
    
     //first we check if selected, if selected the id goes into its array, if the array isn't empty, the array is placed in the session
    
    //collecting the desired (extra) sauces
    $extraSvc = new ExtraService();
    $sauceIdList = $extraSvc->getSauceIds();
    $sauceArr = array();
                
    foreach($sauceIdList as $id) {
        $text = "sauce";
        $text .= $id;
                    
        if(isset($_POST[$text])) {
            array_push($sauceArr, $id);
        }
                    
    }
                
    if(!empty($sauceArr)) {
        array_push($_SESSION["lines"][$lineId]["sauce"], $sauceArr);
    }
            
    //collecting the desired (extra) toppings
    $extraSvc = new ExtraService();
    $toppingIdList = $extraSvc->getToppingIds();
    $toppingsArr = array();
            
    foreach($toppingIdList as $id) {
        $text = "topping";
        $text .= $id;
                
        if(isset($_POST[$text])) {
            array_push($toppingsArr, $id);
        }
    }
                
    if(!empty($toppingsArr)) {
        array_push($_SESSION["lines"][$lineId]["topping"], $toppingsArr);
    }
            
    //collecting the desired ingredients to be added
    $extraSvc = new ExtraService();
    $ingredientIdList = $extraSvc->getIngredientIds();
    $addIngredientsArr = array();
    $removeIngredientsArr = array();
        
    foreach($ingredientIdList as $id) {
        $text = "addIngredient";
        $text .= $id;
        
        if(isset($_POST[$text])) {
            array_push($addIngredientsArr, $id);
        }
            
    }
        
    if(!empty($addIngredientsArr)) {
        array_push($_SESSION["lines"][$lineId]["add"], $addIngredientsArr);
    }
        
    //collecting the desired ingredients to be left out
    foreach($ingredientIdList as $id) {
        $text = "removeIngredient";
        $text .= $id;
                
        if(isset($_POST[$text])) {
            array_push($removeIngredientsArr, $id);
        }
                
    }
                
    if(!empty($removeIngredientsArr)) {
        array_push($_SESSION["lines"][$lineId]["remove"], $removeIngredientsArr);
    }
    
}
elseif(isset($_POST["adjust"])) {
    
    
    
}
elseif(isset($_GET["delete"])) {
    
    
}
else {
    
}