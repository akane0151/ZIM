<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:37 AM
 */
class Item_model extends CI_Model
{

    public function get_items($id)
    {
        $this->db->where('project_id',$id);
        $query = $this->db->get('project_items');
        return $query;
    }

    public function insert($data)
    {
        try{
            $result = $this->db->insert('project_items', $data);
            if($result){
                return $result;
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
        $result = $this->db->update('project_items', $data);
        return $result;
    }

    public function remove($id){
        try{
            $this->db->where('id',$id);
            $res = $this->db->delete('project_items');
            return $res;
        }
        catch(Exception $e){
        }
    }
}