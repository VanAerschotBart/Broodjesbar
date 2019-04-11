<?php  //data/linesDAO.php FRITUUR

require_once("DBconfig.php");
require_once("entities/lines.php");
require_once("business/specificationsService.php");

class LinesDAO {
    
    public function setNewLines($orderId, $lines) {
        
        $sql = "INSERT INTO orderlines (orderId, itemId, note, amount) VALUES ";
        
        foreach($lines as $line) {
            $sql .= "(" . $orderId  . ", " . $line->getItemId() . ", '" . $line->getNote() . "', " . $line->getAmount() . " ), ";
        }
        
        $sql = rtrim($sql, ', ');
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        $linesDAO = new LinesDAO();
        $lineIds = $linesDAO->getLineIdsByOrderId($orderId);
        
        foreach($lines as $line) {
            $lineId =$lineIds[$count];
            $line->setId($lineId);
            $idArray = $line->getExtraIdArray();
            if(!empty($idArray)) {
                $specificationsSvc = new SpecificationsService();
                $specificationsSvc()->setNewSpecifications($line->getId, $line->getExtraIdArray());
            }
            
        }
        
        $dbh = null;
        
    }
    
    public function getLinesByOrderId($orderId) {
        
        $sql = "SELECT * FROM orderlines WHERE orderId = :orderId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':orderId' => $orderId]);
        
        if ($stmt->rowCount() > 0) {
            
            $orderlines = array();
            
            foreach($stmt as $row) {

                $line = entities\Lines::create(
                    $row['id'],
                    $row['orderId'],
                    $row['itemId'],
                    $row['note'],
                    $row['amount'],
                    null  //extraIdArray -> only used for basket
                );
                array_push($orderlines, $item);
            }
            
            $dbh = null;
            return $orderlines;
        }
        else {
            $dbh = null;
        }
        
    }
        
        public function getLineIdsByOrderId($orderId) {
        
        $sql = "SELECT id FROM orderlines WHERE orderId = :orderId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':orderId' => $orderId]);
        
        if ($stmt->rowCount() > 0) {
            
            $lineIds = array();
            
            foreach($stmt as $id) {
                array_push($lineIds, $id);
            }
            
            $dbh = null;
            return $lineIds;
        }
        else {
            $dbh = null;
        }
        
    }
    
}