<?php  //entities/orders.php BROODJESBAR

namespace orders;

class Orders {
    
    private $id;
    private $userId;
    private $placed;
    private $extra;
    
    public function __construct($id, $userId, $placed, $extra) {
        $this->id = $id;
        $this->userId = $userId; 
        $this->placed = $placed;
        $this->extra = $extra;
    }
    
    public static function create($id, $userId, $placed, $extra) {
        $order = new Order($id, $userId, $placed, $extra);
        return $order;
    }
    
    public function getID() {
        $id = $this->id;
        return $id;
    }
    
    public function getUserID() {
        $userId = $this->userId;
        return $userId;
    }
    
    public function getPlaced() {
        $placed = $this->placed;
        return $placed;
    }
    
    public function getExtra() {
        $extra = $this->extra;
        return $extra;
    }
    
}