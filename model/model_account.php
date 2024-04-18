<?php
class model_account
{
    private $conn;

    //variables
    public $id_user;
    public $name;
    public $user_name;
    public $pass;
    public $sdt;
    public $role;

    //connect_db 
    public function __construct($db)
    {
        $this->conn = $db;
    }
    //read 
    public function read()
    {
        $query = "SELECT  * FROM account     ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function read_one()
    {
        $query = "SELECT  * FROM account where id_cauhoi = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_user);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id_user = $row['id_user'];
        $this->name = $row['name'];
        $this->user_name = $row['user_name'];
        $this->pass = $row['pass'];
        $this->sdt = $row['sdt'];
        $this->role = $row['role'];
    }
}