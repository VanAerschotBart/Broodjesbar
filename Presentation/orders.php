<!DOCTYPE HTML>  <!-- presentation/orders.php BROODJESBAR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Broodjesbar</title>
    </head>
    <body>
        <h1>Bestellingen</h1>
            
        <?php
        if($list != null) {
        ?>
        
        <table>
            <tr>
                <th>BestellingsId</th>
                <th>GebruikersId</th>
                <th>Bestelling geplaats op:</th>
                <th>Opmerking</th>
                <th>Status</th>
            </tr>
            
        <?php
            foreach($list as $value) {
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
            print("<h1 style='color: red; text-decoration: underline;'>Er zijn geen bestellingen.</h1>");
        }
        ?>
            
    </body>
</html>
        
        