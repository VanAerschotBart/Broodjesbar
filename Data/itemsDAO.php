<?php  //data/itemsDAO.php FRITUUR

require_once("DBconfig.php");
require_once("entities/items.php");

class ItemsDAO {
    
    public function getList() {
        $sql = "SELECT * FROM items";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $list = array();
            
            foreach($stmt as $row) {
                $item = entities\Items::create(
                    $row['id'],
                    $row['naam'],
                    $row['omschrijving'],
                    $row['prijs']
                );
                array_push($list, $item);
            }
        }
        
        $dbh = null;
        return $list;
        
    }
    
    public function getIds() {
        $sql = "SELECT id FROM items";
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
    
    public function getById($id) {
        $sql = "SELECT * FROM items WHERE id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $item = entities\Items::create(
                $row['id'],
                $row['naam'],
                $row['omschrijving'],
                $row['prijs']
            );
        }
        
        $dbh = null;
        return $item;
         
    }

}