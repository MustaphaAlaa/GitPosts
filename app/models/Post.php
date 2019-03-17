<?php
 class Post{
     public function __construct(){
         $this->db = new Database;
     }

     public function getPosts(){
         $this->db->query('SELECT *,
            posts.id as postId,
            users.id as userId,
            posts.created_at as postCreated,
            users.created_at as userCreated,
            posts.user_id as postOwner
          FROM posts
            join users
            ON posts.user_id = users.id
            ORDER BY postCreated DESC');
                $results = $this->db->resultSet();
            return $results;
     }

     public function addPost($data=[]){
         $this->db->query('INSERT INTO posts (body,title,user_id) values (:body,:title,:user_id)');
         $this->db->bind(':body',$data['body']);
         $this->db->bind(':title',$data['title']);
         $this->db->bind(':user_id',$data['user_id']);

         if($this->db->execute()){
             return true;
         }else{
             return false;
         }

     }

     //Get Post by id 
     public function getPostById($id){
        $this->db->query('SELECT *,
                            posts.id as postId,
                            users.id as userId,
                            posts.created_at as postCreated,
                            users.created_at as userCreated,
                            posts.user_id as postOwner
                         FROM posts
                         join users
                         on posts.user_id = users.id
                         Where posts.id  = :id');
        $this->db->bind(':id',$id);
        $row = $this->db->single();
        if($row){
            return $row;
        }else{
            return false;
        }
     }

     public function updatePost($data=[]){
         $this->db->query('UPDATE posts set title = :title , body = :body WHERE id = :id');
         $this->db->bind(':title',$data['title']);
         $this->db->bind(':body', $data['body']);
         $this->db->bind(':id', $data['id']);

         if($this->db->execute()){
             return true;
         }else{
             return false;
         }
     }


     public function deletePost($id){
         $this->db->query('DELETE FROM POSTS WHERE id = :id');
         $this->db->bind('id',$id);
         
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
     }
 }