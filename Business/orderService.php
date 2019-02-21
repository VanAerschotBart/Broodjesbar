<?php  //business/orderService.php BROODJESBAR

require_once("data/orderDAO.php");

class OrderService {
    
    public function setNewOrder($order) {
        $orderDAO = new OrderDAO();
        $order = $orderDAO->setNewOrder($order);
        return $order;
    }
    
    public function getOrderByOrderId($id) {
        $orderDAO = new $orderDAO();
        $order = $orderDAO->getByOrderId($id);
        return $order;
    }
    
    public function getOrderByUserId($id) {
        $orderDAO = new $orderDAO();
        $order = $orderDAO->getByUserId($id);
        return $order;
    }
    
    public function setNewLines($lines) {
        $orderDAO = new orderDAO();
        $order = $orderDAO->setNewLines($lines);
        return $order;
    }
    
}