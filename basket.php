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
    
    //collecting the desired extras
    $extraSvc = new ExtraService();
    $idList = $extraSvc->getAllIds();
    
    foreach($idList as $id) {
        $text = "extra" . $id;
        
        if(isset($_POST[$text])) {  //was the checkbox checked or not?
            
            $extra = $extraSvc->getById($id);
            
            if($extra != null) {  //if not null, there was a valid id given
                
                if(!isset($_SESSION["extras"])) {  //creating a session array if not already set
                    $_SESSION["extras"] = array();
                }
                
                array_push($_SESSION["extras"], $extra->getId());  //adding the id to the array
                
            }
            
        }
                    
    }
    
    
    //creating a line and adding it to the session array
    if(isset($_SESSION["extras"])){  //differentiate between a line with or without specifications
        
        $line = entities\Lines::create(
            null,
            null,
            $_SESSION["itemId"];,
            $amount
            //$_SESSION["extras"]  //
        );
        unset($_SESSION["itemId"]);
        unset($_SESSION["extras"]);
        array_push($_SESSION["lines"], $line);
        
    }
    else {
        
        $line = entities\Lines::create(
            null,
            null,
            $_SESSION["itemId"];,
            $amount
            //null
        );
        unset($_SESSION["itemId"]);
        array_push($_SESSION["lines"], $line); 
        
    }
    
    header("location: orders.php");
    exit(0);
    
}
else {
    $_SESSION["errorText"] = "<h1 style='color: red;'>Geen aantal ingegeven!</h1>";
    header("Location: orders.php?id=" . $_SESSION["itemId"]);
    exit(0);
}