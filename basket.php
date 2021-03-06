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
    
    //getting the sidenote, if no sidenote given, an empty string will be passed on  
    if(isset($_POST["note"])) {
        $note = htmlspecialchars($_POST["note"]);
    }
    else {
        $note= "";
    }
    
    //creating a session array for storing all lines if not already set
    if(!isset($_SESSION["lines"])) {
        $_SESSION["lines"] = array();
    }
    
    //collecting the desired extras
    $extraSvc = new ExtraService();
    $idList = $extraSvc->getAllIds();
    $extraArray = array();

    
    foreach($idList as $id) {
        $text = "specification" . $id;
        
        if(isset($_POST[$text])) {  //was the checkbox checked or not?
            
            $extra = $extraSvc->getById($id);
            
            if($extra != null) {  //if not null, there was a valid id given
                
                array_push($extraArray, $id);  //adding the id to the array
                
            }
            
        }
                    
    }
    
    
    //creating a line and adding it to the session array
    if(!empty($extraArray)){  //differentiate between a line with or without specifications
        
        $line = entities\Lines::create(
            null,
            null,
            $_SESSION["itemId"],
            $note,
            $amount,
            $extraArray
        );
        unset($_SESSION["itemId"]);
        array_push($_SESSION["lines"], $line);
        
    }
    else {
        
        $line = entities\Lines::create(
            null,
            null,
            $_SESSION["itemId"],
            $note,
            $amount,
            null
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