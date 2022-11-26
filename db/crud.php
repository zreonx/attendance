<?php
    
    class crud {
        
        private $db;
        
        function __construct($conn){
            $this->db = $conn;
        }

        public function registerMember($fname, $lname, $specialty, $dob, $email, $number, $avatar_path){
            try {
                //query with placeholder
                $active = "active";
                $sql = "INSERT INTO attendee (firstname, lastname, specialty_id, dateofbirth, email, contact, avatar_path, status) VALUES (:fname, :lname, :specialty, :dob, :email, :number, :avatar_path, :status)";

                //prepare the statement
                $stmt = $this->db->prepare($sql);

                //bind the placeholder to the actual values
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':specialty', $specialty);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':number', $number);
                $stmt->bindparam(':avatar_path', $avatar_path);
                $stmt->bindparam(':status', $active);

                //excecute the query
                $stmt->execute();
                return true;


            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails($id){
            try {

                $sql = "SELECT * FROM attendee a INNER JOIN specialty s ON a.specialty_id = s.specialty_id WHERE id = :id OR email = :email ;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':email' , $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

           } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
           }
            
        }

        public function updateDetails($id, $fname, $lname, $specialty, $dob, $email, $number) {
            try {
                $sql = "UPDATE attendee SET firstname = :fname , lastname = :lname , specialty_id = :specialty , dateofbirth = :dob , email = :email , contact = :number WHERE id = :id ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':specialty', $specialty);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':number', $number);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function getAttendees(){
           try {

                //inner join - joining data between two table that are in common, foreign key
                //dual select
                 $sql = "SELECT * FROM attendee, specialty WHERE attendee.specialty_id = specialty.specialty_id AND attendee.status = 'active' ";
                //$sql = "SELECT * FROM attendee a INNER JOIN specialty s ON a.specialty_id = s.specialty_id WHERE a.status = active ORDER BY id ;";
                //query specific sql
                $result = $this->db->query($sql);
                return $result;

           } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
           }
        }

        public function getSpecialty(){
            try {
                $sql = "SELECT * FROM specialty";
                $result = $this->db->query($sql);
                return $result;

           } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
           }
            
        }

        public function getSpecialtyById($id){
            try {
                $sql = "SELECT * FROM specialty WHERE specialty_id = :id ;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id' , $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

           } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
           }
            
        }

        public function checkEmail($email) {
            try {
                $sql = "SELECT * FROM attendee WHERE email = :email ;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email', $email);
                $stmt->execute();
                $result = $stmt->fetch();
                if($result > 0) {
                    return true;
                }else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage(); 
            }
        }

        public function deleteAttendee($id){
            try {
                $sql = "DELETE FROM attendee WHERE id = :id ;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id' , $id);
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }

        }
        
    }