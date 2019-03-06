<?php  //business/itemsService.php FRITUUR

require_once("data/itemsDAO.php");

class ItemsService {
    
    public function getList(){
        $itemsDAO = new ItemsDAO();
        $answer = $itemsDAO->getList();
        return $answer;
    }
    
    public function getIds() {
        $itemsDAO = new ItemsDAO();
        $answer = $itemsDAO->getIds();
        return $answer;
    }
    
    public function getById($id) {
        $itemsDAO = new ItemsDAO();
        $answer = $itemsDAO->getById($id);
        return $answer;
    }
    
}