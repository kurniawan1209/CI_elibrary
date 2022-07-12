<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Client extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_Index");
        $this->load->model("M_User");
        $this->load->model("M_BookCategory");
        $this->load->database();
    }

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
        $this->load->view("client/template/V_Header", $data);
        $this->load->view("client/".$content, $data);
        $this->load->view("client/template/V_Footer", $data);
    }

    public function index(){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));
        $data["book_types"] = $this->M_BookCategory->get_all_type_book();

        $this->load_user_view("V_Index", $data);
    }  

    public function user_book_categories($book_type_id){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $this->load_user_view("V_BookCategories", $data);
    }

}
?>