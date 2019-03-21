<?php  //basket.php FRITUUR

require_once("business/extraService.php");
require_once("business/linesService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST["amount"])) {
    
    $amount = $_POST["amount"];
    
    if(is_numeric($amount)) {  //numeric check
        
        $amount = ltrim($amount, "0");  //removing all zeros at the beginning
         
        //making sure the amount is within limits
        if($amount<0) {
            $amount = 1;
        }
        elseif($amount>50) {
            $amount = 50;
        }
        else{
            $amount = round($amount);  //making sure the integer is not decimal
        }
         
    }
    else {
        $_SESSION["errorText"] = "<h1 style='color: red;'>Alleen getallen!</h1>";
        header("Location: orders.php?id=" . $_SESSION["itemId"]);
        exit(0);
    } 
    
    //creating a session array for storing all lines before comitting the order
    if(!isset($_SESSION["lines"])) {
        $_SESSION["lines"] = array();
    }
    
    $itemId = $_SESSION["itemId"];
    
    //putting the line in the session array
    array_push($_SESSION["lines"], $line);
    
    $extraSvc = new ExtraService();
    $extraArray = array();
    
    //collecting the desired extra sauces
    $sauceIdList = $extraSvc->getSauceIds();
                
    foreach($sauceIdList as $id) {
        $text = "extra";
        $text .= $id;
                    
        if(isset($_POST[$text])) {
            array_push($extraArray, $id);
        }
                    
    }
            
    //collecting the desired extra toppings
    $toppingIdList = $extraSvc->getToppingIds();
            
    foreach($toppingIdList as $id) {
        $text = "extra";
        $text .= $id;
                
        if(isset($_POST[$text])) {
            array_push($extraArray, $id);
        }
        
    }
            
    //collecting the desired ingredients to be left out
    $ingredientIdList = $extraSvc->getIngredientIds();
        
    foreach($ingredientIdList as $id) {
        $text = "extra";
        $text .= $id;
                
        if(isset($_POST[$text])) {
            array_push($extraArray, $id);
        }
                
    }
    
    //creating a line
    $line = entities\Lines::create(
        null,
        null,
        $itemId,
        $amount,
        $extraArray
    );
    
    header("location: orders.php");
    exit(0);
    
}
else {
    $_SESSION["errorText"] = "<h1 style='color: red;'>Geen aantal ingegeven!</h1>";
    header("Location: orders.php?id=" . $_SESSION["itemId"]);
    exit(0);
}