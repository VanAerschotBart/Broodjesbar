<!DOCTYPE HTML>  <!-- presentation/orders.php FRITUUR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Frituur</title>
    </head>
    <body>
        <h1>Bestellingen</h1>
        
         <?php
        if ($active === true) {  //check for an active order
        ?>
        
        <h2>Te bestellen</h2>
        <table>     <!-- description of the item -->
            <tr>
                <td><?php print($item->getName()); ?></td>
                <td><?php print($item->getDescription()); ?></td>
                <td><?php print($item->getPrice()); ?></td>
            </tr>
        </table>
        <form action="basket.php" method="POST">
            <ul style="list-style-type: none;">
                <li><h3>Sauzen</h3></li>
            
        <?php
            foreach($sauceList as $sauce) {  //print list of sauces
        ?>
                
                <li>
                    <input type="checkbox" name="sauce<?php print($sauce->getId()); ?>">
                    <?php print($sauce->getName()); ?>
                </li>
                
        <?php    
            }
        ?>
                
                <li><h3>Toppings</h3></li>
                
        <?php
            foreach($toppingsList as $topping) {  //print list of toppings
        ?>
                
                <li>
                    <input type="checkbox" name="topping<?php print($topping->getId()); ?>">
                    <?php print($topping->getName()); ?>
                </li>
                
        <?php    
            }
        ?>
                
                <li><h3>Ingrediënten toevoegen</h3></li>
       
        <?php
            foreach($ingredientsList as $ingredient) {  //print list of ingredients to add
        ?>
                
                <li>
                    <input type="checkbox" name="addIngredient<?php print($ingredient->getId()); ?>">
                    <?php print($ingredient->getName()); ?>
                </li>
                
        <?php    
            }
        ?>
             
                <li><h3>Ingrediënten verwijderen</h3></li>
       
        <?php
            foreach($ingredientsList as $ingredient) {  //print list of ingredients to remove
        ?>
                
                <li>
                    <input type="checkbox" name="removeIngredient<?php print($ingredient->getId()); ?>">
                    <?php print($ingredient->getName()); ?>
                </li>
                
        <?php    
            }
        ?>
        
            </ul>
            <input type="hidden" name="create">
            <input type="number" name="amount" value="1" required><br>
            <input type="submit" value="In winkelmandje plaatsen">
            <input type="reset" value="Reset">
        </form>
            
        <?php    
        }
        elseif(isset($_SESSION["lines"])) {
        ?>
        
        <h2>Winkelmandje</h2>
        <table>
            <tr>
                <td>Naam</td><td>Aantal</td><td>Prijs</td>
            </tr>
            
        <?php
            $rows = count($_SESSION["lines"]);
            
            foreach($_SESSION["lines"] as $line) {
        ?>
        
            <tr>
                <td><?php print($line->getItemId()); ?></td><td><?php print($line->getAmount()); ?></td><?php //print($linePrice); ?>
            </tr>
            
        <?php
            }
        ?>
            
        </table>
        
        <?php
        }
        
        if($orderList != null) {  //check for existing orders
        ?>
        
        <h2>Reeds geplaatste bestellingen</h2>
        <table>   
            <tr>
                <th>BestellingsId</th>
                <th>GebruikersId</th>
                <th>Bestelling geplaats op:</th>
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
            print("<h1 style='color: red; text-decoration: underline;'>Er staan momenteel geen bestellingen open.</h1>");
        }
        ?>
            
    </body>
</html>
        
        