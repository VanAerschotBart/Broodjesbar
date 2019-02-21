<?php  //entities/lines.php BROODJESBAR

namespace entities;

class Lines {
    
    private $broodjesId;
    private $amount;
    private $orderId;
    
    public function __construct($broodjesId, $amount, $orderId) {
        $this->broodjesId = $broodjesId;
        $this->amount = $amount;
        $this->orderId = $orderId;
    }
    
    public static function create($broodjesId, $amount, $orderId) {
        $user = new Line($broodjesId, $amount, $orderId);
        return $user;
    }
    
    public function getBroodjesId() {
        $broodjesId = $this->broodjesId;
        return $broodjesId;
    }
    
    public function getAmount() {
        $amount = $this->amount;
        return $amount;
    }
    
    public function getOrderId() {
        $orderId = $this->orderId;
        return $orderId;
    }
    
}