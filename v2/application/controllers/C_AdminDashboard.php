<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_AdminDashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_AdminDashboard");
        $this->load->model("M_Client");
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

    function load_view($view_name, $data){
        $this->load->view("admin/template/V_Header", $data);
        $this->load->view("admin/template/V_Sidebar", $data);
		$this->load->view("admin/template/V_Navbar", $data);
        $this->load->view("admin/".$view_name, $data);
		$this->load->view("admin/template/V_Footer", $data);
    }

    public function dashboard(){
        $this->check_session();

        $data["total_book"] = $this->M_Client->get_count("tb_books")[0]["total"];
        $data["total_user"] = $this->M_Client->get_count("tb_users")[0]["total"];

        $transaction = $this->M_AdminDashboard->get_total_trx("active")[0];

        $data["total_trx"] = $transaction["total_trx"];
        $data["total_trx_due"] = $transaction["total_due"];
        $data["due_percentage"] = $transaction["due_percentage"];

        $data["books"] = $this->M_AdminDashboard->get_top_book(10);
        $data["page"] = "dashboard";

        // echo "<pre>"; print_r($data); die;

        $this->load_view("V_Dashboard", $data);
    }

}

?>
