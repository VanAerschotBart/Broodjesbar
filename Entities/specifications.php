<?php  //entities/specifications.php FRITUUR

namespace entities;

class Specification {

    private $lineId;
    private $extraId;
    
    public function __construct($lineId, $extraId) {
        $this->lineId = $lineId;
        $this->extraId = $extraId;
    }
    
    public static function create($lineId, $extraId) {
        $line = new Specification($lineId, $extraId);
        return $line;
    }
    
    public function getLineId() {
        $lineId = $this->lineId;
        return $lineId;
    }
    
    public function getExtraId() {
        $extraId = $this->extraId;
        return $extraId;
    }

}