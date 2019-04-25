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
    
    public function deleteItem($id) {
        $itemsDAO = new ItemsDAO();
        $answer = $itemsDAO->deleteItem($id);
    }
    
    public function adjustItem() {
        $itemsDAO = new ItemsDAO();
        $answer = $itemsDAO->deleteItem();
    }
    
}

//INSERT INTO items (name, description, price) VALUES ("test", "testerdetest", 5);
// Wrap kip/spek	Kip natuur, spek, BBQ saus, sla, tomaat en komkommer	4.00 