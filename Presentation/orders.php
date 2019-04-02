<!DOCTYPE HTML>  <!-- presentation/orders.php FRITUUR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Frituur</title>
    </head>
    <body>
        <h1>Bestellingen</h1>
        
         <?php
        if (isset($active) && $active === true) {  //check for an active order
        ?>
        
        <h2>Te bestellen</h2>
        <table>     <!-- description of the item -->
            <tr>
                <td style="border: 1px solid black;"><?php print($item->getName()); ?></td>
                <td style="border: 1px solid black; padding: 0% 5%;"><?php print($item->getDescription()); ?></td>
                <td style="border: 1px solid black;"><?php print($item->getPrice()); ?></td>
            </tr>
        </table>
        <form action="basket.php" method="POST">
            <ul style="list-style-type: none;">
                <li><h3>Sauzen</h3></li>
            
        <?php
            if(isset($sauceList)) {
                foreach($sauceList as $sauce) {  //print list of sauces
        ?>
                
                <li>
                    <input type="checkbox" name="extra<?php print($sauce->getId()); ?>">
                    <?php print($sauce->getName()); ?>
                </li>
                
        <?php
                }
            }
            else {
        ?>
                
                <li style="color: red;">Geen sauzen gevonden</li>      
        
        <?php
            }
        ?>
                
                <li><h3>Toppings</h3></li>
                
        <?php
            if(isset($toppingList)) {
                foreach($toppingList as $topping) {  //print list of toppings
        ?>
                
                <li>
                    <input type="checkbox" name="extra<?php print($topping->getId()); ?>">
                    <?php print($topping->getName()); ?>
                </li>
                
        <?php    
                }
            }
            else {
        ?>
                
                <li style="color: red;">Geen toppings gevonden</li>      
        
        <?php
            }
        ?>
             
                <li><h3>Ingrediënten verwijderen</h3></li>
       
        <?php
            if(isset($ingredientList)) {
                foreach($ingredientList as $ingredient) {  //print list of ingredients to remove
        ?>
                
                <li>
                    <input type="checkbox" name="extra<?php print($ingredient->getId()); ?>">
                    <?php print($ingredient->getName()); ?>
                </li>
                
        <?php    
                }
            }
            else {
        ?>
                
                <li style="color: red;">Geen basis ingrediënten gevonden</li>      
        
        <?php
            }
        ?>
        
            </ul>
            <h4 style="text-decoration: underline;">Opmerking:</h4>
            <textarea type="text" name="note"></textarea>
            <h4 style="text-decoration: underline;">Aantal</h4>
            <input type="number" name="amount" value="1" required>
            <input type="submit" value="In winkelmandje plaatsen">
            <input type="reset" value="Reset">
        </form>
            
        <?php    
        }
        
        if(isset($_SESSION["lines"])) {
        ?>
        
        <h2>Winkelmandje</h2>
        <table>
            <tr>
                <td><h3>Naam</h3></td><td><h3>Aantal</h3></td><td><h3>Prijs</h3></td><td><h3>Opmerking</h3></td>
            </tr>
            
        <?php
            $itemSvc = new ItemsService();
            
            if(isset($_SESSION["lines"])) {
                
                foreach($_SESSION["lines"] as $line) {
                    $item = $itemSvc->getById($line->getItemId());
        ?>
        
            <tr>
                <td>
                    <?php print($item->getName()); ?>
                </td>
                <td style="text-align: center;">
                    <?php print($line->getAmount()); ?>
                </td>
                <td style="text-align: right;">
                    <?php $price = $item->getPrice() * $line->getAmount(); print($price); ?>
                </td>
                <td style="text-align: right;">
                    <?php print($line->getNote()); ?>
                </td>
            </tr>
            
        <?php
                }
            }
        ?>
            
        </table>
        <a href="placer.php">Afrekenen</a>
        <h2>Reeds geplaatste bestellingen</h2>
        
        <?php
        }
        
        if(isset($orderList)) {  //check for existing orders
        ?>
        
        <table>   
            <tr>
                <th>BestellingsId</th>
                <th>GebruikersId</th>
                <th>Bestellingstijdstip</th>
                <th>Afhaaltijdstip</th>
                <th>Opmerking</th>
                <th>Status</th>
            </tr>
            
        <?php
            foreach($orderList as $value) {  //print list of placed orders
        ?>
                <tr>
                    <td><?php print($value->getId()); ?></td>
                    <td><?php print($value->getUserId()); ?></td>
                    <td><?php print($value->getPlaced()); ?></td>
                    <td><?php print($value->getPickup()); ?></td>
                    <td><?php print($value->getExtra()); ?></td>
                    <td><?php print($value->getStatus()); ?></td>
                </tr>
                
            <?php
            }
            ?>
            
        </table>
        
        <?php
        }
        else {
            print("<h3 style='color: red; text-decoration: underline;'>Er staan momenteel geen bestellingen open.</h3>");
        }
        ?>
        <a href="list.php">Verder Winkelen</a>    
    </body>
</html>
        
        