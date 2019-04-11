<?php  //business/specificationsService.php FRITUUR

require_once("data/specificationsDAO.php");

class SpecificationsService {

    public function setNewSpecifications($lineId, $specificationsArray){
        $specificationsDAO = new SpecificationsDAO();
        $specificationsDAO->setNewSpecifications($lineId, $specificationsArray);
    }

    public function getSpecificationsByLineId($lineId){
        $specificationsDAO = new SpecificationsDAO();
        $specificationsDAO->getSpecificationsByLineId($lineId);
    }
    
}