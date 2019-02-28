<?php  //entities/items.php FRITUUR

namespace entities;

class Items {
    
    private $id;
    private $name;
    private $description;
    private $price;
    
    public function __construct($id, $name, $description, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
    
    public static function create($id, $name, $description, $price) {
        $list = new Items($id, $name, $description, $price);
        return $list;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        $id = $this->id;
        return $id;
    }
    
    public function getName() {
        $name = $this->name;
        return $name;
    }
    
    public function getDescription() {
        $description = $this->description;
        return $description;
    }
    
    public function getPrice() {
        $price = $this->price;
        return $price;
    }
    
}