<?php
 class Users extends Controller {
 	public function __construct(){
 		$this->userModel = $this->model('User');
 	}

 	 	public function register(){
			if(isLoggedIn()){
				redirect('posts/index');
			}
 		if($_SERVER['REQUEST_METHOD'] == 'POST'){
 			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

 			$data=[
 				'firstName' => trim(ucwords($_POST['firstName'])),
 				'lastName' => trim(ucwords($_POST['lastName'])),
 				'email' => trim($_POST['email']),
 				'phoneNumber' => trim($_POST['phoneNumber']),
 				'password' => trim($_POST['password']),
 				'confirmPassword' => trim($_POST['confirmPassword']),
 				'firstName_err' => '',
 				'lastName_err' => '',
 				'email_err' => '',
 				'phoneNumber_err' => '',
 				'password_err' => '',
 				'confirmPassword_err' => ''
  			];

  			//Validate Email
  			if(empty($data['email'])){
  				$data['email_err'] = 'Email is Requier';
  			}else{
  				if(filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
  					if($this->userModel->findUserByEmail($data['email'])){
  						$data['email_err'] = 'Email is already taken';
  					}
  				}
  			}

  			//Validate phoneNumber
  			if(empty($data['phoneNumber'])){
  				$data['phoneNumber_err'] = 'Phone Number is Require';
  			}else{
  				if(filter_var($data['phoneNumber'], FILTER_SANITIZE_STRING)){
  					if($this->userModel->findUserByPhone($data['phoneNumber'])){
  						$data['phoneNumber_err'] = 'phoneNumber is already taken';
  					}
  				}
  			}

  			//Validate names
  			if(empty($data['firstName'])){
  				$data['firstName_err'] = 'Name is Require';
  			}else{
  				if(filter_var($data['firstName'], FILTER_SANITIZE_STRING)){
  					}else{
  						$data['firstName_err']  = 'Enter Valide Name';
  					}
  				}
  			

  			if(empty($data['lastName'])){
  				$data['lastName_err'] = 'Name is Require';
  			}else{
  				if(filter_var($data['lastName'], FILTER_SANITIZE_STRING)){
  					}else{
  						$data['lastName_err']  = 'Enter Valide Name';
  					}
  				}
  				
  			//Validate Passwords
  			if(empty($data['password'])){
  				$data['password_err'] = 'Password is Require';

  			}elseif(!preg_match("/^.*(?=.{8,})(?=.*[a-zA-Z -]).*$/" , $data['password'])){
                $data['password_err'] = 'Password Must be at least 8 characters and at least must have 1 char';
              }


  			//Validate Confirm password
  			if(empty($data['password_err'])){
  				if(empty($data['confirmPassword'])){
  					$data['confirmPassword_err'] = 'Confirm Your Password';
  				}else{
  					if($data['password'] !== $data['confirmPassword']){
  						$data['confirmPassword_err'] = 'Doesn\'t match password';
  					}
  				}
  			}

  			//Make Sure empty of err
  			if(empty($data['firstName_err']) && empty($data['laststName_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirmPassword_err']) && empty($data['phoneNumber_err']) ){

  				//hashed password
  				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

  				//register users
  				if($this->userModel->register($data)){
  					 //echo message
  					flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
  				}else{
  					die('Something Went Wrong');
  				}
  			}else{
  				// Load View With err
  				$this->vieW('users/register',$data);
  			}

 		}else{
 			$data=[
 				'firstName' => '',
 				'lastName' => '',
 				'email' => '',
 				'phoneNumber' => '',
 				'password' =>'',
 				'confirmPassword' => '',
 				'firstName_err' => '',
 				'lastName_err' => '',
 				'email_err' => '',
 				'phoneNumber_err' => '',
 				'password_err' => '',
 				'confirmPassword_err' => ''
  			];

  			$this->view('users/register',$data);
 		}
 	}


public function login(){
	if(isLoggedIn()){
		redirect('posts/index');
	}
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data=[
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => ''
        ];

        //Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Email or Phone are Requier';
        }

        //Validate Passwords
        if(empty($data['password'])){
          $data['password_err'] = 'Password is Require';
        }elseif(!preg_match("/^.*(?=.{8,})(?=.*[a-zA-Z -]).*$/" , $data['password'])){
			$data['password_err'] = 'Password Must be at least 8 characters and at least must have 1 char';
		  }


		  //Check user Email or Phone
		  if($this->userModel->findUserByEmail($data['email']) || $this->userModel->findUserByPhone($data['email'])){
			  //userFound
		  }else{
			  $data['email_err'] = 'user NotFound';
		  }
		 
		  //Make Sure empty of err
		  if(empty($data['email_err']) && empty($data['password_err'])  ){
			$isLoggedIn = $this->userModel->login($data['email'],$data['password']);
			if($isLoggedIn){
				$this->userModel->login($data['email'],$data['password']);
				if($this->CreateUserSession($isLoggedIn)){
				redirect('pages');
				}
			}else{
				$data['password_err'] = 'Password Incorrect';
			}
		  }else{
			  // Load View With err
			  $this->vieW('users/login',$data);
		  }

        

  }else{
      $data=[
        'email' => '',
        'password' =>'',
        'email_err' => '',
        'password_err' => '',
        ];

        $this->view('users/login',$data);
    }
}


  public function logout(){
    unset($_SESSION['user_id']);
    unset($_SESSION['user_fname']);
    unset($_SESSION['user_lname']);
    unset($_SESSION['user_phoneNumber']);
	unset($_SESSION['user_email']);
	flash('loggedOut', 'You are logged out now please visit us again', 'alert alert-primary');
	redirect('pages/index');
  }


 	public function CreateUserSession($data){
		$_SESSION['user_id'] = $data->id;
		$_SESSION['user_fname']= $data->firstName;
		$_SESSION['user_lname']= $data->lastName;
		$_SESSION['user_phoneNumber']= $data->phoneNumber;
		$_SESSION['user_email']= $data->email;
		
		redirect('pages/');
 	}

 }
