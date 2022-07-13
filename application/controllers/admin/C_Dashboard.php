<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_User");
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

    public function index(){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $data["menu"] = "Dashboard";
        $this->load_user_view("dashboard/V_Dashboard", $data);
    } 

}
