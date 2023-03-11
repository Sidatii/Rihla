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
//     var_dump($data);
//     die();

        $this->view('managers/cruises', $data);
    }

    public function features()
    {
        // Get cruises
        $ships = $this->managerModel->getShips();
        $ports = $this->managerModel->getPorts();
        $rooms = $this->managerModel->getRooms();

        $data = [
            'ships' => $ships,
            'ports' => $ports,
            'rooms' => $rooms
        ];

        $this->view('managers/features', $data);
    }


    public function addCruisePage()
    {
        $ports = $this->managerModel->getPorts();
        $ships = $this->managerModel->getShips();
        $data = [
            'ports' => $ports,
            'ships' => $ships
        ];

        $this->view('managers/addCruise', $data);
    }

    public function addCruise()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = $_POST;

//        var_dump($_POST['itinerary']);
//        die();
            $data['img'] = $_FILES["image"]["name"];
//            var_dump($data);
//            die();
            if ($this->managerModel->addCruise($data)) {
                $lastIId = $this->managerModel->getLastId()->LastId;

                foreach ($_POST['itinerary'] as $itinerary) {
                    $this->managerModel->addItinerary($lastIId, $itinerary);
                }

                move_uploaded_file($_FILES["image"]["tmp_name"], "./img/" . $data['img']);
                Flash('cruise_added', 'Your cruise has been added successfully');
                redirect('Managers/cruises');
            }
        }

    }

    // Delete Ship

    public function deleteShip($id)
    {
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

        if ($this->managerModel->addShip($data)) {
            Flash('flash', 'Your ship has been added successfully');
            redirect('Managers/features');
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
            if ($this->managerModel->addPort($data)) {
                Flash('flash', 'Your port has been added successfully');
                redirect('Managers/features');
            }
        }
    }

    public function delete($id)
    {
        if ($this->managerModel->delete($id)) {
            Flash('cruise_deleted', 'Your cruise has been deleted');
            redirect('managers/cruises');

        }

    }

    public function deletePort($id)
    {
        if ($this->managerModel->deletePort($id)) {
            Flash('flash', 'Your port has been deleted');
            redirect('managers/features');

        }

    }
}







