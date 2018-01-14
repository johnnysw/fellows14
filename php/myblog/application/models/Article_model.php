<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18/1/13
 * Time: 下午3:20
 */
class Article_model extends CI_Model
{
    public function get_article_list($offset,$page_size){

//        $sql = "select * from t_article a ,t_article_type t where a.type_id = t.type_id";


        $this->db->select('*');
        $this->db->from('t_article a');
        $this->db->join('t_article_type t', 'a.type_id = t.type_id','left');
        $this->db->limit($page_size, $offset);
        $query = $this->db->get();

//        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_count_article(){

        return $this->db->count_all('t_article');
    }


    public function get_article_type(){
        $sql ="select * from
                 (select count(*) num,a.type_id
                 from t_article a 
                GROUP BY a.type_id) nt,
                t_article_type t 
                where t.type_id = nt.type_id";

        $query = $this->db->query($sql);
        return $query->result();

    }
}