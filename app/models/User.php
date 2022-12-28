<?php
class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Sign up user
    public function signup($data){
        $this->db->query('INSERT INTO users (firstName, lastName, email, password)VALUES (:firstName, :lastName, :email, :password)');

        // Bind values
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // Execute
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }

    }

    // Login user
    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else{
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        

        //check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

        
}