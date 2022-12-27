<?php 

class Managers extends Controller{

  private $managerModel;

    public function __construct(){
      if(!isset($_SESSION['user_id'])){
            redirect('users/login');
      }

      $this->managerModel = $this->model('Manager');
    }

    public function index(){
        $data = [
          'title' => 'Admin dashboard'
        ];
  
        $this->view('managers/dashboard', $data);
      }
  
      public function cruises(){
        // Get cruises
        $cruises = $this->managerModel->getCruises();
        $data = [
          'cruises' => $cruises
        ];
  
        $this->view('managers/cruises', $data);
      }
  
      public function ships(){
        $data = [
          'title' => 'Edit ships'
        ];
  
        $this->view('managers/ships', $data);
      }
  
      public function features(){
        $data = [
          'title' => 'Edit features'
        ];
  
        $this->view('managers/features', $data);
      }
}

?>