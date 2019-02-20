<?php  //business/orderService.php BROODJESBAR

require_once("data/orderDAO.php");

class AccountService {
    
    public function setNewOrder($order) {
        $orderDAO = new OrderDAO();
        $order = $orderDAO->setNewOrder($order);
        return $order;
    }
    
    public function getByOrderId($id) {
        $orderDAO = new $orderDAO();
        $order = $orderDAO->getByOrderId($id);
        return $order;
    }
    
    public function getByUserId($id) {
        $orderDAO = new $orderDAO();
        $order = $orderDAO->getByUserId($id);
        return $order;
    }
    
}