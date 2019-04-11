<?php  //entities/lines.php FRITUUR

namespace entities;

class Lines {
    
    private $id;
    private $orderId;
    private $itemId;
    private $note;
    private $amount;
    //private $extraIdArray = array();  //only used for basket!
    
    public function __construct($id, $orderId, $itemId, $note, $amount) {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->itemId = $itemId;
        $this->note = $note;
        $this->amount = $amount;
        //$this->extraIdArray = $extraIdArray;
    }
    
    public static function create($id, $orderId, $itemId, $note, $amount) {
        $line = new Lines($id, $orderId, $itemId, $note, $amount);
        return $line;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        $id = $this->id;
        return $id;
    }
    
    public function getItemId() {
        $itemId = $this->itemId;
        return $itemId;
    }
    
    public function getOrderId() {
        $orderId = $this->orderId;
        return $orderId;
    }
    
    
    public function getNote() {
        $note = $this->note;
        return $note;
    }
    
    public function getAmount() {
        $amount = $this->amount;
        return $amount;
    }
    
    /*public function getExtraIdArray() {
        $extraIdArray = $this->extraIdArray;
        return $extraIdArray;
    }*/
    
}