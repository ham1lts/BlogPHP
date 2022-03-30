<?php

class Post
{

    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function myPosts()
    {
        $this->db->query("SELECT posts.id id,posts.created_at created_at,text,tittle,users.id user_id,users.name name FROM posts LEFT JOIN users ON posts.user_id = users.id");
        return $this->db->results();
    }

    public function registerPost($user_id, $data)
    {
        $this->db->query("INSERT INTO posts (user_id,tittle, text) VALUES (:user_id,:tittle, :text)");

        $this->db->bind("user_id", $user_id);
        $this->db->bind("tittle", $data['titulo']);
        $this->db->bind("text", $data['texto']);

        if ($this->db->executa()) {
            return true;
        }
    }

    public function updatedPost($data)
    {
        $this->db->query("UPDATE posts SET tittle = :tittle, text = :text WHERE id =:id");

        $this->db->bind("tittle", $data['titulo']);
        $this->db->bind("id", $data['id']);
        $this->db->bind("text", $data['texto']);

        if ($this->db->executa()) {
            return true;
        }
    }
  
    public function lerPostPorId($id)
    {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->result();
    }

    public function deletePost($id)
    {
        $this->db->query("DELETE FROM posts  WHERE id = :id");
        $this->db->bind("id", $id);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
