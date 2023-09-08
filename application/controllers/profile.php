<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        $page_data["primary_key"] = $this->input->get("employee_id");

        $user_data = $this->model->MOD_GET_USER_DATA($page_data["primary_key"]);

        if ($this->session->userdata("primary_key")) {
            if ($user_data) {
                foreach ($user_data as $data) {
                    $page_data["first_name"] = $data->first_name;
                    $page_data["middle_name"] = $data->middle_name;
                    $page_data["last_name"] = $data->last_name;
                    $page_data["position"] = $data->position;
                    $page_data["mobile_number"] = $data->mobile_number;
                    $page_data["email"] = $data->email;
                    $page_data["address"] = $data->address;
                    $page_data["image"] = $data->image;
                    $page_data["user_type"] = $data->user_type;
                }

                $this->session->set_userdata("title", "Profile");
                $this->session->set_userdata("current_tab", "profile");

                $this->load->view('templates/header.php');
                $this->load->view('pages/profile_view.php', $page_data);
                $this->load->view('templates/footer.php');
            } else {
                $this->session->set_userdata("alert", array(
                    "title" => "Oops...",
                    "message" => "Employee ID is not found!",
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
