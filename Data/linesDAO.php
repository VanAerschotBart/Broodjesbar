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
    
    public function getLinesByOrderId($id) {
        
        $sql = "SELECT * FROM orderLines WHERE id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        if ($stmt->rowCount() > 0) {
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $order = entities\Orders::create(
                $row['id'],
                $row['itemId'],
                $row['orderId'],
                $row['extra'],
                $row['status']
            );
        }
        
        $dbh = null;
        
        return $order;
        
    }
    
}