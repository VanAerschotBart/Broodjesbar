<?php  //business/specificationsService.php FRITUUR

require_once("data/specificationsDAO.php");

class SpecificationsService {

    public function setNewSpecifications($specificationsArray){
        $specificationsDAO = new SpecificationsDAO();
        $specificationsDAO->setNewSpecifications($specificationsArray);
    }

    public function getSpecificationsByLineId($lineId){
        $specificationsDAO = new SpecificationsDAO();
        $specificationsDAO->getSpecificationsByLineId($lineId);
    }
    
}