<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Index extends CI_Model {

    public function get_weekly_recommendation(){

    }

    public function get_user_recommendation($total){

    }

    public function check_user_account($username, $password){
        $sql = "SELECT * FROM tb_users WHERE username = '$username' and password = '$password'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

?>