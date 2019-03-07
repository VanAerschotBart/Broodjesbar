<?php  //basket.php FRITUUR

require_once("business/extraService.php");

if(isset($_POST["create"])) {
                
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
    
}
elseif(isset($_POST["adjust"])) {
    
    
    
}
elseif(isset($_GET["delete"])) {
    
    
}
else {
    
}