<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:37 AM
 */
class Project_model extends CI_Model
{


    public function get_projects()
    {
        $query = $this->db->get('projects');
        return $query;
    }

    public function get_project($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('projects');
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $data = array (
                'id' => $row['id'],
                'name' => $row['name'],
                'descriptions' => $row['descriptions'],
                'items' => $row['items']
            );
            return $data;
        } else {
            return "Error"; // Has keys 'code' and 'message'
        }

    }


    public function insert_project($data)
    {
        try{
            $result = $this->db->insert('projects', $data);
            if($result){
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
        $result = $this->db->update('projects', $data);
        return $result;
    }
    public function remove_project($id){
        try{
            $this->db->where('id',$id);
            $res = $this->db->delete('projects');
            return $res;

        }
        catch(Exception $e){

        }
    }
}