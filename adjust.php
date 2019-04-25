<?php  //adjust.php  //FRITUUR

require_once("business/accountService.php");
require_once("business/itemsService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user"])) {
    
    $user = $_SESSION["user"];
    
    if($user->getEmployee() == 1) {
        
        if(isset($_GET["id"])) {            
            $itemsSvc = new ItemsService();
            $item = $itemsSvc->getById($_GET["id"]);
            
            if($item != null) {              
                include("presentation/adjust.php");
            }
            else {
                $_SESSION["errorText"] = "Onbekende ID om aan te passen!";                
                header("Location: list.php");
                exit(0);
            }
            
        }
        elseif(isset($_POST[""])) {            
            $itemSvc = new ItemService();
            $itemSvc->adjustItem();  
            $_SESSION["errorText"] = "Item is aangepast!";             
            header("Location: list.php");
            exit(0);
        }
        else {
            header("Location: list.php");
            exit(0);          
        }
        
    }
    else{
        header("Location: list.php");
        exit(0);
    }

}
else {
    header("Location: list.php");
    exit(0);
}
