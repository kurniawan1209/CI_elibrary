<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Checker {

    function __construct()
    {
        $this->load->model("M_Index");
        $this->load->library("session");
    }

    function get_detail_user($user_id){
        /**
         * Function to fetch user detail
         */
        $details = $this->M_Index->get_detail_user($user_id);
        return $details;
    }

    function check_session(){
		/**
		 * Function to check user session by checking username index on session userdata
		 */

		if(empty($this->session->userdata("user_id"))){
			redirect("login");
		}
	}

    function load_user_view($content, $data){
        /**
         * Function to load user view
         */
        $this->load->view("user/template/V_UserHeader.php", $data);
        $this->load->view("user/".$content.".php", $data);
        $this->load->view("user/template/V_UserFoooter.php", $data);
    }

    function load_admin_view($content, $data){
        /**
         * Function to load admin view
         */
        $this->load->view("admin/template/V_AdminHeader.php", $data);
        $this->load->view("admin/template/V_AdminSidebar.php", $data);
        $this->load->view("admin/".$content.".php", $data);
        $this->load->view("admin/template/V_AdminFoooter.php", $data);
    }
}


?>