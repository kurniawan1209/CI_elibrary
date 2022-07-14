<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_Index");
        $this->load->model("M_User");
        $this->load->model("M_Book");
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

        $data["total_users"] = $this->M_User->get_user_count()[0]["total_user"];
        $data["total_books"] = $this->M_Book->get_book_count()[0]["total_book"];

        $total_users_now = $this->M_User->get_user_activity_by_date("2022-07-05")[0]["total"];
        $total_books_now = $this->M_Book->get_book_activity_by_date("2022-07-05")[0]["total"];

        $user_percentage = round($total_users_now / $data["total_users"] * 100, 2);
        $book_percentage = round($total_books_now / $data["total_books"] * 100, 2);

        $data["traffic"] = round(($user_percentage + $book_percentage) / 2, 2);

        $data["menu"] = "Dashboard";
        $this->load_user_view("dashboard/V_Dashboard", $data);
    } 

    public function get_user_activity(){
        $user_activity = $this->M_index->get_data_user_activity()[0]["activity"];
        $user_activity = explode(",", $user_activity);
        return json_encode($user_activity);
    }

}
