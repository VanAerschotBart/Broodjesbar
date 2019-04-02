<?php  //data/ordersDAO.php FRITUUR

require_once("DBconfig.php");
require_once("entities/orders.php");

class OrdersDAO {

    public function setNewOrder($order) {
        
        $sql = "INSERT INTO orders (userId, placed, pickup, extra, status) VALUES (:userId, :placed, :extra, :status)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':userId' => $order->getUserId(),
            ':placed' => $order->getPlaced(),
            ':pickup' => $order->getPickup(),
            ':extraNote' => $order->getExtraNote(),
            ':status' => $order->getStatus()
        ]);
        
        $dbh = null;
        
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
                $row["pickup"],
                $row['extraNote'],
                $row['status'],
                null  //orderLines(array) -> only used for basket
            );
            
            $dbh = null;
            return $list;
            
        }
        else {
            $dbh = null;
        }
        
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
                    $row["pickup"],
                    $row['extraNote'],
                    $row['status'],
                    null  //orderLines(array) -> only used for basket
                );
                array_push($list, $order);
                
            }
            
            $dbh = null;
            return $list;
            
        }
        else {
            $dbh = null;
        }
        
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
                    $row["pickup"],
                    $row['extraNote'],
                    $row['status'],
                    null  //orderLines(array) -> only used for basket
                );
                array_push($list, $order);
                
            }
            
            $dbh = null;
            return $list;
            
        }
        else {
            $dbh = null;
        }
        
}