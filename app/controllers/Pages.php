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
  }