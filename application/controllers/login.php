<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        if (!$this->session->userdata("primary_key")) {
            $this->session->set_userdata("title", "Login");
            $this->session->set_userdata("current_tab", "login");

            $this->load->view('pages/login_view.php');
        } else {
            redirect(base_url() . "dashboard");
        }
    }
}
