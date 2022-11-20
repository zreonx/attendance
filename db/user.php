<?php 

class User {
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function creaeteUser($uname, $pass){
        try {
            $id_check = $this->getUserByUsername($uname);
            if($id_check['num'] > 0){
                return false;
            }else {
            $new_pasword = md5($pass.$uname);
            //query with placeholder
            $sql = "INSERT INTO users (username, password) VALUES (:uname, :pass)";

            //prepare the statement
            $stmt = $this->conn->prepare($sql);

            //bind the placeholder to the actual values
            $stmt->bindparam(':uname', $uname);
            $stmt->bindparam(':pass', $new_pasword);

            //excecute the query
            $stmt->execute();
            return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function loginUser($uname, $pass){
        try {
                $sql = "SELECT * FROM users WHERE username = :uname and password = :pass ;";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(':uname' , $uname);
                $stmt->bindparam(':pass' , $pass);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getUserByUsername($uname){
        $sql = "SELECT COUNT(*) AS num FROM users WHERE username = :uname ;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindparam(':uname' , $uname);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

    }
}