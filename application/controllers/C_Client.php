<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Client extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_User");
        $this->load->model("M_BookCategory");
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
        $user_id = $this->session->userdata("user_id");

        $data["user_login"] = $this->get_detail_user($user_id);
        $user_check = $this->M_Client->check_user_activity($user_id)[0];

        if($user_check["activity"] > 0){
            $most_read_book_types = $this->M_Client->get_most_read_book_types($user_id);
            $book_types = array();

            foreach ($most_read_book_types as $key => $value) {
                array_push($book_types, $value["book_type_id"]);
            }

            $book_types = implode(", ", $book_types);

            $books = $this->M_Client->get_recommended_book_by_types($user_id, $book_types);
            $data["books"] = array();

            $index = 0;
            foreach ($books as $key => $book) {
                $index++;
                $curr_index = ceil($index/5);
                $data["books"][$curr_index][] = $book;
            }

            $data["book_source"] = "user_list";

        } else {

            $data["book_source"] = "week_list";

            $day_of_week = $this->M_Client->get_recommended_book_type_by_activity(date("Y-m-d"))[0];
            $start_date = $day_of_week["first_day"];
            $end_date = $day_of_week["last_day"];

            $books = $this->M_Client->get_recommended_book_in_this_week($start_date, $end_date);
            $data["books"] = array();

            $index = 0;
            foreach ($books as $key => $book) {
                $index++;
                $curr_index = ceil($index/5);
                $data["books"][$curr_index][] = $book;
            }
        }

        $data["book_categories"] = $this->M_Client->get_recommended_book_type_by_activity();

        $this->load_user_view("V_Index", $data);
    }  

    public function user_book_categories($book_type_id){
        $this->check_session();
        $data["user_login"] = $this->get_detail_user($this->session->userdata("user_id"));

        $this->load_user_view("V_BookCategories", $data);
    }

}
?>