<!DOCTYPE HTML>  <!-- presentation/listUser.php BROODJESBAR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Broodjesbar</title>
    </head>
    <body>
        <h1>Lijst</h1>
        
        <?php
        if(isset($_SESSION["employee"])) {
        ?>
                    
            <a href='logout.php'>Afmelden</a>
        
            <?php
            if($_SESSION["employee"] == 0) {
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
                
            foreach($list as $value) {
                print("
                    <tr>
                        <td>" . $value->getName() . "</td>
                        <td>" . $value->getDescription() . "</td>
                        <td>" . $value->getPrice() . "</td>
                        <td>
                    ");
                    
                if($_SESSION["employee"] == 1) {
                    print("<a href='adjust.php?id='" . $value->getId() . "'>Aanpassen</a>");
                    print("<a href='delete.php?id='" . $value->getId() . "'>Verwijderen</a>");
                }
                else {
                    print("<input type='number' name='" . $value->getId() . "' min='0' max='50'>");
                    }
                      
                }
            ?>
                            
                        </td>
                    </tr>  
                </table>
    
            <?php
            if($_SESSION["employee"] == 0) {
            ?>
    
                <input type='text' name='sidenote' placeholder='extra opmerkingen'>
                <input type='hidden' name='order'>
                <input type='submit' value='bestellen'>
                <input type='reset' value='reset'>
            </form>
        
        <?php  
            }
        }
        else{
            ?>
        
                <form action='login.php' method='POST'>
            
                <?php            
                if(isset($_COOKIE["user"])) {
                    $mail = $_COOKIE["user"];
                    print("Email:<input type='email' name='email' value='" . $mail . "' required>");
                }
                else {
                    print("Email:<input type='email' name='email' required>");
                }                
                ?>
            
                    Wachtwoord:<input type='password' name='password' required>
                    <input type='submit' value='Inloggen'>
                </form>
                <a href='register.php'>Registreer</a>
                <table>
                    <tr>
                        <th>Broodje</th>
                        <th>Beschrijving</th>
                        <th>Prijs (€)</th>
                    </tr>
                    
            <?php
            foreach($list as $value) {
                print("
                    <tr>
                        <td>" . $value->getName() . "</td>
                        <td>" . $value->getDescription() . "</td>
                        <td>" . $value->getPrice() . "</td>
                    </tr>                
                ");
            }
            ?>
                    
        </table>
        
        <?php
        }
        print($user->getID());
        ?>
        
    </body>
</html>