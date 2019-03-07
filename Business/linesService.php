<?php  //business/linesService.php FRITUUR

require_once("data/linesDAO.php");

class LinesService {

    public function setNewLines($lines) {
        $linesDAO = new LinesDAO();
        $lineDAO->setNewLines($lines);
    }
    
    public function getLinesByOrderId($orderId) {
        $linesDAO = new LinesDAO();
        $lines = $lineDAO->getLinesByOrderId($orderId);
        return $lines;
    }

}