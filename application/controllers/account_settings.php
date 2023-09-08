<?php
defined('BASEPATH') or exit('No direct script access allowed');

class account_settings extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        if ($this->session->userdata("primary_key")) {
            $this->session->set_userdata("title", "Account Settings");
            $this->session->set_userdata("current_tab", "account_settings");

            $this->load->view('templates/header.php');
            $this->load->view('pages/under_maintenance_view.php');
            $this->load->view('templates/footer.php');
        } else {
            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => "You must login first!",
                "type" => "error"
            ));

            redirect(base_url() . "login");
        }
    }
}
