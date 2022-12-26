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

    public function cruises(){
      $data = [
        'title' => 'Edit cruises'
      ];

      $this->view('pages/cruises', $data);
    }

    public function ships(){
      $data = [
        'title' => 'Edit ships'
      ];

      $this->view('pages/ships', $data);
    }

    public function features(){
      $data = [
        'title' => 'Edit features'
      ];

      $this->view('pages/features', $data);
    }

  }

    