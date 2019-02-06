<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:37 AM
 */
class Setting_model extends CI_Model
{

    public function get_settings()
    {
        $query = $this->db->get('settings');
        return $query;
    }

    public function set($name,$value)
    {
        $data = array(
            'value'=>$value
        );
        $this->db->where('name', $name);
        $result = $this->db->update('settings', $data);
        return $result;
    }

    public function get($name)
    {
        $this->db->select('value');
        $this->db->where('name',$name);
        $this->db->from('settings');
        $res = $this->db->get();
        return $res->row()->value;
    }


}