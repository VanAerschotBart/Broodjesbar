<?php  //business/extraService.php FRITUUR

require_once("data/extraDAO.php");

class ExtraService {
    
    public function getAll(){
        $extraDAO = new SauceDAO();
        $answer = $extraDAO->getAll();
        return $answer;
    }
    
    public function getById($id) {
        $extraDAO = new ExtraDAO();
        $answer = $extraDAO->getById($id);
        return $answer;
    }
    
    
    public function getIngredients(){
        $extraDAO = new ExtraDAO();
        $answer = $extraDAO->getIngredients();
        return $answer;
    }
    
    public function getSauces(){
        $extraDAO = new ExtraDAO();
        $answer = $extraDAO->getSauces();
        return $answer;
    }
    
    public function getToppings(){
        $extraDAO = new ExtraDAO();
        $answer = $extraDAO->getToppings();
        return $answer;
    }
    
    public function getAllIds() {
        $extraDAO = new ExtraDAO();
        $answer = $extraDAO->getAllIds();
        return $answer;
    }
    
    public function getIngredientIds() {
        $extraDAO = new ExtraDAO();
        $answer = $extraDAO->getIngredientIds();
        return $answer;
    }
    
    public function getSauceIds() {
        $extraDAO = new ExtraDAO();
        $answer = $extraDAO->getSauceIds();
        return $answer;
    }
    
    public function getToppingIds() {
        $extraDAO = new ExtraDAO();
        $answer = $extraDAO->getToppingIds();
        return $answer;
    }

}