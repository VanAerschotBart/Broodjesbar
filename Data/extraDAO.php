<?php  //data/DAO.php FRITUUR

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
    
    public function getIngredientIds() {
        $sql = "SELECT id FROM extra WHERE type = 1";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            
            $ingredientIdList = array();

            foreach($stmt as $row) {
                $ingredientId = entities\Extra::create(
                    $row['id'],
                    $row['name'],
                    $row['type']
                );
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
            
            $list = array();

            foreach($stmt as $row) {
                $list = entities\Extra::create(
                    $row['id'],
                    $row['name'],
                    $row['type']
                );
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
            
            $ToppingIdList = array();

            foreach($stmt as $row) {
                $toppingId = entities\Extra::create(
                    $row['id'],
                    $row['name'],
                    $row['type']
                );
                array_push($ToppingIdList, $toppingId);
            }
            $dbh = null;
            return $ToppingIdList;
            
        }
        else {
            $dbh = null;
        }
    }
    
}