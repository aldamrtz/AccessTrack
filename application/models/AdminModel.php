<?php
class AdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAdminByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
