<?php
 class Profile{
     public function __construct(){
         $this->db = new Database;
     }

     public function getPosts($id){
        $this->db->query('SELECT *,
           posts.id as postId,
           users.id as userId,
           posts.created_at as postCreated,
           users.created_at as userCreated,
           posts.user_id as postOwner
         FROM posts
           join users
           ON posts.user_id = users.id
           WHERE posts.user_id = :id');
        $this->db->bind(':id',$id);
               $results = $this->db->resultSet();
           return $results;
    }
 }