<?php  //data/linesDAO.php FRITUUR

require_once("DBconfig.php");
require_once("entities/lines.php");

class LinesDAO {
    
    public function setNewLines($lines) {
        $sql = "INSERT INTO orderLines (itemId, orderId, amount) VALUES ";
        
        foreach($lines as $line) {
            $sql .= "(" . $line->getBroodjesId() . ", " . $line->getOrderId() . ", " . $line->getAmount() . " ), ";
        }
        
        $sql = rtrim($sql, ', ');
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $dbh = null;
    }
    
}