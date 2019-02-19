<?php  //business/accountService.php BROODJESBAR

require_once("data/accountDAO.php");

class AccountService {
    
    public function setNewUser($account) {
        $accountDAO = new AccountDAO();
        $account = $accountDAO->setNewUser($account);
        return $account;
    }
    
    public function getByEmail($email) {
        $accountDAO = new AccountDAO();
        $account = $accountDAO->getByEmail($email);
        return $account;
    }
    
}