<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_BookCategory extends CI_Model {

    public function get_all_type_book(){
        $sql = "SELECT * FROM tb_book_types"   ;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function book_type_insert($datas){
        $sql = "INSERT INTO tb_book_types
                     VALUES (NULL, current_timestamp, '$datas[book_type_name]',
                             $datas[created_by], '$datas[book_type_logo]',
                             '$datas[book_type_description]')";
        $this->db->query($sql);
    }
    
    public function book_type_update($id, $datas, $with_logo){
        $logo_sql = "";
        if ($with_logo == "Y"){
            $logo_sql = "book_type_logo = '".$datas["book_type_logo"]."',";
        }

        $sql = "UPDATE tb_book_types 
                   SET book_type_name = '$datas[book_type_name]',
                       $logo_sql
                       book_type_description = '$datas[book_type_description]'
                 WHERE book_type_id = $id";
        $this->db->query($sql);
    }
    
    public function book_type_set_inactive($id){
        $sql = "DELETE FROM tb_book_types
                 WHERE book_type_id = $id";
        $this->db->query($sql);
    }

} 

?>