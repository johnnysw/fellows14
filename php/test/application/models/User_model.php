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

}