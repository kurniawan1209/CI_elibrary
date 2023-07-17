<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

    public function get_all_user(){
        $sql = "SELECT u.username, u.full_name, u.creation_date, u.address, 
                       u.phone, u.role_id, br.role_name, u.user_id
                  FROM tb_users u right join
                       tb_user_roles br on u.role_id = br.role_id
                 WHERE u.active_flag ='Y'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_detail_user($user_id){
        $sql = "SELECT u.*, br.role_name
                  FROM tb_users u right join
                       tb_user_roles br on u.role_id = br.role_id
                 WHERE user_id = $user_id";
                 
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function user_insert($users){
        $sql = "INSERT INTO tb_users 
                     VALUES (null, current_timestamp, '$users[username]',
                             '$users[password]', '$users[full_name]', '$users[address]',
                             '$users[gender]', '$users[birth_date]', '$users[phone]',
                             '$users[email]', '$users[photo]', '$users[role]', 'Y', NULL)";
        $this->db->query($sql);
    }

    public function user_update($user_id, $users, $with_password, $with_photo){
        $pass_sql = "";
        if ($with_password == "Y"){
            $pass_sql = "password = '$users[password]',";
        }

        $photo_sql = "";
        if ($with_photo == "Y"){
            $photo_sql = "photo_profile = '$users[photo]',";
        }

        $sql = "UPDATE tb_users
                   SET username = '$users[username]',
                       $pass_sql
                       $photo_sql
                       full_name = '$users[full_name]',
                       address = '$users[address]',
                       gender = '$users[gender]',
                       birth_date = '$users[birth_date]',
                       phone = '$users[phone]',
                       email = '$users[email]',
                       role_id = '$users[role]'
                 WHERE user_id = $user_id";
        $this->db->query($sql);
    }

    public function user_set_inactive($user_id){
        $sql = "UPDATE tb_users
                   SET active_flag = 'N'
                 WHERE user_id = $user_id";
        $this->db->query($sql);
    }

    public function get_user_count(){
        $sql = "SELECT count(*) total_user
                  FROM tb_users
                 WHERE active_flag = 'Y'";
                 
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_user_activity_by_date($date){
        $sql = "SELECT count(distinct user_id) total
                  FROM tb_user_book_activities
                  WHERE creation_date = '$date'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}

?>