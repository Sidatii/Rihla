<?php
  class Pages extends Controller {
    public function __construct(){
     
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
      $data = [
        'title' => 'Book your trip'
      ];

      $this->view('pages/booking', $data);
    }

    public function contact(){
      $data = [
        'title' => 'Contact us'
      ];

      $this->view('pages/contact', $data);
    }
    public function Dashboard(){
      $data = [
        'title' => 'Admin dashboard'
      ];

      $this->view('pages/dashboard', $data);
    }

  }

    