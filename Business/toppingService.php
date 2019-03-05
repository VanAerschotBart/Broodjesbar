<?php  //business/toppingService.php FRITUUR

require_once("data/toppingDAO.php");

class ToppingService {
    
    public function getToppings(){
        $toppingDAO = new ToppingDAO();
        $answer = $ToppingDAO->getToppings();
        return $answer;
    }
}