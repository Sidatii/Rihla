<?php
  class Pages extends Controller {

  private $managerModel;
    public function __construct(){
      $this->managerModel = $this->model('Manager');
    }
    
    public function index(){
      $data = [
        'title' => 'Rihla',
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }

    public function booking(){
    $cruises = $this->managerModel->getCruises();
      $data = [
        'cruises' => $cruises
      ];

      $this->view('pages/booking', $data);
    }

    public function contact(){
      $data = [
        'title' => 'Contact us'
      ];

      $this->view('pages/contact', $data);
    }

  }

    