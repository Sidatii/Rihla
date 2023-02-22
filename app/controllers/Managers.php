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
    // var_dump($data);
    // die();

    $this->view('managers/cruises', $data);
  }

  public function features()
  {
    // Get cruises
    $cruises = $this->managerModel->getCruises();
    $ports = $this->managerModel->getPorts();
    $rooms = $this->managerModel->getRooms();

    $data = [
      'cruises' => $cruises,
        'ports' => $ports,
        'rooms' => $rooms
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
      $_POST = filter_input_array(INPUT_POST);
      $data = $_POST;
    }
    $data['img'] = $_FILES["image"]["name"];
    
    if($this->managerModel->addCruise($data)){
      move_uploaded_file($_FILES["image"]["tmp_name"], "./img/" . $data['img']);
      Flash('prd_added','Your product has been added successfully');
      redirect('Managers/cruises');
    }
    
  }

  public function updateCruise($id){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // here we process the form
      // Sanitize POST data

      $_POST = filter_input_array(INPUT_POST);
      $data = $_POST;
      $data['id'] = $id;
      $data['img'] = $_FILES["image"]["name"];
    }
    if($this->managerModel->updateCruise($data)){
      Flash('cruise_updated', 'Your cruise has been successfully updated');
      redirect('Managers/cruises');
    }
  }

  // Update Ship page

    public function updateShipPage($id){
        $ship = $this->managerModel->getShipById($id);
        $cruises = $this->managerModel->getCruises();
        $data = [
            'ship' => $ship,
            'cruises' => $cruises
        ];
        $this->view('managers/updateShipPage', $data);
    }

  // Update Ship

    public function updateShip($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // here we process the form
        // Sanitize POST data

        $_POST = filter_input_array(INPUT_POST);
        $data = $_POST;
        $data['id'] = $id;
        }
        if($this->managerModel->updateShip($data)){
        Flash('flash', 'Your ship has been successfully updated');
        redirect('Managers/features');
        }
    }

    // Delete Ship

    public function deleteShip($id){
        if ($this->managerModel->deleteShip($id)) {
        Flash('flash', 'Your ship has been successfully deleted');
        redirect('Managers/features');
        }
    }

  public function addShipPage()
  {
    $cruises = $this->managerModel->getCruises();
    $data = [
      'cruises' => $cruises
    ];

    $this->view('managers/addShip', $data);
  }


  public function addShip()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST);
      $data = $_POST;
    }
      
    if($this->managerModel->addShip($data)){
      Flash('flash','Your ship has been added successfully');
      redirect('Managers/ships');
    }
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST);
      $data = $_POST;
    if($this->managerModel->addPort($data)){
      Flash('flash','Your port has been added successfully');
      redirect('Managers/features');
    }
    }
  }
public function delete($id){
    if ($this->managerModel->delete($id)){
        Flash('cruise_deleted', 'Your cruise has been deleted');
        redirect('managers/cruises');

    }

}

public function deletePort($id){
    if ($this->managerModel->deletePort($id)){
        Flash('port_deleted', 'Your port has been deleted');
        redirect('managers/features');

    }

}

// public function getUsers(){
//     $data = $this->managerModel->getUsers();   
//     header('Access-Control-Allow-Origin: *');
//     header('Content-type: application/json');
//     echo json_encode($data);
// }



}