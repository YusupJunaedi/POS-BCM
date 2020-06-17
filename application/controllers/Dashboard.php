<?php

class Dashboard extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('back_model', 'bm');
    }


    function index()
    {

        $data = [
            'title' => 'Dashboard',
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/dashboard');
        $this->load->view('back/footer');
    }

}