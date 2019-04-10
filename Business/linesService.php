<?php  //business/linesService.php FRITUUR

require_once("data/linesDAO.php");

class LinesService {

    public function setNewLine($line) {
        $linesDAO = new LinesDAO();
        $linesDAO->setNewLines($line);
    }
    
    public function getLinesByOrderId($orderId) {
        $linesDAO = new LinesDAO();
        $lines = $lineDAO->getLinesByOrderId($orderId);
        return $lines;
    }

}