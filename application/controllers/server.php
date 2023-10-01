<?php
defined('BASEPATH') or exit('No direct script access allowed');

class server extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function login()
    {
        $username = $this->input->post("login_username");
        $password = $this->input->post("login_password");
        $remember_me = $this->input->post("login_remember_me") ? "checked" : null;

        $current_tab = $this->session->userdata("current_tab");

        $username_exists = $this->model->MOD_CHECK_USERNAME($username);

        if ($username_exists) {
            foreach ($username_exists as $useraccount_details) {
                $db_primary_key = $useraccount_details->primary_key;
                $db_password = $useraccount_details->password;
            }

            if (password_verify($password, $db_password)) {
                $this->session->set_userdata("primary_key", $db_primary_key);

                if ($remember_me) {
                    $this->session->set_userdata("remember_me_username", $username);
                    $this->session->set_userdata("remember_me_password", $password);
                    $this->session->set_userdata("remember_me", $remember_me);
                } else {
                    $this->session->unset_userdata("remember_me");
                    $this->session->unset_userdata("remember_username");
                    $this->session->unset_userdata("remember_password");
                }
            } else {
                $this->session->set_userdata("alert", array(
                    "title" => "Oops...",
                    "message" => "Invalid Username or Password",
                    "type" => "error"
                ));
            }
        } else {
            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => "Invalid Username or Password",
                "type" => "error"
            ));
        }

        redirect(base_url() . $current_tab);
    }

    public function rfid_login()
    {
        $rfid_number = $this->input->post("rfid_login");

        $current_tab = $this->session->userdata("current_tab");

        $rfid_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);

        if ($rfid_exists) {
            foreach ($rfid_exists as $useraccount_details) {
                $db_primary_key = $useraccount_details->primary_key;
            }

            $this->session->set_userdata("primary_key", $db_primary_key);

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "You have successfully logged in.",
                "type" => "success"
            ));
        } else {
            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => "Invalid RFID Card!",
                "type" => "error"
            ));
        }

        redirect(base_url() . $current_tab);
    }

    public function update_profile()
    {
        $first_name = $this->input->post("update_profile_first_name");
        $middle_name = $this->input->post("update_profile_middle_name");
        $last_name = $this->input->post("update_profile_last_name");
        $position = $this->input->post("update_profile_position");
        $mobile_number = $this->input->post("update_profile_mobile_number");
        $email = $this->input->post("update_profile_email");
        $address = $this->input->post("update_profile_address");

        $primary_key = $this->input->post("update_profile_primary_key");
        $old_email = $this->input->post("update_profile_old_email");
        $old_image = $this->input->post("update_profile_old_image");

        $current_tab = $this->session->userdata("current_tab");

        $image = $_FILES["update_profile_image"]["tmp_name"];

        $errors = 0;

        if ($image) {
            $file_upload_message = $this->file_upload("update_profile_image");

            if ($file_upload_message) {
                $image = $file_upload_message;
            } else {
                $this->session->set_userdata("alert", array(
                    "title" => "Oops...",
                    "message" => "There is an error while uploading your image",
                    "type" => "error"
                ));

                $errors++;
            }
        } else {
            $image = $old_image;
        }

        if ($email) {
            $email_exists = $this->model->MOD_CHECK_EMAIL($email);
        }

        if ($email_exists && $email != $old_email) {
            $this->session->set_userdata("error_update_profile_email", "Email already exists");
            $this->session->set_userdata("error_update_profile_email_is_invalid", "is-invalid");

            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => $email . " already exists!",
                "type" => "error"
            ));

            $errors++;
        }

        if ($errors > 1) {
            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => "There are errors while processing your request.",
                "type" => "error"
            ));
        }

        if ($errors == 0) {
            $this->model->MOD_UPDATE_PROFILE($first_name, $middle_name, $last_name, $position, $mobile_number, $email, $address, $image, $primary_key);

            $this->session->set_userdata("alert", array(
                "title" => "Congratulations!",
                "message" => "Your profile is successfully updated.",
                "type" => "success"
            ));
        }

        redirect(base_url() . $current_tab . "?employee_id=" . $primary_key);
    }

    public function update_account()
    {
        $errors = 0;

        $rfid_number = $this->input->post("update_account_rfid_number");
        $username = $this->input->post("update_account_username");
        $password = $this->input->post("update_account_password");

        $primary_key = $this->input->post("update_account_primary_key");
        $old_username = $this->input->post("update_account_old_username");
        $old_rfid_number = $this->input->post("update_account_old_rfid_number");
        $old_password = $this->input->post("update_account_old_password");

        if ($password) {
            $password = password_hash($password, PASSWORD_BCRYPT);
        } else {
            $password = $old_password;
        }

        $current_tab = $this->session->userdata("current_tab");

        $username_exists = $this->model->MOD_CHECK_USERNAME($username);
        $rfid_number_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);

        if ($username_exists && $username != $old_username) {
            $this->session->set_userdata("error_update_account_username", "Username already exists");
            $this->session->set_userdata("error_update_account_username_is_invalid", "is-invalid");

            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => $username . " already exists!",
                "type" => "error"
            ));

            $errors++;
        }

        if ($rfid_number_exists && $rfid_number != $old_rfid_number) {
            $this->session->set_userdata("error_update_account_rfid_number", "RFID Number is already in use");
            $this->session->set_userdata("error_update_account_rfid_number_is_invalid", "is-invalid");

            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => $rfid_number . " is already in use!",
                "type" => "error"
            ));

            $errors++;
        }

        if ($errors == 2) {
            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => "Both " . $username . " and " . $rfid_number . " are already in use!",
                "type" => "error"
            ));
        }

        if ($errors == 0) {
            $this->model->MOD_UPDATE_ACCOUNT($rfid_number, $username, $password, $primary_key);

            $this->session->set_userdata("alert", array(
                "title" => "Congratulations!",
                "message" => "Your profile is successfully updated.",
                "type" => "success"
            ));
        }

        if ($current_tab != "profile") {
            redirect(base_url() . $current_tab);
        } else {
            redirect(base_url() . $current_tab . "?employee_id=" . $primary_key);
        }
    }

    public function add_employee()
    {
        $first_name = $this->input->post("add_employee_first_name");
        $middle_name = $this->input->post("add_employee_middle_name");
        $last_name = $this->input->post("add_employee_last_name");
        $rfid_number = $this->input->post("add_employee_rfid_number");
        $mobile_number = $this->input->post("add_employee_mobile_number");
        $email = $this->input->post("add_employee_email");
        $address = $this->input->post("add_employee_address");
        $position = $this->input->post("add_employee_position");
        $username = $this->input->post("add_employee_username");
        $password = password_hash($this->input->post("add_employee_password"), PASSWORD_BCRYPT);
        $image = $_FILES["add_employee_image"]["tmp_name"];

        $errors = 0;

        if ($image) {
            $file_upload_message = $this->file_upload("add_employee_image");

            if ($file_upload_message) {
                $image = $file_upload_message;
            } else {
                $this->session->set_userdata("alert", array(
                    "title" => "Oops...",
                    "message" => $file_upload_message,
                    "type" => "error"
                ));

                $errors++;
            }
        } else {
            $image = "default_user_image.png";
        }

        $current_tab = $this->session->userdata("current_tab");

        $rfid_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);
        $email_exists = $this->model->MOD_CHECK_EMAIL($email);
        $username_exists = $this->model->MOD_CHECK_USERNAME($username);

        if ($rfid_exists) {
            $this->session->set_userdata("error_add_employee_rfid_number", "RFID Number already exists");
            $this->session->set_userdata("error_add_employee_rfid_number_is_invalid", "is-invalid");

            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => $rfid_number . " already exists!",
                "type" => "error"
            ));

            $errors++;
        }

        if ($email_exists) {
            $this->session->set_userdata("error_add_employee_email", "Email already exists");
            $this->session->set_userdata("error_add_employee_email_is_invalid", "is-invalid");

            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => $email . " already exists!",
                "type" => "error"
            ));

            $errors++;
        }

        if ($username_exists) {
            $this->session->set_userdata("error_add_employee_username", "Username already exists");
            $this->session->set_userdata("error_add_employee_username_is_invalid", "is-invalid");

            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => $username . " already exists!",
                "type" => "error"
            ));

            $errors++;
        }

        if ($errors > 1) {
            $this->session->set_userdata("alert", array(
                "title" => "Oops...",
                "message" => "There are some errors while processing your request!",
                "type" => "error"
            ));
        }

        if ($errors == 0) {
            $this->model->MOD_ADD_EMPLOYEE($first_name, $middle_name, $last_name, $rfid_number, $mobile_number, $email, $address, $position, $username, $password, $image);

            $this->session->set_userdata("alert", array(
                "title" => "Congratulations!",
                "message" => "You have successfully added an employee.",
                "type" => "success"
            ));
        }

        redirect(base_url() . $current_tab);
    }

    public function delete_employee()
    {
        $primary_key = $this->input->get("primary_key");

        $current_tab = $this->session->userdata("current_tab");

        $this->model->MOD_DELETE_EMPLOYEE($primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You have successfully deleted an employee.",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function add_announcement()
    {
        $title = $this->input->post("add_announcement_title");
        $body = $this->input->post("add_announcement_body");
        $date_and_time = date("Y-m-d H:i:s");

        $this->model->MOD_ADD_ANNOUNCEMENT($date_and_time, $title, $body);

        $current_tab = $this->session->userdata("current_tab");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You have successfully added an announcement.",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function update_announcement()
    {
        $primary_key = $this->input->post("update_announcement_primary_key");
        $title = $this->input->post("update_announcement_title");
        $body = $this->input->post("update_announcement_body");
        $date_and_time = date("Y-m-d H:i:s");

        $this->model->MOD_UPDATE_ANNOUNCEMENT($date_and_time, $title, $body, $primary_key);

        $current_tab = $this->session->userdata("current_tab");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You have successfully updated an announcement.",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function delete_announcement()
    {
        $primary_key = $this->input->get("primary_key");

        $current_tab = $this->session->userdata("current_tab");

        $this->model->MOD_DELETE_ANNOUNCEMENT($primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You have successfully deleted an announcement.",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function add_barangay_news()
    {
        $title = $this->input->post("add_barangay_news_title");
        $body = $this->input->post("add_barangay_news_body");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $image = $_FILES["add_barangay_news_image"]["tmp_name"];

        $current_tab = $this->session->userdata("current_tab");

        $errors = 0;

        if ($image) {
            $file_upload_message = $this->file_upload("add_barangay_news_image");

            if ($file_upload_message) {
                $image = $file_upload_message;
            } else {
                $this->session->set_userdata("alert", array(
                    "title" => "Oops...",
                    "message" => "There is an error while uploading your image",
                    "type" => "error"
                ));

                $errors++;
            }
        } else {
            $image = "default_image.png";
        }

        if ($errors == 0) {
            $this->model->MOD_ADD_BARANGAY_NEWS($date, $time, $title, $body, $image);

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "You have successfully added a barangay news.",
                "type" => "success"
            ));
        }

        redirect(base_url() . $current_tab);
    }

    public function update_barangay_news()
    {
        $primary_key = $this->input->post("update_barangay_news_primary_key");
        $title = $this->input->post("update_barangay_news_title");
        $body = $this->input->post("update_barangay_news_body");
        $old_news_image = $this->input->post("update_barangay_news_old_news_image");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $image = $_FILES["update_barangay_news_image"]["tmp_name"];

        $current_tab = $this->session->userdata("current_tab");

        $errors = 0;

        if ($image) {
            $file_upload_message = $this->file_upload("update_barangay_news_image");

            if ($file_upload_message) {
                $image = $file_upload_message;
            } else {
                $this->session->set_userdata("alert", array(
                    "title" => "Oops...",
                    "message" => $file_upload_message,
                    "type" => "error"
                ));

                $errors++;
            }
        } else {
            $image = $old_news_image;
        }

        if ($errors == 0) {
            $this->model->MOD_UPDATE_BARANGAY_NEWS($date, $time, $title, $body, $image, $primary_key);

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "You have successfully updated a barangay news.",
                "type" => "success"
            ));
        }

        redirect(base_url() . $current_tab);
    }

    public function delete_barangay_news()
    {
        $primary_key = $this->input->get("primary_key");

        $current_tab = $this->session->userdata("current_tab");

        $this->model->MOD_DELETE_BARANGAY_NEWS($primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You have successfully deleted a barangay news.",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function livesearch()
    {
        $xmlDoc = new DOMDocument();
        $xmlDoc->load(base_url() . "dist/xml/links.xml");

        $links = $xmlDoc->getElementsByTagName('link');

        $input_str = $this->input->get("input_str");
        $user_type = $this->input->get("user_type");

        if (strlen($input_str) > 0) {
            $hint = "";

            foreach ($links as $link) {
                $titles = $link->getElementsByTagName('title');
                $urls = $link->getElementsByTagName('url');

                if ($titles->length > 0 && stristr($titles->item(0)->nodeValue, $input_str)) {
                    $url = $urls->item(0)->nodeValue;
                    $title = $titles->item(0)->nodeValue;

                    if ($user_type === "admin" || ($url !== "employees" && $url !== "announcements")) {
                        if ($title != "My Profile") {
                            $linkHTML = "<a href='" . $url . "'>" . $title . "</a>";
                        } else {
                            $linkHTML = "<a href='" . $url . "?employee_id=" . $this->session->userdata("primary_key") . "'>" . $title . "</a>";
                        }

                        if (empty($hint)) {
                            $hint = $linkHTML;
                        } else {
                            $hint .= $linkHTML;
                        }
                    }
                }
            }
        }

        if (empty($hint)) {
            $response = "no suggestion";
        } else {
            $response = $hint;
        }

        echo $response;
    }

    public function get_barangay_cases_data()
    {
        $currentYear = date("Y");
        $currentMonth = date("m");

        $barangay_cases_data = $this->model->MOD_GET_BARANGAY_CASES_DATA($currentYear, $currentMonth);

        $response = json_encode($barangay_cases_data);

        echo $response;
    }

    public function get_barangay_case_data()
    {
        $primary_key = $this->input->post("primary_key");

        $barangay_case_data = $this->model->MOD_GET_SINGLE_BARANGAY_CASES_DATA($primary_key);

        $response = json_encode($barangay_case_data);

        echo $response;
    }

    public function new_barangay_case()
    {
        $date = date("Y-m-d");
        $time = date("h:i A");
        $name = $this->input->post("new_barangay_case_name");
        $mobile_number = $this->input->post("new_barangay_case_mobile_number");
        $address = $this->input->post("new_barangay_case_address");
        $nature_of_complaint = $this->input->post("new_barangay_case_nature_of_complaint");
        $description = $this->input->post("new_barangay_case_description");
        $image = $this->input->post("new_barangay_case_image");

        if ($image) {
            $image = $this->convert_data_uri_to_plain_image_and_save($image);
        } else {
            $image = "default_image.png";
        }

        $this->model->MOD_ADD_BARANGAY_CASE($date, $time, $name, $mobile_number, $address, $nature_of_complaint, $description, $image);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You've successfully added a barangay case.",
            "type" => "success"
        ));

        redirect(base_url() . "barangay_cases");
    }

    public function edit_barangay_case()
    {
        $primary_key = $this->input->post("primary_key");
        $name = $this->input->post("new_barangay_case_name");
        $mobile_number = $this->input->post("new_barangay_case_mobile_number");
        $address = $this->input->post("new_barangay_case_address");
        $nature_of_complaint = $this->input->post("new_barangay_case_nature_of_complaint");
        $description = $this->input->post("new_barangay_case_description");
        $image = $this->input->post("new_barangay_case_image");
        $old_image = $this->input->post("old_barangay_case_image");

        if ($image) {
            $image = $this->convert_data_uri_to_plain_image_and_save($image);
        } else {
            $image = $old_image;
        }

        $this->model->MOD_UPDATE_BARANGAY_CASE($name, $mobile_number, $address, $nature_of_complaint, $description, $image, $primary_key);

        $is_barangay_cases = $this->session->userdata("is_barangay_cases");

        if ($is_barangay_cases) {
            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "You've successfully updated a barangay case.",
                "type" => "success"
            ));
        } else {
            $this->update_barangay_case_status("approved", $primary_key);

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "You've successfully approved a barangay case.",
                "type" => "success"
            ));
        }

        redirect(base_url() . "barangay_cases");
    }

    public function delete_barangay_case()
    {
        $primary_key = $this->input->get("primary_key");

        $current_tab = $this->session->userdata("current_tab");

        $this->model->MOD_DELETE_BARANGAY_CASE($primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You have successfully deleted a barangay case.",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function reject_barangay_case()
    {
        $primary_key = $this->input->get("primary_key");

        $this->update_barangay_case_status("rejected", $primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You have successfully rejected a barangay case.",
            "type" => "success"
        ));

        redirect(base_url() . "pending_cases");
    }

    public function register_as_citizen()
    {
        $first_name = $this->input->post("first_name");
        $middle_name = $this->input->post("middle_name");
        $last_name = $this->input->post("last_name");
        $sex = $this->input->post("sex");
        $birthday = $this->input->post("birthday");
        $mobile_number = $this->input->post("mobile_number");
        $email = $this->input->post("email");
        $address = $this->input->post("address");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $image = isset($_FILES["image"]) ? $_FILES["image"] : null;

        $error = 0;

        $check_list = array();

        $email_exists = $this->model->MOD_CHECK_EMAIL_CITIZEN($email);
        $username_exists = $this->model->MOD_CHECK_USERNAME_CITIZEN($username);

        if ($email_exists) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($username_exists) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($error == 0) {
            $password = password_hash($password, PASSWORD_BCRYPT);

            if ($image) {
                $image = $this->file_upload("image");
            } else {
                $image = "";
            }

            $this->model->MOD_ADD_CITIZEN($first_name, $middle_name, $last_name, $sex, $birthday, $mobile_number, $email, $address, $image, $username, $password);

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "Information is successfully saved",
                "type" => "success"
            ));
        }

        echo json_encode($check_list);
    }

    public function download_apk_file()
    {
        $file = 'dist/installers/mobile/barangay_cases_management_system.apk';
        $filename = 'barangay_cases_management_system.apk';

        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . $filename . "\"");
        readfile($file);
    }

    public function download_exe_file()
    {
        $file = 'dist/installers/windows/barangay_cases_management_system.exe';
        $filename = 'barangay_cases_management_system.exe';

        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . $filename . "\"");
        readfile($file);
    }

    public function upload_image_from_desktop_app()
    {
        echo $this->file_upload("file");
    }

    public function logout()
    {
        $this->session->unset_userdata("primary_key");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You've been successfully signed out!",
            "type" => "success"
        ));

        header("Location: " . base_url() . "login");
    }

    private function update_barangay_case_status($status, $primary_key)
    {
        if ($status == "approved") {
            $status = "4";
        } else {
            $status = "3";
        }

        $this->model->MOD_UPDATE_BARANGAY_CASE_STATUS($status, $primary_key);
    }

    private function file_upload($filename)
    {
        $originalFilename = $_FILES[$filename]['name'];
        $temporaryFilePath = $_FILES[$filename]['tmp_name'];

        // Check for allowed file types (you can customize this based on your requirements)
        $allowedFileTypes = array('jpg', 'jpeg', 'png');
        $fileExtension = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedFileTypes)) {
            return false;
        } else {
            // Generate a unique filename to avoid conflicts
            $targetDirectory = "dist/img/user_upload/";
            $fileExtension = pathinfo($originalFilename, PATHINFO_EXTENSION);
            $uniqueId = uniqid();
            $uniqueFilename = $uniqueId . '_' . time() . '.' . $fileExtension;

            while (file_exists($targetDirectory . '/' . $uniqueFilename)) {
                $uniqueId = uniqid();
                $uniqueFilename = $uniqueId . '_' . time() . '.' . $fileExtension;
            }

            if (move_uploaded_file($temporaryFilePath, "dist/img/user_upload/" . $uniqueFilename)) {
                return $uniqueFilename;
            } else {
                return false;
            }
        }
    }

    private function convert_data_uri_to_plain_image_and_save($image_uri)
    {
        $dataUri = $image_uri;
        $savePath = "dist/img/user_upload/";

        list($type, $data) = explode(';', $dataUri);
        list(, $data) = explode(',', $data);

        $imageData = base64_decode($data);

        $mimeParts = explode('/', $type);
        $fileExtension = end($mimeParts);

        $currentDateTime = new DateTime();
        $fileName = md5($currentDateTime->format('Y-m-d H:i:s')) . '.' . $fileExtension;
        $fullPath = $savePath . $fileName;

        if (file_put_contents($fullPath, $imageData)) {
            return $fileName;
        } else {
            return false;
        }
    }
}
