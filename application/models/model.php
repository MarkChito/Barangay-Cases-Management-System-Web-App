<?php

class model extends CI_Model
{
    /*============================== SELECT QUERIES ==============================*/
    public function MOD_GET_ALL_USER_DATA($primary_key)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_useraccounts` WHERE `primary_key`!=? ORDER BY `primary_key` DESC";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }

    public function MOD_GET_USER_DATA($primary_key)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_useraccounts` WHERE `primary_key`=?";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }
    
    public function MOD_GET_CITIZEN_DATA($primary_key)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_citizens` WHERE `primary_key`=?";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }

    public function MOD_CHECK_USERNAME($username)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_useraccounts` WHERE `username`=?";
        $query = $this->db->query($sql, array($username));

        return $query->result();
    }

    public function MOD_CHECK_RFID_NUMBER($rfid_number)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_useraccounts` WHERE `rfid_number`=?";
        $query = $this->db->query($sql, array($rfid_number));

        return $query->result();
    }

    public function MOD_CHECK_EMAIL($email)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_useraccounts` WHERE `email`=?";
        $query = $this->db->query($sql, array($email));

        return $query->result();
    }

    public function MOD_CHECK_EMAIL_CITIZEN($email)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_citizens` WHERE `email`=?";
        $query = $this->db->query($sql, array($email));

        return $query->result();
    }

    public function MOD_CHECK_USERNAME_CITIZEN($username)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_citizens` WHERE `username`=?";
        $query = $this->db->query($sql, array($username));

        return $query->result();
    }

    public function MOD_GET_ANNOUNCEMENTS()
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_announcements` ORDER BY `date_and_time` DESC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function MOD_GET_BARANGAY_NEWS()
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_barangaynews` ORDER BY `date` DESC , `time` DESC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function MOD_GET_BARANGAY_CASES_DATA($currentYear, $currentMonth)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_barangaycases` WHERE EXTRACT(YEAR FROM `date`) = ? AND EXTRACT(MONTH FROM `date`) = ? AND `status`='0' ORDER BY `date` ASC , `time` ASC";
        $query = $this->db->query($sql, array($currentYear, $currentMonth));

        return $query->result();
    }

    public function MOD_GET_ALL_BARANGAY_CASES_DATA()
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_barangaycases` WHERE `status`='0' OR `status`='4' ORDER BY `date` DESC , `time` DESC";
        $query = $this->db->query($sql, array());

        return $query->result();
    }
    
    public function MOD_GET_ALL_PENDING_CASES_DATA()
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_barangaycases` WHERE `status`='1' ORDER BY `date` DESC , `time` DESC";
        $query = $this->db->query($sql, array());

        return $query->result();
    }
    
    public function MOD_GET_CITIZEN_SUBMITTED_BARANGAY_CASES_DATA($citizen_primary_key)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_barangaycases` WHERE `citizen_primary_key`=? AND (`status`='3' OR `status`='4')  ORDER BY `date` DESC , `time` DESC";
        $query = $this->db->query($sql, array($citizen_primary_key));

        return $query->result();
    }

    public function MOD_GET_CITIZEN_APPROVED_BARANGAY_CASES_DATA($citizen_primary_key)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_barangaycases` WHERE `citizen_primary_key`=? AND (`status`='0' OR `status`='4')  ORDER BY `date` DESC , `time` DESC";
        $query = $this->db->query($sql, array($citizen_primary_key));

        return $query->result();
    }

    public function MOD_GET_SINGLE_BARANGAY_CASES_DATA($primary_key)
    {
        $sql = "SELECT * FROM tbl_barangaycasesmanagement_barangaycases WHERE `primary_key`=?";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }

    public function MOD_GET_SPECIFIC_BARANGAY_CASE($primary_key)
    {
        $sql = "SELECT * FROM `tbl_barangaycasesmanagement_barangaycases` WHERE `primary_key`=?";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }

    /*============================== INSERT QUERIES ==============================*/
    public function MOD_ADD_EMPLOYEE($first_name, $middle_name, $last_name, $rfid_number, $mobile_number, $email, $address, $position, $username, $password, $image)
    {
        $sql = "INSERT INTO `tbl_barangaycasesmanagement_useraccounts` (`first_name`, `middle_name`, `last_name`, `rfid_number`, `mobile_number`, `email`, `address`, `position`, `username`, `password`, `image`, `user_type`) VALUES (?,?,?,?,?,?,?,?,?,?,?,'user')";

        $this->db->query($sql, array($first_name, $middle_name, $last_name, $rfid_number, $mobile_number, $email, $address, $position, $username, $password, $image));
    }

    public function MOD_ADD_ANNOUNCEMENT($date_and_time, $title, $body)
    {
        $sql = "INSERT INTO `tbl_barangaycasesmanagement_announcements` (`date_and_time`, `title`, `body`) VALUES (?,?,?)";

        $this->db->query($sql, array($date_and_time, $title, $body));
    }

    public function MOD_ADD_BARANGAY_NEWS($date, $time, $title, $body, $image)
    {
        $sql = "INSERT INTO `tbl_barangaycasesmanagement_barangaynews` (`date`, `time`, `title`, `body`, `image`) VALUES (?,?,?,?,?)";

        $this->db->query($sql, array($date, $time, $title, $body, $image));
    }

    public function MOD_ADD_BARANGAY_CASE($date, $time, $name, $mobile_number, $address, $nature_of_complaint, $description, $image)
    {
        $sql = "INSERT INTO `tbl_barangaycasesmanagement_barangaycases` (`date`, `time`, `name`, `mobile_number`, `address`, `nature_of_complaint`, `description`, `image`) VALUES (?,?,?,?,?,?,?,?)";

        $this->db->query($sql, array($date, $time, $name, $mobile_number, $address, $nature_of_complaint, $description, $image));
    }

    public function MOD_SUBMIT_CASE_CITIZEN($citizen_primary_key, $date, $time, $name, $mobile_number, $address, $nature_of_complaint, $description, $status)
    {
        $sql = "INSERT INTO `tbl_barangaycasesmanagement_barangaycases` (`citizen_primary_key`, `date`, `time`, `name`, `mobile_number`, `address`, `nature_of_complaint`, `description`, `status`) VALUES (?,?,?,?,?,?,?,?,?)";
        $query = $this->db->query($sql, array($citizen_primary_key, $date, $time, $name, $mobile_number, $address, $nature_of_complaint, $description, $status));

        return $query;
    }

    public function MOD_ADD_CITIZEN($first_name, $middle_name, $last_name, $sex, $birthday, $mobile_number, $email, $address, $image, $username, $password)
    {
        $sql = "INSERT INTO `tbl_barangaycasesmanagement_citizens` (`first_name`, `middle_name`, `last_name`, `sex`, `birthday`, `mobile_number`, `email`, `address`, `image`, `username`, `password`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        $this->db->query($sql, array($first_name, $middle_name, $last_name, $sex, $birthday, $mobile_number, $email, $address, $image, $username, $password));
    }

    /*============================== UPDATE QUERIES ==============================*/
    public function MOD_UPDATE_PROFILE($first_name, $middle_name, $last_name, $position, $mobile_number, $email, $address, $image, $primary_key)
    {
        $sql = "UPDATE `tbl_barangaycasesmanagement_useraccounts` SET `first_name`=?, `middle_name`=?, `last_name`=?, `position`=?, `mobile_number`=?, `email`=?, `address`=?, `image`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($first_name, $middle_name, $last_name, $position, $mobile_number, $email, $address, $image, $primary_key));
    }
    
    public function MOD_UPDATE_PROFILE_CITIZEN($first_name, $middle_name, $last_name, $sex, $birthday, $mobile_number, $email, $primary_key)
    {
        $sql = "UPDATE `tbl_barangaycasesmanagement_citizens` SET `first_name`=?, `middle_name`=?, `last_name`=?, `sex`=?, `birthday`=?, `mobile_number`=?, `email`=? WHERE `primary_key`=?";
        $query = $this->db->query($sql, array($first_name, $middle_name, $last_name, $sex, $birthday, $mobile_number, $email, $primary_key));

        return $query;
    }
    
    public function MOD_UPDATE_ACCOUNT_CITIZEN($username, $password, $primary_key)
    {
        $sql = "UPDATE `tbl_barangaycasesmanagement_citizens` SET `username`=?, `password`=? WHERE `primary_key`=?";
        $query = $this->db->query($sql, array($username, $password, $primary_key));

        return $query;
    }
    
    public function MOD_UPDATE_ACCOUNT_CITIZEN_NO_PASSWORD($username, $primary_key)
    {
        $sql = "UPDATE `tbl_barangaycasesmanagement_citizens` SET `username`=? WHERE `primary_key`=?";
        $query = $this->db->query($sql, array($username, $primary_key));

        return $query;
    }

    public function MOD_UPDATE_ACCOUNT($rfid_number, $username, $password, $primary_key)
    {
        $sql = "UPDATE `tbl_barangaycasesmanagement_useraccounts` SET `rfid_number`=?, `username`=?, `password`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($rfid_number, $username, $password, $primary_key));
    }

    public function MOD_UPDATE_ANNOUNCEMENT($date_and_time, $title, $body, $primary_key)
    {
        $sql = "UPDATE `tbl_barangaycasesmanagement_announcements` SET `date_and_time`=?, `title`=?, `body`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($date_and_time, $title, $body, $primary_key));
    }

    public function MOD_UPDATE_BARANGAY_NEWS($date, $time, $title, $body, $image, $primary_key)
    {
        $sql = "UPDATE `tbl_barangaycasesmanagement_barangaynews` SET `date`=?, `time`=?, `title`=?, `body`=?, `image`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($date, $time, $title, $body, $image, $primary_key));
    }

    public function MOD_UPDATE_BARANGAY_CASE($name, $mobile_number, $address, $nature_of_complaint, $description, $image, $primary_key)
    {
        $sql = "UPDATE `tbl_barangaycasesmanagement_barangaycases` SET `name`=?, `mobile_number`=?, `address`=?, `nature_of_complaint`=?, `description`=?, `image`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($name, $mobile_number, $address, $nature_of_complaint, $description, $image, $primary_key));
    }
    
    public function MOD_UPDATE_BARANGAY_CASE_STATUS($status, $primary_key)
    {
        $sql = "UPDATE `tbl_barangaycasesmanagement_barangaycases` SET `status`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($status, $primary_key));
    }

    /*============================== DELETE QUERIES ==============================*/
    public function MOD_DELETE_EMPLOYEE($primary_key)
    {
        $sql = "DELETE FROM `tbl_barangaycasesmanagement_useraccounts` WHERE `primary_key`=?";

        $this->db->query($sql, array($primary_key));
    }

    public function MOD_DELETE_ANNOUNCEMENT($primary_key)
    {
        $sql = "DELETE FROM `tbl_barangaycasesmanagement_announcements` WHERE `primary_key`=?";

        $this->db->query($sql, array($primary_key));
    }

    public function MOD_DELETE_BARANGAY_NEWS($primary_key)
    {
        $sql = "DELETE FROM `tbl_barangaycasesmanagement_barangaynews` WHERE `primary_key`=?";

        $this->db->query($sql, array($primary_key));
    }

    public function MOD_DELETE_BARANGAY_CASE($primary_key)
    {
        $sql = "DELETE FROM `tbl_barangaycasesmanagement_barangaycases` WHERE `primary_key`=?";

        $this->db->query($sql, array($primary_key));
    }
}
