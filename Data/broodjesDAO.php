<?php  //data/broodjesDAO BROODJESBAR

require_once("DBconfig.php");
require_once("entities/broodjes.php");

class BroodjesDAO {
    
    public function getList() {
        $sql = "SELECT * FROM broodjes";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $list = array();
            
            foreach($stmt as $row) {
                $broodje = entities\Broodjes::create(
                    $row['ID'],
                    $row['Naam'],
                    $row['Omschrijving'],
                    $row['Prijs']
                );
                array_push($list, $broodje);
            }
        }
        
        $dbh = null;
        
        return $list;
        
    }
    
    public function getIds() {
        $sql = "SELECT id FROM broodjes";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $list = array();
            
            foreach($stmt as $id) {
                array_push($list, $id);
            }
        }
        
        $dbh = null;
        
        return $list;
        
    }

}