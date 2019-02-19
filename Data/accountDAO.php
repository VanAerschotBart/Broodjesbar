<?php  //data/accountDAO.php BROODJESBAR

require_once("DBconfig.php");
require_once("entities/account.php");

class AccountDAO {

    public function setNewUser($account){  
        
        $sql = "INSERT INTO users (name, email, password, employee) VALUES (:name, :email, :password, :employee)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':name' => $account->getName(),
            ':email' => $account->getEmail(),
            ':password' => $account->getPassword(),
            ':employee' => $account->getEmployee()
        ]);

        $accountID = $dbh->lastInsertId();
        $account->setID($accountID);
        
        $dbh = null;
        
        return $account;
    }
    
    public function getByEmail($email) {
        $account = null;
        $sql = "SELECT * FROM users WHERE email = :email";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':email' => $email]);
        
        if ($stmt->rowCount() > 0) {
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $account = entities\Account::create(
                $row['id'],
                $row['name'],
                $row['email'],
                $row['password'],
                $row['employee']
            );
        }
        
        $dbh = null;
        
        return $account;
        
    }

}