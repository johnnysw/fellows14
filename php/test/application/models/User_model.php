<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18/1/11
 * Time: 上午10:40
 */
class User_model extends CI_Model
{

    public function add($name){
        $this->db->insert('t_user',array(
            'name'=>$name
        ));
        return $this->db->affected_rows();
    }

    public function user_list(){
//        $query = $this -> db -> get("t_user");
        $query = $this -> db -> get_where("t_user",array('name'=>'lisi'));

        return $query->result();
    }

}