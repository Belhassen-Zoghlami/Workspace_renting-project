<?php
class User {
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $phonenumber;
    protected $password_hash;
    protected $privileges;
    protected $created_at;

    public function __construct($firstname, $lastname, $email, $phonenumber, $password, $privileges = 'client') {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->password_hash = password_hash($password, PASSWORD_DEFAULT);
        $this->privileges = $privileges;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function save($conn) {
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, phonenumber, password_hash, privileges, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $this->firstname, $this->lastname, $this->email, $this->phonenumber, $this->password_hash, $this->privileges, $this->created_at);
        return $stmt->execute();
    }
}
?>
