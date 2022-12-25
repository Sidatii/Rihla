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
        'password_err' => '',
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }

  public function createUserSession($user){
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_fname'] = $user->fname;
    $_SESSION['user_lname'] = $user->lname;
    redirect('pages/index');


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
