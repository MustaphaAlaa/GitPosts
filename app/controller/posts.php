<?php
 class Posts extends Controller{
     public function __construct(){
         $this->postModel = $this->model('Post');
         $this->commentModel = $this->model('Comment');
     }

     public function index(){
        $posts = $this->postModel->getPosts();
        $data=[
            'posts' => $posts
        ];

        $this->view('posts/index',$data);
     }

     public function addPost(){
         // Check if user logged in
        if(!isLoggedIn()){
            flash('Not_Logged','You\'re not logged in log in to add posts','alert alert-danger');
            redirect('pages/index');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           // Sanitize Post array
           $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

           $data=[
               'title' => rtrim($_POST['title']),
               'body' => rtrim($_POST['body']),
               'user_id' => $_SESSION['user_id'],
               'title_er' => '',
               'body_er' => ''
           ];

           //Validate title
           if(empty($data['title'])){
               $data['title_err'] = "Title Is Require";
           }else{
               if(!filter_var($data['title'],FILTER_SANITIZE_STRING)){
                 $data['title_err'] = "ENTER VALIDATE TITLE";
               }
           }

           //Validate Body
           if(empty($data['body'])){
               $data['body_err'] = 'Body is Require';
           }else{
            if(!filter_var($data['body'],FILTER_SANITIZE_STRING)){
                $data['body_err'] = "ENTER VALIDATE TITLE";
              }
           }

           //Make Sure there's no err
           if(empty($data['title_err']) && empty($data['body_err'])){
                //Add post
                if($this->postModel->addPost($data)){
                    flash('post_message','Post Added');
                    redirect('posts');
                }else{
                    die('Something went wrong');
                }
           }else{
               //Load page with err
               $this->view('posts/addPost',$data);
           }
        }else{
            $data=[
                'title' => '',
                'body' =>''
            ];
            $this->view('posts/addPost',$data);
        }
     }


     public function showPost($id=''){
     	if(empty($id)){
     		redirect('posts');
     	}else{
	        $posts = $this->postModel->getPostById($id);
	        $comments = $this->commentModel->allComments($id);
	        //Passing data
	        $data=[
	            'posts' => $posts,
	            'comment'=> '',
	            'comment_err' => '',
	            'comments'=> $comments
	        ];

	        $this->view('posts/showPost',$data);     		
     	}
     }

    public function editPost($id=''){
    /*****************************************************************
        *Control Access
        *********************
            *make Sure if post id is submit ifn't redirect to posts
            *Make Sure if user  logged in
            *Make Sure if the user thatt logged in the owner
            *if user Not logged in redirect to login page
            *if isn't user that logged in the owner redirect to add post
         ****************************************************************
        *View Load
        *********************
            *load the view
            *if submit procces the data

    */
    if(empty($id)){
        redirect('pages');
    }else{
        if(!isLoggedIn()){
            redirect('posts');
        }else{
            $postInfo = $this->postModel->getPostById($id);
            if($_SESSION['user_id'] !== $postInfo->postOwner){
                redirect('posts');
            }else{
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    // Sanitize Post array
                    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                    $data=[
                        'title' => rtrim($_POST['title']),
                        'body' => rtrim($_POST['body']),
                        'user_id' => $_SESSION['user_id'],
                        'id' => $id,
                        'title_er' => '',
                        'body_er' => ''
                    ];

                    //Validate title
                    if(empty($data['title'])){
                        $data['title_err'] = "Title Is Require";
                    }else{
                        if(!filter_var($data['title'],FILTER_SANITIZE_STRING)){
                          $data['title_err'] = "ENTER VALIDATE TITLE";
                        }
                    }

                    //Validate Body
                    if(empty($data['body'])){
                        $data['body_err'] = 'Body is Require';
                    }else{
                     if(!filter_var($data['body'],FILTER_SANITIZE_STRING)){
                         $data['body_err'] = "ENTER VALIDATE TITLE";
                       }
                    }

                    //Make Sure there's no err
                    if(empty($data['title_err']) && empty($data['body_err'])){
                         //Add post
                         if($this->postModel->updatePost($data)){
                             flash('post_message','Post Updeted');
                             redirect('posts');
                         }else{
                             die('Something went wrong');
                         }
                    }else{
                        //Load page with err
                        $this->view('posts/editPost',$data);
                    }
                 }else{
                     $data=[
                         'id' => $id,
                         'title' => $postInfo->title,
                         'body' => $postInfo->body,

                     ];
                     $this->view('posts/editPost',$data);
                 }
            }
        }
    }
    }



    public function deletePost($id){
        if(!isLoggedIn()){
            redirect('posts/showPost/'.$id);
        }else{
           $postOwner = $this->postModel->getPostById($id)->userId;
           if($_SESSION['user_id'] !== $postOwner){
                redirect('posts/showPost/'.$id);
           }else{
                if($this->postModel->deletePost($id)){
                    redirect('posts');
                }else{
                    redirect('posts/showPost/'.$id);
                }
           }
        }
    }







    public function comments($id){
        if(!isset($_SESSION['user_id'])){
          flash('LogIn_First','You\'re not logged in, log in to add comment ','alert alert-danger');
          redirect('users/login');
        }else{
      
          if($_SERVER['REQUEST_METHOD'] === 'POST'){
              $posts = $this->postModel->getPostById($id);
              $comments = $this->commentModel->allComments($id);
            
               $data=[
                  'userId' => $_SESSION['user_id'],
                  'postOwner'=> $posts->postOwner,
                  'postId'=> $posts->postId,
                  'comment'=> rtrim($_POST['comment']),
                  'comment_err'=>'',
                  'comments'=> $comments,
                  'posts' => $posts 
              ];
      
              if(empty($data['comment'])){
                  $data['comment_err'] = "Can't Add Empty Comment";
              }
              //Submit Comment
              if(empty($data['comment_err'])){
                  //add comment to database
                  if($this->commentModel->addComment($data)){
                    redirect('posts/showPost/'.$posts->postId);
                  }else{
                    die('Something Went wrong');
                  }
              }else{
                  //Load With Err
                  $this->view('posts/showPost',$data);
              }
          }else{
            $posts = $this->postModel->getPostById($id);

              $data=[
                'comment'=> '',
                'comment_err'=>''

            ];
              redirect('posts/showPost/'.$posts->postId);
          }
      
      
      }
      
      }

      
      public function deleteComment($id){
      	//Check if user is owner of comment and is loggedIn
      	if(!isLoggedIn()){

              if($comment = $this->commentModel->getComment($id)){
      		    redirect('posts/showPost/' . $comment->comment_post_id);
              }else{
                redirect('posts');
              }

      	}else{

            
      		if($comment = $this->commentModel->getComment($id)){
                if($_SESSION['user_id'] !== $comment->userId){
                    redirect('posts/showPost/' . $comment->comment_post_id);
                }else{
                    if($this->commentModel->deleteComment($id)){
                        redirect('posts/showPost/' . $comment->comment_post_id);
                    }else{
                            die('someThing Wrong');
                    }
                }   
              }else{
                redirect('posts');
              }


      	} 
      }


      public function editComment($id){
        //Check if user is owner of comment and is loggedIn
        if(!isLoggedIn()){

            if($comment = $this->commentModel->getComment($id)){
                redirect('posts/showPost/' . $comment->comment_post_id);
            }else{
              redirect('posts');
            }

        }else{

          
            if($comment = $this->commentModel->getComment($id)){
              if($_SESSION['user_id'] !== $comment->userId){
                  redirect('posts/showPost/' . $comment->comment_post_id);
              }else{
                  if($this->commentModel->editComment($id)){
                      redirect('posts/showPost/' . $comment->comment_post_id);
                  }else{
                          die('someThing Wrong');
                  }
              }   
            }else{
              redirect('posts');
            }


        } 
    }
 }
