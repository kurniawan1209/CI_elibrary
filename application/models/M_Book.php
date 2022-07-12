<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Book extends CI_Model {

    public function get_all_book(){
        $sql = "SELECT * FROM tb_books WHERE active_flag = 'Y'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function get_detail_book($book_id){
        $sql = "SELECT * FROM tb_books b, tb_book_types bt 
                WHERE b.book_id = $book_id and b.book_type_id = bt.book_type_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function book_insert($books){
        $sql = "INSERT INTO tb_books 
                     VALUES (NULL, current_timestamp, '$books[book_name]',
                             '$books[book_created_date]', '$books[author_name]',
                             $books[stock], '$books[created_by]', '$books[cover]',
                             '$books[synopsis]', '$books[book_type]', 'Y', NULL)";
        $this->db->query($sql);
    }
    
    public function book_update($book_id, $books, $with_cover){
        $cover_sql = "";
        if ($with_cover == "Y"){
            $cover_sql = "cover = '$books[cover]',";
        }

        $sql = "UPDATE tb_books 
                   SET book_name = '$books[book_name]',
                       book_created_date = '$books[book_created_date]',
                       author_name = '$books[author_name]',
                       cover = '$books[cover]',
                       stock = $books[stock],
                       $cover_sql
                       synopsis = '$books[synopsis]',
                       book_type_id = '$books[book_type]'
                 WHERE book_id = $book_id";
        $this->db->query($sql);
    }
    
    public function book_set_inactive($book_id){
        $sql = "UPDATE tb_books
                   SET active_flag = 'N',
                       inactive_date = current_timestamp
                 WHERE book_id = $book_id";
        $this->db->query($sql);
    }

} 

?>