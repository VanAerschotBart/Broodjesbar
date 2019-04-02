<!DOCTYPE HTML>  <!-- presentation/orders.php FRITUUR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Frituur</title>
    </head>
    <body>
        <h1>Bestellingen</h1>
        
        <?php
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
        <form action="placer.php" method="POST">
            <textarea name="extraNote"></textarea><br>
            <select>
                
            <?php
                for($i=0; $i<5; $i++) {
            ?> 
                
                <option><?php print($dateTime); ?></option>
                
            <?php
                }
            ?>
                
            </select>
            <input type="submit" value="Bestellen">
        </form>
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
        
        