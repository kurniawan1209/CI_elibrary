<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {

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

// Start User

    public function user(){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $data["menu"] = "User";
        $data["users"] = $this->M_User->get_all_user();

        $this->load_user_view("user/V_User", $data);
    }

    public function create_or_edit_user($user_id=null){
        // $this->check_session();
        // $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $data["detail_user_processed"] = "";
        if ($user_id){
            $data["detail_user_processed"] = $this->get_detail_user($user_id);
        }

        if ($_POST){
            $datas = $_POST;

            // setup and load upload library
			$config['upload_path']          = FCPATH.'assets/img/user_profile/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10240;
			$config['max_width']            = 10240;
			$config['max_height']           = 7680;

			$this->load->library('upload', $config);

            $datas["photo"] = "";
            if ($_FILES["files"]["size"] > 0) {
                $file_ext = explode("/", $_FILES["files"]["type"])[1];
                $_FILES["files"]["name"] = date("Ymdhis") . "_" . $_POST["username"] . "." . $file_ext;
				$datas["photo"] = $_FILES["files"]["name"];
                $this->upload->do_upload("files");
			}

            if ($user_id){
                $with_password = "N";
                if (md5($_POST["password"]) == $data["detail_user_processed"][0]["password"]){
                    $with_password = "Y";
                }

                $with_photo = "N";
                if ($datas["photo"] != ""){
                    $with_photo = "Y";
                }

                $this->M_User->user_update($user_id, $datas, $with_password, $with_photo);

            } else {
                $datas["password"] = md5($datas["password"]);            
                $this->M_User->user_insert($datas);
            }

            redirect("admin/user");
        }
        
        $data["menu"] = "User";
        $data["roles"] = $this->M_UserRole->get_all_user_role();

        $this->load_user_view("user/V_CreateOrEditUser", $data);
    }

    public function delete_user($id){
        $this->M_User->user_set_inactive($id);
        redirect("admin/user");
    }

    public function detail_user($user_id){
        // $this->check_session();
        // $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $data["menu"] = "User";
        $data["users"] = $this->M_User->get_detail_user($user_id);

        $this->load_user_view("user/V_UserDetail", $data);
    }

// End User

}
