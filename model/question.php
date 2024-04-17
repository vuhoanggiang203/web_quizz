<?php
class Question_model
{
    private $conn;

    //variables
    public $id_cauhoi;
    public $title;
    public $dapan1;
    public $dapan2;
    public $dapan3;
    public $dapan4;
    public $dapan;
    //connect_db 
    public function __construct($db)
    {
        $this->conn = $db;
    }
    //read 
    public function read()
    {
        $query = "SELECT  * FROM question     ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function read_one()
    {
        $query = "SELECT  * FROM question where id_cauhoi = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_cauhoi);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id_cauhoi = $row['id_cauhoi'];
        $this->title = $row['title'];
        $this->dapan1 = $row['dapan1'];
        $this->dapan2 = $row['dapan2'];
        $this->dapan3 = $row['dapan3'];
        $this->dapan4 = $row['dapan4'];
        $this->dapan = $row['dapan'];
    }
    public function creat_question()
    {
        $query =  "UPDATE question set title=:title, dapan1=:dapan1 , dapan2=:dapan2, dapan3=:dapan3,dapan4=:dapan4,dapan=:dapan  ";
        $stmt = $this->conn->prepare($query);
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->dapan1 = htmlspecialchars(strip_tags($this->dapan1));
        $this->dapan2 = htmlspecialchars(strip_tags($this->dapan2));
        $this->dapan3 = htmlspecialchars(strip_tags($this->dapan3));
        $this->dapan4 = htmlspecialchars(strip_tags($this->dapan4));
        $this->dapan = htmlspecialchars(strip_tags($this->dapan));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':dapan1', $this->dapan1);
        $stmt->bindParam(':dapan2', $this->dapan2);
        $stmt->bindParam(':dapan3', $this->dapan3);
        $stmt->bindParam(':dapan4', $this->dapan4);
        $stmt->bindParam(':dapan', $this->dapan);
        if ($stmt->execute()) {
            return true;
        }
        print("error %s . \n");
        return false;
    }
    public function update_question()
    {

        $query =  "UPDATE question set title=:title, dapan1=:dapan1 , dapan2=:dapan2, dapan3=:dapan3,dapan4=:dapan4,dapan=:dapan where id_cauhoi=:id_cauhoi";
        $stmt = $this->conn->prepare($query);
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->dapan1 = htmlspecialchars(strip_tags($this->dapan1));
        $this->dapan2 = htmlspecialchars(strip_tags($this->dapan2));
        $this->dapan3 = htmlspecialchars(strip_tags($this->dapan3));
        $this->dapan4 = htmlspecialchars(strip_tags($this->dapan4));
        $this->dapan = htmlspecialchars(strip_tags($this->dapan));
        $this->id_cauhoi = htmlspecialchars(strip_tags($this->id_cauhoi));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':dapan1', $this->dapan1);
        $stmt->bindParam(':dapan2', $this->dapan2);
        $stmt->bindParam(':dapan3', $this->dapan3);
        $stmt->bindParam(':dapan4', $this->dapan4);
        $stmt->bindParam(':dapan', $this->dapan);
        $stmt->bindParam(':id_cauhoi', $this->id_cauhoi);
        if ($stmt->execute()) {
            return true;
        }
        print("error %s . \n");
        return false;
    }
    public function delete_question()
    {
        $query =  "DELETE FROM  question  where id_cauhoi= ? ";
        $stmt = $this->conn->prepare($query);
        $this->id_cauhoi = htmlspecialchars(strip_tags($this->id_cauhoi));
        $stmt->bindParam(1, $this->id_cauhoi);
        if ($stmt->execute()) {
            return true;
        }
        print("error %s . \n");
        return false;
    }
}
