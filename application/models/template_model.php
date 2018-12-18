<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:37 AM
 */
class Template_model extends CI_Model
{
    public function get_templates()
    {
        $query = $this->db->get('templates');
        return $query;
    }

    public function get_template($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('templates');
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $data = array (
                'id' => $row['id'],
                'name' => $row['name'],
                'descriptions' => $row['descriptions'],
                'attributes' => $row['attributes']
            );
            return $data;
        } else {
            return "Error"; // Has keys 'code' and 'message'
        }
    }

    public function insert_template($data)
    {
        try{
            //$result = $this->db->query("insert into templates ('name', 'descriptions', 'attributes') values ('". $data->name ."','".$data->descriptions."','".$data->attributes."')");
            $result = $this->db->insert('templates', $data);
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
        $result = $this->db->update('templates', $data);
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function remove_template($id){
        try{
            $this->db->where('id',$id);
            $res = $this->db->delete('templates');
            return $res;
        }
        catch(Exception $e){
        }
    }
}