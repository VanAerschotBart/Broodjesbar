<?php  //data/specificationDAO.php FRITUUR

require_once("DBconfig.php");
require_once("entities/specifications.php");

class SpecificationDAO {
    
    public function setNewSpecification($specificationArray){
        
        foreach($specificationArray as $row)
        
            $sql = "INSERT INTO specifications (lineId, extraId) VALUES (:lineId, :extraId)";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ':name' => $specification->getLineId(),
                ':email' => $specification->getExtraId()
            ]);
            $dbh = null;
    }

    public function getSpecificationsByLineId($lineId) {
        $sql = "SELECT extraId FROM specifications WHERE lineId = :lineId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(':lineId' => $LineId);
        
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