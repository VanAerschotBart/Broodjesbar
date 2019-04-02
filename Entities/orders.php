<?php  //entities/orders.php FRITUUR

namespace entities;

class Orders {
    
    private $id;
    private $userId;
    private $placed;
    //private $pickup;  //TO DO
    private $extra;
    private $status;
    private $orderLines = array();
    
    public function __construct($id, $userId, $placed, $extra, $status, $orderLines) {
        $this->id = $id;
        $this->userId = $userId; 
        $this->placed = $placed;
        $this->extra = $extra;
        $this->status =  $status;
        $this->orderLines = $orderLines;
    }
    
    public static function create($id, $userId, $placed, $extra, $status, $orderLines) {
        $order = new Orders($id, $userId, $placed, $extra, $status, $orderLines);
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
    
    public function getOrderLines() {
        $orderLines = $this->orderLines;
        return $orderLines;
    }
    
}