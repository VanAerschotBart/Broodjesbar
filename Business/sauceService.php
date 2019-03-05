<?php  //business/sauceService.php FRITUUR

require_once("data/sauceDAO.php");

class SauceService {
    
    public function getSauces(){
        $sauceDAO = new SauceDAO();
        $answer = $SauceDAO->getSauces();
        return $answer;
    }
}