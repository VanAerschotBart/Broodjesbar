<?php  //business/linesService.php FRITUUR

require_once("data/linesDAO.php");

class LinesService {

    public function setNewLines($orderId, $lines) {
        $linesDAO = new LinesDAO();
        $linesDAO->setNewLines($orderId, $lines);
    }
    
    public function getLinesByOrderId($orderId) {
        $linesDAO = new LinesDAO();
        $lines = $lineDAO->getLinesByOrderId($orderId);
        return $lines;
    }

}