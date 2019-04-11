<?php  //business/ordersService.php FRITUUR

require_once("data/ordersDAO.php");
require_once("data/linesDAO.php");

class OrdersService {
    
    public function setNewOrder($order) {
        $ordersDAO = new OrdersDAO();
        $ordersDAO->setNewOrder($order);
    }
    
    public function getAllOrders() {
        $orderDAO = new OrdersDAO();
        $orders = $orderDAO->getAllOrders();
        return $orders;
    }
    
    public function getOrderByOrderId($id) {
        $orderDAO = new OrdersDAO();
        $order = $orderDAO->getByOrderId($id);
        return $order;
    }
    
    public function getOrdersByUserId($id) {
        $orderDAO = new OrdersDAO();
        $order = $orderDAO->getOrdersByUserId($id);
        return $order;
    }
    
}