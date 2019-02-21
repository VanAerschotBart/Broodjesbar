<?php  //entities/orders.php BROODJESBAR

namespace entities;

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
    
    public static function create($userId, $placed, $extra, $status) {
        $order = new Order($userId, $placed, $extra, $status);
        return $order;
    }
    
    public function getId() {
        $id = $this->id;
        return $id;
    }
    
    public function getUserId() {
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