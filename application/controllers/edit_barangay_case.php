<?php
defined('BASEPATH') or exit('No direct script access allowed');

class edit_barangay_case extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        if ($this->session->userdata("primary_key")) {
            $primary_key = $this->input->get("case_id");

            $barangay_case_data = $this->model->MOD_GET_SINGLE_BARANGAY_CASES_DATA($primary_key);

            if ($barangay_case_data) {
                $this->session->set_userdata("title", "Edit Barangay Case");
                $this->session->set_userdata("current_tab", "edit_barangay_case");

                foreach ($barangay_case_data as $case_data)
                {
                    $data["primary_key"] = $case_data->primary_key;
                    $data["citizen_primary_key"] = $case_data->citizen_primary_key;
                    $data["name"] = $case_data->name;
                    $data["mobile_number"] = $case_data->mobile_number;
                    $data["address"] = $case_data->address;
                    $data["nature_of_complaint"] = $case_data->nature_of_complaint;
                    $data["description"] = $case_data->description;
                    $data["image"] = $case_data->image;
                }

                $this->load->view('templates/header.php');
                $this->load->view('pages/edit_barangay_case_view.php', $data);
                $this->load->view('templates/footer.php');
            } else {
                $this->session->set_userdata("alert", array(
                    "title" => "Oops...",
                    "message" => "Barangay Case ID is not found!",
                    "type" => "error"
                ));

                redirect(base_url());
            }
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
