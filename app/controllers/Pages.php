<?php
class Pages extends Controller
{

    private $managerModel;
    private $roomModel;
    private $bookingModel;

    public function __construct()
    {
        $this->managerModel = $this->model('Manager');
    }

    public function index()
    {
        $data = [
            'title' => 'Rihla',
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us'
        ];

        $this->view('pages/about', $data);
    }

    public function booking()
    {
        $cruises = $this->managerModel->getCruises();
//        foreach ($cruises as $cruise => $value){
//            $cruises[$cruise]->trajectory = $this->managerModel->getTrajectoryById($value->ID_cruise);
//        }
        $ports = $this->managerModel->getPorts();
        $ships = $this->managerModel->getShips();
        $data = [
            'cruises' => $cruises,
            'ports' => $ports,
            'ships' => $ships
        ];

        $this->view('pages/booking', $data);
    }

    public function myBookings()
    {
        if (isset($_SESSION['user_id'])) {
            $bookings = $this->managerModel->getbookings($_SESSION['user_id']);
            if (!empty($bookings)) {
                $data = [
                    'bookings' => $bookings,
                    'nothing' => ''
                ];
                // var_dump($data);
                // die();
            } else {
                $data = [
                    'bookings' => '',
                    'nothing' => 'You have no bookings yet'
                ];
            }
            $this->view('pages/myBookings', $data);
        } else {
            redirect('Users/login');
        }
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact us'
        ];

        $this->view('pages/contact', $data);
    }

    public function cruiseInfos($id)
    {
        $res = $this->managerModel->getCruise($id);
        $room = $this->getAvailableRooms($res->ID_ship);
//        $room = $this->managerModel->rooms($res[0]->ID_ship);
//    var_dump($res);
//    die();

        $data = [
            'cruise' => $res,
            'rooms' => $room
        ];
//        var_dump($data['cruise']);
//        die();

        $this->view('Pages/cruiseInfos', $data);
    }

    public function book($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $room = filter_input_array(INPUT_POST);
            $data = $this->managerModel->getCruise($id);
//            var_dump($room['room']);
//            die();
            $roomById = $this->managerModel->getRoomById($room['room']);
            $price = $roomById[0]->room_price * 1.4;
            $ID_user = $_SESSION['user_id'];
            if ($this->managerModel->book($id, $ID_user, $price, $room['room'])) {
                Flash('flash', 'Your ticket has been booked');
                redirect('Pages/booking');
            } else {
                Flash('flash', 'Error: Your ticket has not been booked, please try again later');
                redirect('Pages/booking');
            }
        }
    }

    public function cancelBooking($id)
    {
        $bookings = $this->managerModel->bookingList($id);
        $date = new DateTime($bookings[0]->departure_date);
        $today = new DateTime(date("Y-m-d"));
        $interval = $date->diff($today);
        // var_dump($interval->days);
        // die();
        if ($interval->days < 2) {
            Flash('flash', 'We are sorry! You can not cancel this ticket');
            redirect('Pages/myBookings');
        } else {
            if ($this->managerModel->cancelTicket($id)) {
                Flash('flash', 'Your ticket has been canceled');
                redirect('Pages/myBookings');
            }
        }
    }


    public function filterByMonth($month){
//        var_dump($_POST)
        $month = explode('-',$month)[1];
        $cruises = $this->managerModel->filterByMonth($month);
        foreach ($cruises as $cruise => $value){
            $cruises[$cruise]->trajectory = $this->managerModel->getTrajectoryById($value->ID_cruise);
        }
        $data = [
            'cruises' => $cruises
        ];

        echo json_encode($data);
        die();
    }

    public function filterByPort($port){
        $cruises = $this->managerModel->filterByPort($port);
        foreach ($cruises as $cruise => $value){
            $cruises[$cruise]->trajectory = $this->managerModel->getTrajectoryById($value->ID_cruise);
        }
        $data = [
            'cruises' => $cruises
        ];
        echo json_encode($data);
        die();
    }

    public function filterByShip($ship){
        $cruises = $this->managerModel->filterByShip($ship);
        foreach ($cruises as $cruise => $value){
            $cruises[$cruise]->trajectory = $this->managerModel->getTrajectoryById($value->ID_cruise);
        }
        $data = [
            'cruises' => $cruises
        ];
        echo json_encode($data);
        die();
    }

    public function getAvailableRooms($id_ship)
    {
        // Get all rooms
        $all_rooms = $this->managerModel->getRoomsByShip($id_ship);
        if (empty($all_rooms)) {
            $all_rooms = array();
        }

        $bookings = $this->managerModel->getBookingsByShip($id_ship);
        if (empty($bookings)) {
            $bookings = array();
        }

        // Filter out booked rooms
        $booked_rooms = $bookings;
//        var_dump($booked_rooms);
//        die();
//        foreach ($bookings as $booking) {
////            if (($start_date >= $booking->getStartDate() && $start_date <= $booking->getEndDate()) || ($end_date >= $booking->getStartDate() && $end_date <= $booking->getEndDate())) {
//                $booked_rooms[] = $booking;
////            }
//        }
//        var_dump($bookings);
//        die();

        $available_rooms = array();
        foreach ($all_rooms as $room) {
            if (!in_array($room, $booked_rooms)) {
                $available_rooms[] = $room;
            }
        }

        return $available_rooms;

    }

    public function getTrajectoryById($id){
        $result = $this->managerModel->getTrajectoryById($id);
        $data = [
            'trajectory' => $result
        ];
        echo json_encode($data);
        die();
    }

}