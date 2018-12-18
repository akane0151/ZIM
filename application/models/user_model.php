<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:37 AM
 */
class User_model extends CI_Model
{

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query;
    }

    public function login($u,$p)
    {
        $this->db->where('username',$u);
        $this->db->where('password',$p);
        $query = $this->db->get('users',1);
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        else {
            return "Error";
        }
    }

    public function get_user($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $data = array (
                'id' => $row['id'],
                'username' => $row['username'],
                'access' => $row['access'],
                'fullname' => $row['fullname']
            );
            return $data;
        }
        else {
            return "Error";
        }
    }

    public function insert_user($data)
    {
        try{
            $result = $this->db->insert('users', $data);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        catch (Exception $e){
            return $e;
        }
    }

    public function update($data,$id)
    {
        $this->db->where('id', $id);
        $result = $this->db->update('users', $data);
        return $result;
    }

    public function remove_user($id){
        try{
            $this->db->where('id',$id);
            $res = $this->db->delete('users');
            return $res;

        }
        catch(Exception $e){

        }
    }
    public function checkpass($id,$p)
    {
        //$this->db->select('password');
        $this->db->where('id',$id);
        $this->db->where('password',$p);

        $query = $this->db->get('users',1);
        if ($query->num_rows() > 0)
        {
            return true;
        }
        else {
            return false;
        }
    }
}