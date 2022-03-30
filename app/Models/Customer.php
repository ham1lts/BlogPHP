<?php

class Customer
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function checkEmailsAlreadyExists($email)
    {
        $this->db->query("SELECT email FROM users WHERE email = :email");
        $this->db->bind("email", $email);

        if ($this->db->results()) {
            return true;
        } else {
            return false;
        }
    }

    public function registerUser($data)
    {
        $this->db->query("INSERT INTO users (name, email, password) VALUES (:name,:email,:senha)");

        $this->db->bind("name", $data['nome']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("senha", $data['senha']);

        if ($this->db->executa()) {
            return true;
        }
    }

    public function login($email, $senha)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind("email", $email);

        if ($result = $this->db->result()) {
            if (password_verify($senha, $result->password)) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function lerUsuarioPorId($id){
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->result();
    }

}
