<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Book extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_User");
        $this->load->model("M_BookCategory");
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
