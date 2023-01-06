<?php

class Managers extends Controller
{

  private $managerModel;

  public function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('users/login');
    }
    $this->managerModel = $this->model('Manager');
  }

  public function index()
  {
    $data = [
      'title' => 'Admin dashboard'
    ];

    $this->view('managers/dashboard', $data);
  }

  public function cruises()
  {
    // Get cruises
    $cruises = $this->managerModel->getCruises();
    $data = [
      'cruises' => $cruises
    ];

    $this->view('managers/cruises', $data);
  }

  public function ships()
  {
    $data = [
      'title' => 'Edit ships'
    ];

    $this->view('managers/ships', $data);
  }

  public function features()
  {
    $data = [
      'title' => 'Edit features'
    ];

    $this->view('managers/features', $data);
  }


  public function addCruisePage()
  {
    $data = [
      'title' => 'Add cruises'
    ];

    $this->view('managers/addCruise', $data);
  }

  public function addCruise()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      filter_input_array(INPUT_POST);
      $data = $_POST;
    }
      $data['image'] = $_FILES['image']['name'];
    
    if($this->managerModel->addCruise($data)){
      move_uploaded_file($_FILES["image"]["tmp_name"], "./images/" . $data['image']);
      Flash('prd_added','Your product has been added successfully');
      redirect('managers/cruises');
    }
    
  }

  public function addShipPage()
  {
    $data = [
      'title' => 'Add Ship'
    ];

    $this->view('managers/addShip', $data);
  }

  public function addShip()
  {
  }

  public function addPortPage()
  {
    $data = [
      'title' => 'Add cruises'
    ];

    $this->view('managers/addPort', $data);
  }

  public function addPort()
  {
  }
}
