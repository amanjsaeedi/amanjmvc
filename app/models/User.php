<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;

    }

    // Register user
    public function register($data)
    {
        $this->db->query("INSERT INTO user (username,email,password,name) VALUES (:username,:email,:password,:name)");
        // Bind Values
        $this->db->bind(':username', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':name', $data['name']);

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // login user
    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM user WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashed_password = $row->password;
        //if (password_verify($password, $hashed_password)) {
        if ($password == $hashed_password) {
            return $row;
        } else {
            return false;
        }
    }
    // find User by name
    public function findUserByName($name)
    {
        $this->db->query('SELECT * FROM user WHERE username= :name');
        // Bind Values
        $this->db->bind(':name', $name);

        $row = $this->db->single();

        // check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // get user by id
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM user WHERE userid= :id');
        // Bind Values
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
    }
}