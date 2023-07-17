<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_UserRole extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_User");
        $this->load->model("M_UserRole");
        $this->load->database();
    }

// Start public 

    function check_session(){
		/**
		 * Function to check user session by checking username index on session userdata
		 */

		if(empty($this->session->userdata("user_id"))){
			redirect("login");
		}
	}

    function get_detail_user($user_id){
        /**
         * Function to fetch user detail
         */
        $details = $this->M_User->get_detail_user($user_id);
        return $details;
    }

    public function load_user_view($content, $data){
        /**
         * Function to load user view
         */
        $this->load->view("admin/template/V_Header", $data);
        $this->load->view("admin/template/V_Sidebar", $data);
        $this->load->view("admin/".$content, $data);
        $this->load->view("admin/template/V_Footer", $data);
    }

// End Public

// Start User Role

    public function user_role(){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $data["menu"] = "User Role";
        $data["roles"] = $this->M_UserRole->get_all_user_role();

        $this->load_user_view("user_role/V_UserRole", $data);
    }

    public function create_or_edit_user_role($role_id=null){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        if ($role_id){
            $this->M_UserRole->user_role_update($role_id, $_POST);
        } else {
            $this->M_UserRole->user_role_insert($_POST);
        }

        redirect("admin/user-role");
    }

    public function delete_user_role($role_id){
        $this->M_UserRole->user_role_set_inactive($role_id);
        redirect("admin/user-role");
    }

// End User Role

}
