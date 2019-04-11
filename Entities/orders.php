<?php  //entities/orders.php FRITUUR

namespace entities;

class Orders {
    
    private $id;
    private $userId;
    private $placed;
    private $pickup;
    private $extraNote;
    private $status;
    private $orderLines = array();  //only used for basket!
    
    public function __construct($id, $userId, $placed, $pickup, $extraNote, $status, $orderLines) {
        $this->id = $id;
        $this->userId = $userId; 
        $this->placed = $placed;
        $this->pickup = $pickup;
        $this->extraNote = $extraNote;
        $this->status =  $status;
        $this->orderLines = $orderLines;
    }
    
    public static function create($id, $userId, $placed, $pickup, $extraNote, $status, $orderLines) {
        $order = new Orders($id, $userId, $placed, $pickup, $extraNote, $status, $orderLines);
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
    
    public function getPickup() {
        $pickup = $this->pickup;
        return $pickup;
    }
    
    public function getExtraNote() {
        $extraNote = $this->extraNote;
        return $extraNote;
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