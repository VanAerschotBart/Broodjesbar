<?php  //business/ordersService.php FRITUUR

require_once("data/ordersDAO.php");
require_once("data/linesDAO.php");

class OrderService {
    
    public function setNewOrder($order) {
        $ordersDAO = new OrdersDAO();
        $ordersDAO->setNewOrder($order);
    }
    
    public function getAllOrders() {
        $orderDAO = new OrderDAO();
        $orders = $orderDAO->getAllOrders();
        return $orders;
    }
    
    public function getOrderByOrderId($id) {
        $orderDAO = new OrderDAO();
        $order = $orderDAO->getByOrderId($id);
        return $order;
    }
    
    public function getOrdersByUserId($id) {
        $orderDAO = new OrderDAO();
        $order = $orderDAO->getOrdersByUserId($id);
        return $order;
    }
    
    public function setNewLines($lines) {
        $linesDAO = new LinesDAO();
        $linesDAO->setNewLines($lines);
    }
    
}