<?php  //entities/orders.php FRITUUR

namespace entities;

class Orders {
    
    private $id;
    private $userId;
    private $placed;
    private $extra;
    private $status;
    
    public function __construct($id, $userId, $placed, $extra, $status) {
        $this->id = $id;
        $this->userId = $userId; 
        $this->placed = $placed;
        $this->extra = $extra;
        $this->status =  $status;
    }
    
    public static function create($id, $userId, $placed, $extra, $status) {
        $order = new Orders($id, $userId, $placed, $extra, $status);
        return $order;
    }
    
    public function setId($id) {
        $this->id = $id;
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
    
    public function getStatus() {
        $status = $this->status;
        return $status;
    }
    
}