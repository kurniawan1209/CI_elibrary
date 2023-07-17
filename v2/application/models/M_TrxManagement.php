<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TrxManagement extends CI_Model {
    
    public function get_transaction_list($filter){
        $where = "";
        if ($filter == "need-approval"){
            $where = "and tt.is_submitted = 'y' and tt.returned_date is null";
        }

        $sql = "select tt.*, tu.username, tb.book_name, 
                    group_concat(tbt.book_type_name separator ', ') book_type,
                    datediff(tt.end_date, current_date()) difference,
                    tup.penalty_id, tup.approved_date,
                    case 
                        when tt.returned_date is not null and tup.approved_date is not null 
                            then 'done|primary'
                        when tt.submitted_date is not null and tt.returned_date is null 
                            then 'waiting approval|warning'
                        when tt.returned_date is not null and tup.approved_date is null
                            and tup.evidence is not null
                            then 'waiting penalty approval|warning'
                        when tt.returned_date is not null and tup.approved_date is null
                            and tup.evidence is null
                            then 'waiting penalty evidence|danger'
                        else 'on going|success'
                    end status
                from tb_transactions tt 
                    left join tb_books tb on tt.book_id = tb.book_id 
                    left join tb_users tu on tt.user_id = tu.user_id 
                    left join tb_book_type_relations tbtr on tb.book_id = tbtr.book_id 
                    left join tb_book_types tbt on tbtr.book_type_id = tbt.book_type_id 
                    left join tb_user_penalties tup on tt.transaction_id = tup.transaction_id 
                where 1=1 $where
            group by tt.transaction_id, tb.book_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function approve_transaction($transaction_id){
        $sql = "UPDATE tb_transactions 
                   SET returned_date = submitted_date
                 WHERE transaction_id = $transaction_id";
        $this->db->query($sql);
    }

    public function assign_penalty($transaction_id, $penalty_type_id){
        $sql = "INSERT INTO tb_user_penalties (transaction_id, penalty_type_id)
                     VALUES ($transaction_id, $penalty_type_id)";
        $this->db->query($sql);
    }

}