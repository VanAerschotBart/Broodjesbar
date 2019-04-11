<?php  //data/specificationsDAO.php FRITUUR

require_once("DBconfig.php");
require_once("entities/specifications.php");

class SpecificationsDAO {
    
    public function setNewSpecifications($specificationsArray){
        $sql = "INSERT INTO specifications (lineId, extraId) VALUES ";
        
        foreach($specificationsArray as $specification) {
            var_dump($specification->getLineId());
            var_dump($specification->getExtraId());
            $sql .= "(" . $specification->getLineId()  . ", " . $specification->getExtraId() . "), ";
        }
        
        $sql = rtrim($sql, ', ');
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $dbh = null;
    }

    public function getSpecificationsByLineId($lineId) {
        $sql = "SELECT extraId FROM specifications WHERE lineId = :lineId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':lineId' => $LineId]);
        
        if ($stmt->rowCount() > 0) {
            $list = array();

            foreach($stmt as $specification) {
                array_push($list, $specification);
            }
            
            $dbh = null;
            return $list;
            
        }
        else {
            $dbh = null;
        }
        
    }

}