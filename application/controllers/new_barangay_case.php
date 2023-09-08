<?php
defined('BASEPATH') or exit('No direct script access allowed');

class new_barangay_case extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        if ($this->session->userdata("primary_key")) {
            $this->session->set_userdata("title", "New Barangay Case");
            $this->session->set_userdata("current_tab", "new_barangay_case");

            $this->load->view('templates/header.php');
            $this->load->view('pages/new_barangay_case_view.php');
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
