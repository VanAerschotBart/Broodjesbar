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
                    $row['name'],
                    $row['description'],
                    $row['price']
                );
                array_push($list, $item);
            }
            
            $dbh = null;
            return $list;
        }
        else {
            $dbh = null;
        }
        
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
            
            $dbh = null;
            return $list;
        }
        else {
            $dbh = null;
        }
        
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
                $row['name'],
                $row['description'],
                $row['price']
            );
            $dbh = null;
            return $item;
        }
        else {
            $dbh = null;
        }
         
    }

}