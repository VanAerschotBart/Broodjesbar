<?php  //data/extraDAO.php FRITUUR

require_once("DBconfig.php");
require_once("entities/extra.php");

class ExtraDAO {
    
    public function getAll() {
        $sql = "SELECT * FROM extra";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $list = array();

            foreach($stmt as $row) {
                $extra = entities\Extra::create(
                    $row['id'],
                    $row['name'],
                    $row['type']
                );
                array_push($list, $extra);
            }
            $dbh = null;
            return $list;
            
        }
        else {
            $dbh = null;
        }
        
    }
    
    public function getById($id) {
        $sql = "SELECT * FROM extra where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        if ($stmt->rowCount() > 0) {
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $extra = entities\Extra::create(
                $row['id'],
                $row['name'],
                $row['type']
            );
            $dbh = null;
            return $extra;
            
        }
        else {
            $dbh = null;
        }
        
    }
    
    public function getIngredients() {
        $sql = "SELECT * FROM extra WHERE type = 1";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $ingredientList = array();

            foreach($stmt as $row) {
                $ingredient = entities\Extra::create(
                    $row['id'],
                    $row['name'],
                    $row['type']
                );
                array_push($ingredientList, $ingredient);
            }
            $dbh = null;
            return $ingredientList;
            
        }
        else {
            $dbh = null;
        }
        
    }
    
    public function getSauces() {
        $sql = "SELECT * FROM extra WHERE type = 2";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $sauceList = array();

            foreach($stmt as $row) {
                $sauce = entities\Extra::create(
                    $row['id'],
                    $row['name'],
                    $row['type']
                );
                array_push($sauceList, $sauce);
            }
            $dbh = null;
            return $sauceList;
            
        }
        else {
            $dbh = null;
        }
        
    }
    
    public function getToppings() {
        $sql = "SELECT * FROM extra WHERE type = 3";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $ToppingList = array();

            foreach($stmt as $row) {
                $topping = entities\Extra::create(
                    $row['id'],
                    $row['name'],
                    $row['type']
                );
                array_push($ToppingList, $topping);
            }
            $dbh = null;
            return $ToppingList;
            
        }
        else {
            $dbh = null;
        }
        
    }
    
    public function getAllIds() {
        $sql = "SELECT id FROM extra";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $IdList = array();

            foreach($stmt as $id) {
                array_push($IdList, $id['id']);
            }
            $dbh = null;
            return $IdList;
            
        }
        else {
            $dbh = null;
        }
        
    }
    
    public function getIngredientIds() {
        $sql = "SELECT id FROM extra WHERE type = 1";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $ingredientIdList = array();

            foreach($stmt as $ingredientId) {
                array_push($ingredientIdList, $ingredientId);
            }
            $dbh = null;
            return $ingredientIdList;
            
        }
        else {
            $dbh = null;
        }
        
    }
    
    public function getSauceIds() {
        $sql = "SELECT id FROM extra WHERE type = 2";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $sauceIdList = array();

            foreach($stmt as $sauceId) {
                array_push($sauceIdList, $sauceId);
            }
            $dbh = null;
            return $sauceIdList;
            
        }
        else {
            $dbh = null;
        }
        
    }
    
    public function getToppingIds() {
        $sql = "SELECT id FROM extra WHERE type = 3";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $toppingIdList = array();

            foreach($stmt as $toppingId) {
                array_push($toppingIdList, $toppingId);
            }
            $dbh = null;
            return $toppingIdList;
            
        }
        else {
            $dbh = null;
        }
    }
    
}