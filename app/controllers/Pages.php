<?php
class Pages extends Controller
{

  private $managerModel;
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
    $data = [
      'cruises' => $cruises
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
      } else {
        $data = [
          'bookings' => '',
          'nothing' => 'You have no bookings yet'
        ];
      }
      $this->view('pages/myBookings', $data);
    }else{
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

  public function cruiseInfos($id){
    $res = $this->managerModel->cruiseInfos($id);
    // var_dump();
    // die();
    $room = $this->managerModel->rooms($res[0]->ID_ship);

    $data = [
      'cruise' => $res,
      'rooms' => $room
    ];

    $this->view('Pages/cruiseInfos', $data);
  }

  public function book($id1, $id2, $p){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST);
      $room = $_POST;
      $price = $p*1.4;
      if($this->managerModel->book($id1, $id2, $price, $room)){
        redirect('Pages/booking');
      }else{
        return false;
      }

    }
  }

}
