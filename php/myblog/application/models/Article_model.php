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

        $this->db->select('*');
        $this->db->from('t_article a');
        $this->db->join('t_article_type t', 'a.type_id = t.type_id','left');
        $this->db->limit($page_size, $offset);
        $query = $this->db->get();

//        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_logined_article_list($offset,$page_size,$user_id){

        $this->db->select('*');
        $this->db->from('t_article a');
        $this->db->join('t_article_type t', 'a.type_id = t.type_id','left');
        $this->db->where('a.user_id',$user_id);
        $this->db->order_by('a.article_id','desc');
        $this->db->limit($page_size, $offset);
        $query = $this->db->get();

//        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_count_article(){

        return $this->db->count_all('t_article');
    }

    public function get_logined_count_article($user_id){


        $query = $this->db->get_where('t_article',array('user_id'=>$user_id));

        return count($query->result());
//        return $this->db->count_all('t_article');
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

    public function get_logined_article_type($user_id){
        $sql ="select *,(select count(*) from 
            t_article a 
            where a.type_id = t.type_id) num
             from t_article_type t 
            where t.user_id = $user_id";

        $query = $this->db->query($sql);
        return $query->result();

    }

    public function get_type_by_user_id($user_id){
        $query = $this->db->get_where('t_article_type',array('user_id'=>$user_id));
        return $query->result();
    }

    public function publish_blog($article){
        $this->db->insert('t_article',$article);
        return $this->db->affected_rows();
    }

    public function add_type($name,$user_id){
        $this->db->insert('t_article_type',array(
            'type_name'=>$name,
            'user_id'=>$user_id
        ));
        return $this->db->affected_rows();
    }

}