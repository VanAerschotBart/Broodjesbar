<?php  //business/orderService.php BROODJESBAR

require_once("data/orderDAO.php");

class OrderService {
    
    public function setNewOrder($order) {
        $orderDAO = new OrderDAO();
        $order = $orderDAO->setNewOrder($order);
        return $order;
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
        $orderDAO = new OrderDAO();
        $order = $orderDAO->setNewLines($lines);
        return $order;
    }
    
}