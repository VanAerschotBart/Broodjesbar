<?php  //business/ingredientService.php FRITUUR

require_once("data/ingredientDAO.php");

class IngredientService {
    
    public function getIngredients(){
        $ingredientDAO = new ingredientDAO();
        $answer = $ingredientDAO->getIngredients();
        return $answer;
    }
}