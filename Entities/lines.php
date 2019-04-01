<?php  //entities/lines.php FRITUUR

namespace entities;

class Lines {
    
    private $id;
    private $itemId;
    private $orderId;
    private $amount;
    private $extraIdArray = array();
    
    public function __construct($id, $orderId, $itemId, $amount, $extraIdArray) {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->itemId = $itemId;
        $this->amount = $amount;
        $this->extraIdArray = $extraIdArray;
    }
    
    public static function create($id, $orderId, $itemId, $amount, $extraIdArray) {
        $line = new Lines($id, $orderId, $itemId, $amount, $extraIdArray);
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
    
    public function getAmount() {
        $amount = $this->amount;
        return $amount;
    }
    
    public function getExtraIdArray() {
        $extraIdArray = $this->extraIdArray;
        return $extraIdArray;
    }
    
}