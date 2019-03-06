<?php  //entities/extra.php FRITUUR

namespace entities;

class Extra {
    
    private $id;
    private $name;
    private $type;
    
    public function __construct($id, $name, $type) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
    }
    
    public static function create($id, $name, $type) {
        $extra = new Extra($id, $name, $type);
        return $extra;
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
    
    public function getType() {
        $type = $this->type;
        return $type;
    }

}