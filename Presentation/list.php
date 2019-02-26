<!DOCTYPE HTML>  <!-- presentation/list.php BROODJESBAR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Broodjesbar</title>
    </head>
    <body>
        <h1>Lijst</h1>
        
        <?php
        if(!isset($_SESSION["employee"])) {//if not logged in, build a log in and a link to register if unregistered user  
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
        if(isset($_SESSION["employee"]) && $_SESSION["employee"] == 0) {  //check if a user is logged in and user is a costumer ,if so, the list will be in a form to order
        ?>
        
        <form action='orders.php' method='POST'>
                
        <?php
        }
        ?>
                
        <table>
            <tr>
                <th>Broodje</th>
                <th>Beschrijving</th>
                <th>Prijs (€)</th>
            </tr>
        <?php
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
            if(isset($_SESSION["employee"]) && $_SESSION["employee"] == 0){  //if costumer, an input field for the disered amount is added
        ?>
                  
                <td>
                    <input type="number" name="<?php print($value->getId()); ?>" min="0" max="50">
                </td>
            
        <?php
            }
        ?>
            </tr>
            
        <?php
        }  //end of list building
        ?>
            
        </table>
    
        <?php
        if(isset($_SESSION["employee"]) && $_SESSION["employee"] == 0) {  //if costumer, adding 2 extra input fields and closing the form
        ?>
    
        <input type="text" name="sidenote" placeholder="extra opmerkingen">
        <input type="hidden" name="order">
        <input type="submit" value="bestellen">
        <input type="reset" value="reset">
        </form>
        
        <?php  
        }
        ?>
        
    </body>
</html>