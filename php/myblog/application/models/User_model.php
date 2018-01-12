<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18/1/11
 * Time: 上午10:40
 */
class User_model extends CI_Model
{

    public function add($user){
        $this->db->insert('t_user',$user);
        return $this->db->affected_rows();
    }

    public function user_list(){
        $query = $this -> db -> get("t_user");
//        $query = $this -> db -> get_where("t_user",array('name'=>'lisi'));

        return $query->result();
    }

    public function del_user($id){
        $this->db->delete('t_user', array('id' => $id));
        return $this->db->affected_rows();
    }

    public function get_user_by_email($email){
        $query = $this->db->get_where('t_user', array('email' => $email));
        return $query->result();
    }

    public function update($id,$name){
        $this->db->where('id', $id);
        $this->db->update('t_user', array(
            "name" => $name,
        ));
        return $this->db->affected_rows();
    }

}