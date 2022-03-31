<?php

class USerAdmin
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function checkEmailsAlreadyExists($email)
    {
        $this->db->query("SELECT email FROM admin_user WHERE email = :email");
        $this->db->bind("email", $email);

        if ($this->db->results()) {
            return true;
        } else {
            return false;
        }
    }

    public function registerUser($data)
    {
        $this->db->query("INSERT INTO admin_user (user_name,name, email, password) VALUES (:user_name,:name,:email,:senha)");

        $this->db->bind("user_name", $data['usuario']);
        $this->db->bind("name", $data['nome']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("senha", $data['senha']);

        if ($this->db->executa()) {
            return true;
        }
    }

    public function login($login, $senha)
    {
        $this->db->query("SELECT * FROM admin WHERE email = :login OR user_name = :login");
        $this->db->bind("login", $login);

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
    public function userIsValid($user)
    {
        $this->db->query("SELECT user_name FROM admin_user WHERE user_name = :user");
        $this->db->bind("user", $user);

        if ($this->db->results()) {
            return true;
        } else {
            return false;
        }
    }

    public function lerUsuarioPorId($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->result();
    }



}
