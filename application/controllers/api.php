<?php
header("Content-type: application/json; charset=utf-8");

defined('BASEPATH') or exit('No direct script access allowed');

class api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function check_connectivity()
    {
        $response = array(
            "response_code" => 200,
            "response_content" => "ready"
        );

        echo json_encode($response);
    }

    public function login()
    {
        $response = null;

        $username = $this->input->get("username");
        $password = $this->input->get("password");

        $username_exists = $this->model->MOD_CHECK_USERNAME_CITIZEN($username);

        if ($username_exists) {
            foreach ($username_exists as $result) {
                $db_password = $result->password;
            }

            if (password_verify($password, $db_password)) {
                $response = array(
                    "response_code" => 200,
                    "response_content" => json_encode($username_exists)
                );
            } else {
                $response = array(
                    "response_code" => 404,
                    "response_content" => null
                );
            }
        } else {
            $response = array(
                "response_code" => 404,
                "response_content" => null
            );
        }

        echo json_encode($response);
    }

    public function get_user_data()
    {
        $response = null;

        $primary_key = $this->input->get("primary_key");

        $user_exists = $this->model->MOD_GET_CITIZEN_DATA($primary_key);

        if ($user_exists) {
            $response = array(
                "response_code" => 200,
                "response_content" => json_encode($user_exists)
            );
        } else {
            $response = array(
                "response_code" => 404,
                "response_content" => null
            );
        }

        echo json_encode($response);
    }

    public function get_barangay_cases_data()
    {
        $response = null;
        $citizen_primary_key = $this->input->get("citizen_primary_key");

        $data_exists = $this->model->MOD_GET_CITIZEN_SUBMITTED_BARANGAY_CASES_DATA($citizen_primary_key);

        if ($data_exists) {
            $response = array(
                "response_code" => 200,
                "response_content" => json_encode($data_exists)
            );
        } else {
            $response = array(
                "response_code" => 404,
                "response_content" => null
            );
        }

        echo json_encode($response);
    }
    
    public function get_approved_barangay_cases_data()
    {
        $response = null;
        $citizen_primary_key = $this->input->get("citizen_primary_key");

        $data_exists = $this->model->MOD_GET_CITIZEN_APPROVED_BARANGAY_CASES_DATA($citizen_primary_key);

        if ($data_exists) {
            $response = array(
                "response_code" => 200,
                "response_content" => json_encode($data_exists)
            );
        } else {
            $response = array(
                "response_code" => 404,
                "response_content" => null
            );
        }

        echo json_encode($response);
    }

    public function update_profile()
    {
        $first_name = $this->input->get("first_name");
        $middle_name = $this->input->get("middle_name");
        $last_name = $this->input->get("last_name");
        $sex = $this->input->get("sex");
        $birthday = $this->input->get("birthday");
        $mobile_number = $this->input->get("mobile_number");
        $email = $this->input->get("email");
        $primary_key = $this->input->get("primary_key");

        $update_profile = $this->model->MOD_UPDATE_PROFILE_CITIZEN($first_name, $middle_name, $last_name, $sex, $birthday, $mobile_number, $email, $primary_key);

        echo json_encode($update_profile);
    }

    public function update_account()
    {
        $username = $this->input->get("username");
        $password = $this->input->get("password");
        $primary_key = $this->input->get("primary_key");

        if ($password) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            
            $update_account = $this->model->MOD_UPDATE_ACCOUNT_CITIZEN($username, $password, $primary_key);
        } else {
            $update_account = $this->model->MOD_UPDATE_ACCOUNT_CITIZEN_NO_PASSWORD($username, $primary_key);
        }

        echo json_encode($update_account);
    }

    public function submit_case()
    {
        $date = date("Y-m-d");
        $time = date("h:i A");
        $citizen_primary_key = $this->input->get("citizen_primary_key");
        $name = $this->input->get("name");
        $mobile_number = $this->input->get("mobile_number");
        $address = $this->input->get("address");
        $nature_of_complaint = $this->input->get("nature_of_complaint");
        $description = $this->input->get("description");
        $status = "1";

        $submit_case = $this->model->MOD_SUBMIT_CASE_CITIZEN($citizen_primary_key, $date, $time, $name, $mobile_number, $address, $nature_of_complaint, $description, $status);

        echo json_encode($submit_case);
    }

    public function update_approved_case()
    {
        $primary_key = $this->input->get("primary_key");

        $response = $this->model->MOD_UPDATE_BARANGAY_CASE_STATUS("0", $primary_key);

        echo json_encode($response);
    }
    
    public function update_rejected_case()
    {
        $primary_key = $this->input->get("primary_key");

        $response = $this->model->MOD_UPDATE_BARANGAY_CASE_STATUS("2", $primary_key);

        echo json_encode($response);
    }

    public function get_specific_barangay_case()
    {
        $primary_key = $this->input->get("primary_key");

        $response = $this->model->MOD_GET_SPECIFIC_BARANGAY_CASE($primary_key);

        echo json_encode($response);
    }
}
