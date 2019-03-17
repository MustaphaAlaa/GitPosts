<?php
/*
	*Create connect info with  database
	*Create Register function 
	*Create Login function
	*Create FindUserByEmail function
	*Create FindUserByPhone function
*/
 class User{
     public function __construct(){
         $this->db = new Database();
     }

     public function register($data=[]){
         $this->db->query('INSERT INTO users (firstName,lastName,email,phoneNumber,password) values(:fname,:lname,:email,:phoneNumber,:password)');
         $this->db->bind(':fname',$data['firstName']);
         $this->db->bind(':lname',$data['lastName']);
         $this->db->bind(':email',$data['email']);
         $this->db->bind(':phoneNumber',$data['phoneNumber']);
         $this->db->bind(':password',$data['password']);

         if($this->db->execute()){
             return true;
         }else{
             $false = false;
             return die( "doesn't Register ".$false);
         }

     }

     public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email',$email);

        $this->db->single();
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
     }

     public function findUserByPhone($phoneNumber){
        $this->db->query('SELECT * FROM users WHERE phoneNumber = :phoneNumber');
        $this->db->bind(':phoneNumber',$phoneNumber);

        $this->db->single();
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
     }

     public function login($email,$password){
        $this->db->query('SELECT * FROM users WHERE email = :email OR phoneNumber = :phoneNumber');
        $this->db->bind(':phoneNumber', $email);
        $this->db->bind(':email', $email);

        $row = $this->db->single();
     	//Make sure that password given matches the hashed password
         $hashedPassword = $row->password;

         if(password_verify($password,$hashedPassword)){
             return $row;
         }else{
             return false;
         }
 
     }


    
       
 }








