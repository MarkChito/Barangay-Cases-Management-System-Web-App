<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barangay_cases extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        if ($this->session->userdata("primary_key")) {
            $this->session->set_userdata("title", "Barangay Cases");
            $this->session->set_userdata("current_tab", "barangay_cases");
            $this->session->set_userdata("is_barangay_cases", true);

            $this->load->view('templates/header.php');
            $this->load->view('pages/barangay_cases_view.php');
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
