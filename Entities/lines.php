<?php  //entities/lines.php FRITUUR

namespace entities;

class Lines {
    
    private $id;
    private $itemId;
    private $orderId;
    private $amount;
    
    public function __construct($id, $itemId, $orderId, $amount) {
        $this->id = $id;
        $this->itemId = $itemId;
        $this->orderId = $orderId;
        $this->amount = $amount;
    }
    
    public static function create($id, $itemId, $orderId, $amount) {
        $line = new Lines($id, $itemId, $orderId, $amount);
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
    
}