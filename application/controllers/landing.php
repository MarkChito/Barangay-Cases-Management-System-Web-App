<?php
defined('BASEPATH') or exit('No direct script access allowed');

class landing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        $this->session->set_userdata("title", null);
        $this->session->set_userdata("current_tab", "landing");

        $this->load->view('pages/landing_view.php');
    }
}
