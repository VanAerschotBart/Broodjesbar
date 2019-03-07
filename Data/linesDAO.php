<?php  //data/linesDAO.php FRITUUR

require_once("DBconfig.php");
require_once("entities/lines.php");

class LinesDAO {
    
    public function setNewLines($lines) {
        $sql = "INSERT INTO orderlines (itemId, orderId, amount) VALUES ";
        
        foreach($lines as $line) {
            $sql .= "(" . $line->getBroodjesId() . ", " . $line->getOrderId() . ", " . $line->getAmount() . " ), ";
        }
        
        $sql = rtrim($sql, ', ');
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $dbh = null;
    }
    
    public function getLinesByOrderId($orderId) {
        
        $sql = "SELECT * FROM orderlines WHERE orderId = :orderId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':orderId' => $orderId]);
        
        if ($stmt->rowCount() > 0) {
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $orderlines = array();

            $line = entities\Lines::create(
                $row['id'],
                $row['orderId'],
                $row['itemId'],
                $row['amount']
            );
            $dbh = null;
            return $orderlines;
        }
        else {
            $dbh = null;
        }
        
        $dbh = null;
        return $orderlines;
        
    }
    
}