<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_BookType extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_User");
        $this->load->model("M_BookCategory");
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

}
