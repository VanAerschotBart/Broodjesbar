<?php  //data/orderDAO.php BROODJESBAR

require_once("DBconfig.php");
require_once("entities/orders.php");
require_once("entities/lines.php");

class OrderDAO {

    public function setNewOrder($order) {
        
        $sql = "INSERT INTO orders (userId, placed, extra, status) VALUES (:userId, :placed, :extra, :status)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':userId' => $order->getUserId(),
            ':placed' => $order->getPlaced(),
            ':extra' => $order->getExtra(),
            ':status' => $order->getStatus()
        ]);
        
        $orderId = $dbh->lastInsertId();
        $order->setId($orderId);
        
        $dbh = null;
        
        return $order;
        
    }

    public function getOrderByOrderId($id) {
        
        $sql = "SELECT * FROM orders WHERE id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        if ($stmt->rowCount() > 0) {
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $order = entities\Orders::create(
                $row['id'],
                $row['userId'],
                $row['placed'],
                $row['extra'],
                $row['status']
            );
        }
        
        $dbh = null;
        
        return $order;
        
    }

    public function getOrdersByUserId($id) {
        $list = array();    
        $sql = "SELECT * FROM orders WHERE userId = :userId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':userId' => $id]);
        
        if ($stmt->rowCount() > 0) {
            
            foreach($stmt as $row) {
                
                $order = entities\Orders::create(
                    $row['id'],
                    $row['userId'],
                    $row['placed'],
                    $row['extra'],
                    $row['status']
                );
                array_push($list, $order);
            }
        }
        
        $dbh = null;
        
        return $list;
        
    }
    
    public function setNewLines($lines) {
        $sql = "INSERT INTO linez (broodjesId, amount, orderId) VALUES ";
        
        foreach($lines as $line) {
            $sql .= "(" . $line->getBroodjesId() . ", " . $line->getAmount() . ", " . $line->getOrderId() . " ), ";
        }
        
        $sql = rtrim($sql, ', ');
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $dbh = null;
    }
    
    public function getAllOrders() {
        $list = array();
        $sql = "SELECT * FROM orders";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            foreach($stmt as $row) {
                
                $order = entities\Orders::create(
                    $row['id'],
                    $row['userId'],
                    $row['placed'],
                    $row['extra'],
                    $row['status']
                );
                array_push($list, $order);
            }
        }
        
        $dbh = null;
        
        return $list;
    }
}