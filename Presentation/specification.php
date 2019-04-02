<!DOCTYPE HTML>  <!-- presentation/specification.php FRITUUR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Frituur</title>
    </head>
    <body>
        
        <?php
        if(isset($item)) {
        ?>
        
        <h1>Specificaties</h1>
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
        else {
        ?>
        
        <a href="list.php">Verder winkelen</a>
        
        <?php
        }
        ?>
        
    </body>
</html>