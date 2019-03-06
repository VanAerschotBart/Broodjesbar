<!DOCTYPE HTML>  <!-- presentation/list.php FRITUUR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Frituur</title>
    </head>
    <body>
        <h1>Lijst</h1>
        
        <?php
        if(!isset($_SESSION["employee"])) {//if not logged in, build a log in and a link to register for unregistered user  
        ?>    
        
        <form action='login.php' method='POST'>
            
        <?php            
            if(isset($_COOKIE["user"])) {//check for known user
                $mail = $_COOKIE["user"];
        ?>
            
            Email:<input type="email" name="email" value="<?php print($mail); ?>" required>
            
        <?php
            }
            else {
        ?>
            
            Email:<input type="email" name="email" required>
            
        <?php
            }                
        ?>
            
            Wachtwoord:<input type="password" name="password" required>
            <input type="submit" value="Inloggen">
        </form>
        <a href="register.php">Registreer</a>
            
        <?php
        }
        else {  //logged in user, so build links to log out or go to their order(s)
        ?>
        
        <a href="logout.php">Afmelden</a><br>
        <a href="orders.php">Bestellingen</a>
            
        <?php
        }
        ?>
                
        <table>
            <tr>
                <th>Item</th>
                <th>Beschrijving</th>
                <th>Prijs (€)</th>
            </tr>
        <?php
        if(isset($list) && $list != null) {
            
            foreach($list as $value) {  //building the list
        ?>
            <tr>
                <td><?php print($value->getName()); ?></td>
                <td><?php print($value->getDescription()); ?></td>
                <td><?php print($value->getPrice()); ?></td>
        
        <?php
            if(isset($_SESSION["employee"]) && $_SESSION["employee"] == 1) {  //if the logged in user is an employee, 2 links are created for deleting or adjusting a sandwich
        ?>
                  
                <td>
                    <a href="adjust.php?id=<?php print($value->getId()); ?>">Aanpassen</a> |
                    <a href="delete.php?id=<?php print($value->getId()); ?>">Verwijderen</a>
                </td>
                
        <?php
            }
            elseif(isset($_SESSION["employee"]) && $_SESSION["employee"] == 0) {  //if costumer, an input field for the disered amount is added
        ?>
                <td>  
                    <a href="orders.php?id=<?php print($value->getId()); ?>"><button>Bestellen</button></a>
                </td>
            
        <?php
            }
        ?>
            </tr>
            
        <?php
                
            }  //end of list building
        }
        else {
        ?>
            
            <tr>
                <td colspan="3" style="color: red;">Geen lijst gevonden</td>
            </tr>
            
        <?php
        }
        ?>
            
        </table>
    </body>
</html>