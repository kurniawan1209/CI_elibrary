<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Index extends CI_Model {

    public function check_user_account($username, $password){
        $sql = "SELECT * FROM tb_users WHERE username = '$username' and password = '$password'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_data_user_activity(){
        $sql = "SELECT group_concat (activity ORDER BY seq) activity
                    FROM (SELECT   seq, ifnull (activity, 0) activity
                            FROM (SELECT *
                                    FROM seq_1_to_12) tb
                                LEFT JOIN
                                (SELECT   DATE_FORMAT (start_date, '%m') months,
                                            COUNT (activity_id) activity
                                        FROM tb_user_book_activities
                                    WHERE DATE_FORMAT (start_date, '%Y') =
                                                                DATE_FORMAT (CURRENT_DATE, '%Y')
                                    GROUP BY DATE_FORMAT (start_date, '%m')) tb2
                                ON tb.seq = tb2.months
                        ORDER BY 1) tb3";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

?>