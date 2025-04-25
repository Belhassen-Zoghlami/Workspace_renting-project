<?php
require_once 'User.php';

class Client extends User {
    public function __construct($firstname, $lastname, $email, $phonenumber, $password) {
        parent::__construct($firstname, $lastname, $email, $phonenumber, $password, 'admin');
    }
}
?>
