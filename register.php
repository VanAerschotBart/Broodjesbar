<?php  //register.php  BROODJESBAR

require_once("business/accountService.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION["errorText"])) {
    print($_SESSION["errorText"]);
    unset($_SESSION["errorText"]);
}

if(isset($_SESSION["id"])) {
        header("Location: list.php");
        exit(0);    
}

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password1"]) && isset($_POST["password2"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    
    if($name == "" || $email == "" || $password1 == "" || $password2 == "") {
        $_SESSION["errorText"] = "<h1 style='color: red;'>Alle velden zijn verplicht in te vullen</h1>";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit(0);
    }
    else {
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  //stolen emailvalidator from w3s
            $_SESSION["errorText"] = "<h1 style='color: red;'>Gelieve een e-mailadres in te geven.</div>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit(0);
        }
        else {
            $accSvc = new AccountService();
            $answer = $accSvc->getByEmail($email);  //if we get an account back from the email inputted, it means the email adress already is registered
        
           if($answer == null) {  //so no answer is good this time, let's start
            
               if($password1 == $password2){  //check if the user is capable of typing the same thing twice
                   $hash = password_hash($password1, PASSWORD_DEFAULT);
                   $account = entities\Account::create(
                       null, 
                       $name, 
                       $email, 
                       $hash, 
                       0
                   );
                   $accSvc = new Accountservice();
                   $addedAccount = $accSvc->setNewUser($account);
                   $id = $addedAccount->getId();
                   $_SESSION["employee"] = 0;
                   $_SESSION["userId"] = $id;
                   $_SESSION["name"] = $name;
                   $_SESSION["email"] = $email;
                   header("Location: list.php");
                   exit(0);
               }
               else {  //I guess we got an idiot...
                   $_SESSION["errorText"] = "<h1 style='color: red;'>Wachtwoorden komen niet overeen</h1>";
                   header("Location: " . $_SERVER['PHP_SELF']);
                   exit(0);
               }
            
            }
          else {  //Lovely to see I got fans so big they want to register more than once, but we have got to draw the line somewhere, no doubles!
                $_SESSION["errorText"] = "<h1 style='color: red;'>Dit email-adres is al geregistreerd</h1>";
                header("Location: " . $_SERVER['PHP_SELF']);
                exit(0);
            }
        
        }
        
    }
    
}

include("presentation/register.php");