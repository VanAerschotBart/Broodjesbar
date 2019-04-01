<?php  //basket.php FRITUUR

require_once("business/extraService.php");
require_once("business/linesService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST["amount"])) {  //only required input from user
    
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
    
    //creating a session array for storing all lines if not already set
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
    
    //collecting the desired extras
    $extraSvc = new ExtraService();
    $idList = $extraSvc->getAllIds();
    
    foreach($idList as $id) {
        $text = "extra" . $id;
        
        if(isset($_POST[$text])) {  //was the checkbox checked or not?
            
            $extra = $extraSvc->getById($id);
            
            if($extra != null) {  //if null, there was an invalid id given
                
                if(!isset($_SESSION["extras"])) {  //creating a session array if not already set
                    $_SESSION["extras"] = array();
                }
                
                if(!isset($extraIdArray)) {  //creating an array for the id(s) if not already set
                    $extraIdArray = array();
                }
                
                array_push($extraIdArray, $extra->getId());  //adding the id to the array
                
            }
            
        }
    
        if(isset($_SESSION["extras"])){  //if the session array exists
            array_push($_SESSION["extras"], $extraArray);
        }
                    
    }
    
    header("location: orders.php");
    exit(0);
    
}
else {
    $_SESSION["errorText"] = "<h1 style='color: red;'>Geen aantal ingegeven!</h1>";
    header("Location: orders.php?id=" . $_SESSION["itemId"]);
    exit(0);
}