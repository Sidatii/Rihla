<?php
class Users extends Controller
{
  private $userModel;
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function login()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // here we process the form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST);

      // init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      // Validate email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter your email';
      }

      // Validate password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }

      // check for user/email
      if ($this->userModel->findUserByEmail($data['email'])) {
        // User found
      } else {
        // user not found
        $data['email_err'] = 'No user found';
      }

      // make sure errors are empty
      if (empty($data['email_err']) && empty($data['password_err'])) {
        // Validated
        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          // Create session
          $this->createUserSession($loggedInUser);
          $_SESSION['isLoggedin'] = '';

          if($_SESSION['user_role'] == 1){
            $_SESSION['is_admin'] = 'block';
            $_SESSION['is_user'] = 'hidden';
          }
          else{
            $_SESSION['is_admin'] = 'hidden';
            $_SESSION['is_user'] = 'block';
          }

        } else {
          $data['password_err'] = 'Incorrect password';

          $this->view('users/login', $data);
        }
      } else {
        // Load view with errors
        $this->view('users/login', $data);
      }
    } else {
      // here we load the form
      // init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => ''
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }

  public function createUserSession($user){
    $_SESSION['user_id'] = $user->ID_user;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_fname'] = $user->firstName;
    $_SESSION['user_lname'] = $user->lastName;
    $_SESSION['user_role'] = $user->role;
    $_SESSION['isLoggedin'] = 'hidden';
    $_SESSION['guess'] = '';
    $_SESSION['is_admin'] = '';
    $_SESSION['is_user'] = '';

    redirect('pages/index');
  }

  // public function isAdmin(){
  //   if($_SESSION['user_role'] == 1){
  //     $isAdmin = [
  //     'isAdmin' => 'block'
  //     ];
  //     return $isAdmin['isAdmin'];
  //   }else{
  //     $isAdmin = [
  //       'isAdmin' => 'hidden'
  //       ];
  //       return $isAdmin['isAdmin'];
  //   }
  // }

  // public function isUser(){
  //   if($_SESSION['user_role'] != 1){
  //     $isUser = [
  //       'isUser' => 'block'
  //       ];
  //       return $isUser['isUser'];
  //   }else{
  //     $isUser = [
  //       'isUser' => 'hidden'
  //       ];
  //       return $isUser['isUser'];
  //   }
  // }

  public function logout(){
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_fname']);
    unset($_SESSION['user_lname']);
    session_destroy();
    redirect('users/login');
  }

  public function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
      return true;
    } else {
      return false;
    }
  }

  public function signup()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // here we process the form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST);

      // init data
      $data = [
        'firstName' => trim($_POST['firstName']),
        'lastName' => trim($_POST['lastName']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'firstName_err' => '',
        'lastName_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Validate first name
      if (empty($data['firstName'])) {
        $data['firstName_err'] = 'Please enter your first name';
      } else {
      }

      // Validate last name
      if (empty($data['lastName'])) {
        $data['lastName_err'] = 'Please enter your your last name';
      } else {
      }

      // Validate email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter your email';
      } else {
        // check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'Email is already taken';
        }
      }

      // Validate password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // Validate confirm password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Please confirm password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }

      // make sure errors are empty
      if (empty($data['email_err']) && empty($data['firstName_err']) && empty($data['lastName_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        // Validated

        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
        if ($this->userModel->signup($data)) {
          Flash('signup_success', 'You are signed up and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('users/signup', $data);
      }
    } else {
      // here we load the form
      // init data
      $data = [
        'firstName' => '',
        'lastName' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'firstName_err' => '',
        'lastName_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Load view
      $this->view('users/signup', $data);
    }
  }
}
