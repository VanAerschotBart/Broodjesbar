<?php  //data/orderDAO.php BROODJESBAR

require_once("DBconfig.php");
require_once("entities/orders.php");

class OrderDAO {

    public function setNewOrder($order) {
        
        $sql = "INSERT INTO orders (id, userId, placed, extra) VALUES (:id, :userId, :placed, :extra)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':id' => $order->getID(),
            ':userId' => $order->getUserID(),
            ':placed' => $order->getPlaced(),
            ':extra' => $order->getExtra()
        ]);
        
        $dbh = null;
        
    }

    public function getByOrderId($id) {
        
        $account = null;
        $sql = "SELECT * FROM orders WHERE id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        if ($stmt->rowCount() > 0) {
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $order = entities\Order::create(
                $row['id'],
                $row['userId'],
                $row['placed'],
                $row['extra']
            );
        }
        
        $dbh = null;
        
        return $order;
        
    }

    public function getByUserId($userId) {
            
        $account = null;
        $sql = "SELECT * FROM orders WHERE userId = :userId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        
        if ($stmt->rowCount() > 0) {
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $order = entities\Order::create(
                $row['id'],
                $row['userId'],
                $row['placed'],
                $row['extra']
            );
        }
        
        $dbh = null;
        
        return $order;
        
    }
    
}