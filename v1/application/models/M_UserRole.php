<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UserRole extends CI_Model {

    public function get_all_user_role(){
        $sql = "SELECT * FROM tb_user_roles WHERE active_flag = 'Y'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function user_role_insert($datas){
        $sql = "INSERT INTO tb_user_roles
                     VALUES (null, current_timestamp, '$datas[role_name]', 'Y', null)";
        $this->db->query($sql);
    }

    public function user_role_update($role_id, $datas){
        $sql = "UPDATE tb_user_roles
                   SET role_name = '$datas[role_name]'
                 WHERE role_id = $role_id";
        $this->db->query($sql);
    }

    public function user_role_set_inactive($role_id){
        $sql = "UPDATE tb_user_roles
                   SET active_flag = 'N' ,
                       inactive_date = current_timestamp
                 WHERE role_id = $role_id";
        $this->db->query($sql);
    }

}