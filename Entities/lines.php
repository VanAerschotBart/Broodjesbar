<?php  //entities/lines.php FRITUUR

namespace entities;

class Lines {
    
    private $id;
    private $itemId;
    private $orderId;
    private $amount;
    private $specifications = array();
    
    public function __construct($id, $orderId, $itemId, $amount, $extraArray) {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->itemId = $itemId;
        $this->amount = $amount;
        
        if ($extraArray != null) {
            
            foreach ($extraArray as $extra) {
                array_push($specifications);
            }
            
        }
        
    }
    
    public static function create($id, $orderId, $itemId, $amount) {
        $line = new Lines($id, $orderId, $itemId, $amount);
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