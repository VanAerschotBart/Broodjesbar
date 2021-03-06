<?php  //entities/account.php FRITUUR

namespace entities;

class Account {
    
    private $id;
    private $name;
    private $email;
    private $password;
    private $employee;
    
    public function __construct($id, $name, $email, $password, $employee) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->employee = $employee;
    }
    
    public static function create($id, $name, $email, $password, $employee) {
        $user = new Account($id, $name, $email, $password, $employee);
        return $user;
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
    
    public function getEmail() {
        $email = $this->email;
        return $email;
    }
    
    public function getPassword() {
        $password = $this->password;
        return $password;
    }
    
    public function getEmployee() {
        $employee = $this->employee;
        return $employee;
    }
    
}
