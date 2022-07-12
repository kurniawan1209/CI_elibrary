<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_Index");
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
    

    public function login(){
        /**
         * Function to handle login process
         */
        
        // $this->check_session();
        $data["error"] = "";

        // check the method are used when accessing this function
        if ($_POST){
            $username = $_POST["username"];
            $password = md5($_POST["password"]);
            $validate = $this->M_Index->check_user_account($username, $password);

            if($validate){
                $this->session->set_userdata("user_id", $validate[0]["user_id"]);
                $this->session->set_userdata("role_id", $validate[0]["role_id"]);
                redirect("");
            } else {
                $this->session->set_flashdata("error", "hayolo");
                redirect("login");
            }
        } 

        $this->load->view("V_Login.php");
    }


    public function logout(){
        /**
         * Function to handle logout process
         */

        $this->session->sess_destroy();
		redirect("login");
    }


    public function index(){
        /**
         * First function are loaded after loading the construct
         */
        
        $this->check_session();

        if ($this->session->userdata("role_id") == "1"){
            redirect("admin/");
        } else {
            redirect("user/");
        }
    }
}

?>