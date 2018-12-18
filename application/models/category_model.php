<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:37 AM
 */
class Category_model extends CI_Model
{

    public function get_categories()
    {
        $query = $this->db->get('categories');
        return $query;
    }
    public function get_tree()
    {
        $d = array();
        $result = $this->db->query("SELECT  id, name,name as text, parent_id FROM categories")->result_array();
        foreach ($result as $row) {
            $d[] = $row;
        }
            return $d;
    }
    public function get_category($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('categories');
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $data = array (
                'id' => $row['id'],
                'name' => $row['name'],
                'descriptions' => $row['descriptions'],
                'parent_id' => $row['parent_id']
            );
            return $data;
        }
        else {
            return "Error";
        }
    }

    public function insert_category($data)
    {
        try{
            $result = $this->db->insert('categories', $data);
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
        $result = $this->db->update('categories', $data);
        return $result;
    }
    public function remove_category($id){
        try{
            $this->db->where('id',$id);
            $res = $this->db->delete('categories');
            return $res;

        }
        catch(Exception $e){

        }
    }
}