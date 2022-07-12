<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_User");
        $this->load->model("M_UserRole");
        $this->load->model("M_BookCategory");
        $this->load->model("M_Book");
        $this->load->model("M_Index");
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

// Start Book Category
    public function book_category(){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $data["menu"] = "Book Category";
        $data["book_types"] = $this->M_BookCategory->get_all_type_book();

        $this->load_user_view("book_category/V_BookCategory", $data);
    }

    public function create_or_edit_book_cat($book_type_id=null){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $datas = $_POST;

        $config['upload_path']          = FCPATH.'assets/img/book_type_logo/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10240;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;

        $this->load->library('upload', $config);

        $datas["book_type_logo"] = "";
        $datas["created_by"] = $this->session->userdata("user_id");

        if ($_FILES["files"]["size"] > 0) {
            $file_ext = explode("/", $_FILES["files"]["type"])[1];
            $_FILES["files"]["name"] = date("Ymdhis") . "_" . $_POST["book_type_name"] . "." . $file_ext;
            $datas["book_type_logo"] = $_FILES["files"]["name"];
            $this->upload->do_upload("files");
        }

        if ($book_type_id){

            $with_logo = "N";
            if($datas["book_type_logo"] != ""){
                $with_logo = "Y";
            }
            $this->M_BookCategory->book_type_update($book_type_id, $datas, $with_logo);

        } else {
            $this->M_BookCategory->book_type_insert($datas);
        }

        redirect("admin/book-category");
    }

    public function delete_book_cat($id){
        $this->M_BookCategory->book_type_set_inactive($id);
        redirect("admin/book-category");
    }

// End Book Category

// Start Book

    public function book(){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $data["menu"] = "Book";
        $data["books"] = $this->M_Book->get_all_book();

        $this->load_user_view("book/V_Book", $data);
    }

    public function create_or_edit_book($book_id=null){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        if($_POST){
            $datas = $_POST;

            $config['upload_path']          = FCPATH.'assets/img/book/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10240;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;

            $this->load->library('upload', $config);

            $datas["cover"] = "";

            if ($_FILES["files"]["size"] > 0) {
                $file_ext = explode("/", $_FILES["files"]["type"])[1];
                $_FILES["files"]["name"] = date("Ymdhis") . "_" . $_POST["book_name"] . "." . $file_ext;
                $datas["cover"] = $_FILES["files"]["name"];
                $this->upload->do_upload("files");
            }

            if($book_id){
                $with_cover = "N";
                if($datas["cover"] != ""){
                    $with_cover = "Y";
                }

                $this->M_Book->book_update($book_id, $datas, $with_cover);
            } else {
                $datas["created_by"] = $this->session->userdata("user_id");
                $this->M_Book->book_insert($datas);
            }
            
            redirect("admin/book");
        }

        $data["menu"] = "Book";
        $data["book_types"] = $this->M_BookCategory->get_all_type_book();

        $data["book_detail"] = "";
        if ($book_id){
            $data["book_detail"] = $this->M_Book->get_detail_book($book_id);
        }

        $this->load_user_view("book/V_CreateOrEditBook", $data);

    }

    public function delete_book($book_id){
        $this->M_Book->book_set_inactive($book_id);
        redirect("admin/book");
    }

// End Book

}
