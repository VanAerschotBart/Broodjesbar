<?php  //login.php FRITUUR


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once("business/accountService.php");


if(isset($_POST["email"]) || isset($_POST["password"])) {  //is there an input?
    
    if(isset($_POST["email"]) && isset($_POST["password"])) {  //are both inputs set?
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if($email == "" || $password == ""){  //check for empty input
            $_SESSION["errorText"] = "<h1 style='color: red;'>Alle velden zijn verplicht in te vullen</h1>";
        }
        else {
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  //emailvalidator
                $_SESSION["errorText"] = "<h1 style='color: red;'>Gelieve een e-mailadres in te geven.</div>";
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            else {  //retrieving the password that goes with the emailadress
                $accSvc = new Accountservice();
                $answer = $accSvc->getByEmail($email);
        
                if($answer == null) {  //no answer means the given adress is unknown
                    $_SESSION["errorText"] = "<h1 style='color: red;'>Onbekend emailadres</h1>";
                }
                else {
                
                    if(password_verify($password, $answer->getPassword())) {  //is the password correct?
                        $_SESSION["employee"] = $answer->getEmployee();
                        $_SESSION["userId"] = $answer->getId();
                        $_SESSION["name"] = $answer->getName();
                        $_SESSION["email"] = $email;
                        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;  //I need these parameters to make localhost store the cookie, otherwise they act like a session, remembered but gone as soon as the browser closes
                        setcookie("user", $email, time()+60*60*24*365, '/', $domain, false);        
                    }
                    else {  //the given password didn't match the one in the DB
                        $_SESSION["errorText"] = "<h1 style='color: red;'>Onbekende email-wachtwoord combinatie</h1>";
                    }
            
                }
             
            }
        
        }
        
    }
    else {
        $_SESSION["errorText"] = "<h1 style='color: red;'>Alle velden zijn verplicht in te vullen</h1>";
    }
    
}

header("Location: list.php");
exit(0);