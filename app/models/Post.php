<?php
class Post extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $this->db->query("SELECT *,
                                post.date as postDate,
                                post.postid as postId,
                                post.time as postTime,
                                post.userid as userId,
                                user.username as userName
                                 FROM post
                                 INNER JOIN user
                                 ON post.userid= user.userid
                                 ORDER BY post.date DESC");
        $results = $this->db->resultSet();
        return $results;
    }

    public function addPost($data)
    {
        $this->db->query("INSERT INTO post (userid,title,description) VALUES (:userid,:title,:description)");
        // Bind Values
        $this->db->bind(':userid', $data['userid']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['desc']);

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updatePost($data)
    {
        $this->db->query("UPDATE post SET title=:title, description=:description WHERE postid=:id");
        // Bind Values
        $this->db->bind(':id', $data['postid']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['desc']);

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getPostById($id)
    {
        $this->db->query("SELECT * from post WHERE postid=:id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }



}