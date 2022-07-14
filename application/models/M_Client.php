<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Client extends CI_Model {

    public function get_most_read_book_types($user_id){
        $sql = " SELECT tbt.book_type_id, count(*) total_book
                   FROM tb_books tb,
                        tb_book_types tbt,
                        tb_user_book_activities tuba
                   WHERE 1=1
                     AND tb.book_type_id = tbt.book_type_id
                     AND tuba.book_id = tb.book_id
                     AND tuba.user_id = $user_id
                GROUP BY tbt.book_type_id
                ORDER BY 2 DESC
                   LIMIT 3";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_recommended_book_by_types($user_id, $book_types){
        $sql = "SELECT tb.book_name, tb.book_id, 
                       concat(tbt.book_type_name, '/', tb.cover) cover,
                       count(tuba.book_id) total_pinjam
                  FROM tb_books tb,
                       tb_user_book_activities tuba,
                       tb_book_types tbt
                 WHERE tb.book_id = tuba.book_id
                   AND tb.book_type_id IN ($book_types)
                   AND tb.book_type_id = tbt.book_type_id
                   AND tb.book_id not in (SELECT book_id
                                            FROM tb_user_book_activities
                                           WHERE user_id = $user_id)
                 GROUP BY tb.book_name, tb.book_id, 
                          concat(tbt.book_type_name, '/', tb.cover)
                 ORDER BY 3 DESC
                 LIMIT 15";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_recommended_book_type_by_activity(){
        $sql = "SELECT tbt.book_type_id, tbt.book_type_name,
                       tbt.book_type_logo, concat(substr(tbt.book_type_description,1,100),'....')  book_type_description,
                       replace(lower(tbt.book_type_name), ' ', '-') book_type_slug,
                       count(tuba.activity_id) total_activity
                  FROM tb_user_book_activities tuba,
                       tb_books tb,
                       tb_book_types tbt
                 WHERE 1=1
                   AND tuba.book_id = tb.book_id
                   AND tb.book_type_id = tbt.book_type_id
                 GROUP BY tbt.book_type_id, tbt.book_type_name,
                          tbt.book_type_logo, tbt.book_type_description
                 ORDER BY 5 DESC
                    LIMIT 6";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_recommended_book_in_this_week($start_date, $end_date){
        $sql = "SELECT tb.book_name, tb.book_id, 
                        concat(tbt.book_type_name, '/', tb.cover) cover,
                        count(tuba.book_id) total_pinjam
                FROM tb_books tb,
                        tb_user_book_activities tuba,
                        tb_book_types tbt
                WHERE tb.book_id = tuba.book_id
                    AND tb.book_type_id = tbt.book_type_id
                    AND tuba.start_date between '$start_date' and '$end_date'
                GROUP BY tb.book_name, tb.book_id, 
                        concat(tbt.book_type_name, '/', tb.cover)
                ORDER BY 4 DESC
                LIMIT 15";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_start_or_end_date_week($date){
        $sql = "SELECT date_add('$date', interval  -WEEKDAY('$date')-1 day) first_day, 
                       date_add(date_add('$date', interval  -WEEKDAY('$date')-1 day), interval 6 day) last_day";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function check_user_activity($user_id){
        $sql = "SELECT count(*) activity FROM tb_user_book_activities WHERE user_id = $user_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_all_book_by_slug($slug, $user_id){
        $sql = "SELECT tb.*, tbt.book_type_name
                  FROM tb_books tb, tb_book_types tbt
                 WHERE tb.book_type_id = tbt.book_type_id 
                   AND tb.book_id NOT IN (SELECT DISTINCT book_id 
                                            FROM tb_user_book_activities
                                           WHERE user_id = $user_id)
                   AND replace(lower(tbt.book_type_name), ' ', '-') = '$slug'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_all_collections($user_id){
        $sql = "SELECT tb.*, tbt.book_type_name, tuba.end_date
                  FROM tb_books tb, tb_user_book_activities tuba,
                       tb_book_types tbt
                 WHERE tb.book_id = tuba.book_id
                   AND tbt.book_type_id = tb.book_type_id
                   AND tuba.end_date >= current_date
                   AND tuba.user_id = $user_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insert_user_book_activities($user_id, $book_id){
        $sql = "INSERT 
                  INTO tb_user_book_activities (user_id, book_id, start_date, end_date)
                     VALUES ($user_id, $book_id, current_date, current_date + 7)";
        $this->db->query($sql);
    }

}

?>