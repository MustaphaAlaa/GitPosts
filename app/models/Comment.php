<?php
 class Comment{
     public function __construct(){
         $this->db  = new Database;
     }

     public function addComment($data=[]){
        
        $this->db->query('INSERT INTO comments(user_id, post_owner_id, comment_post_id, comment_text) VALUES (:userId,:postOwner,:postId, :comment)');
        $this->db->bind(':userId', $data['userId']);
        $this->db->bind(':postOwner', $data['postOwner']);
        $this->db->bind(':postId', $data['postId']);
        $this->db->bind(':comment',$data['comment']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

     }

     public function allComments($id){
         $this->db->query('SELECT *,comments.id as commentId , comments.post_owner_id as postOwner FROM comments
          inner join users
          ON comments.user_id = users.id
          WHERE comments.comment_post_id = :id');
         $this->db->bind(':id',$id);
        
         $allComments = $this->db->resultSet();
         if($allComments){
             if($this->db->rowCount() > 0 ){
                return $allComments;
             }
         }else{
             return false;
         }
     }

     public function deleteComment($id){
         $this->db->query('DELETE FROM comments WHERE id = :id');
         $this->db->bind(':id',$id);

         if($this->db->execute()){
             return true;
         }else{
             return false;
         }
        }

        public function getComment($id){
            $this->db->query('SELECT *,comments.user_id as userId FROM comments
            WHERE id = :id');
            

            $this->db->bind(':id',$id);
            
            $comment =  $this->db->single();
            if($comment){
                return $comment;
            }else{
                return false;
            }
           }



           public function editComment($id,$comment){
               $this->db->query('UPDATE comments   WHERE  id = :id  SET comment_text = :comment');
               $this->db->bind(':id',$id);
               $this->db->bind(':comment',$comment);

               if($this->db->execute()){
                   return true;
               }else{
                   die(' SHIT IT IS STOPS ');
               }
           }

 }


