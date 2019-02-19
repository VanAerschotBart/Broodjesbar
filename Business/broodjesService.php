<?php  //business/broodjesService.php BROODJESBAR

require_once("data/broodjesDAO.php");

class BroodjesService {
    
    public function getList(){
        $broodjesDAO = new BroodjesDAO();
        $answer = $broodjesDAO->getList();
        return $answer;
    }
    
    public function getIds() {
        $broodjesDAO = new BroodjesDAO();
        $answer = $broodjesDAO->getIds();
        return $answer;
    }
    
}