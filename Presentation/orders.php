<!DOCTYPE HTML>  <!-- presentation/orders.php BROODJESBAR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Broodjesbar</title>
    </head>
    <body>
        <h1>Bestellingen</h1>
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
                print("
                    <tr>
                        <td>" . $value->getId() . "</td>
                        <td>" . $value->getUserId() . "</td>
                        <td>" . $value->getPlaced() . "</td>
                        <td>" . $value->getExtra() . "</td>
                        <td>" . $value->getStatus() . "</td>
                    </tr>
                ");
            }
            ?>
            
        </table>
    </body>
</html>
        
        