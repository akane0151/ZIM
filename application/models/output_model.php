<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:37 AM
 */
class Output_model extends CI_Model
{

    public function get_outputs()
    {
        // = $this->db->get('outputs');
        $this->db->select('outputs.id, outputs.date, products.Name, outputs.number, outputs.descriptions');
        $this->db->from('outputs');
        $this->db->join('products','outputs.product_id=products.id','inner');
        //$this->db->join('users','outputss.user_id=users.id','inner');
        $query=$this->db->get();
        return $query;
    }

    public function get_output($id)
    {
        $this->db->where('outputs.id',$id);
        $this->db->select('outputs.id, outputs.date, outputs.product_id, outputs.number, outputs.last_stock, outputs.descriptions, users.username');
        $this->db->from('outputs');
        //$this->db->join('products','outputs.product_id=products.id','inner');
        $this->db->join('users','outputs.user_id=users.id','inner');

        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $data = array (
                'id' => $row['id'],
                'pid' => $row['product_id'],
                'Date' => $row['date'],
                'Number' => $row['number'],
                'LastStock' => $row['last_stock'],
                'User' => $row['username'],
                'Descriptions' => $row['descriptions']
            );
            return $data;
        } else {
            return "Error"; // Has keys 'code' and 'message'
        }

    }


    public function insert_output($data)
    {
        try{
            $result = $this->db->insert('outputs', $data);
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
        $this->db->select('number');
        $a = $this->db->get('outputs');

        $interval = abs($a->row()->number - $data['number']);
        if($data['number'] > $a->row()->number){
            $this->db->where('id', $data['product_id']);
            $this->db->set('OnHand','OnHand-'.$interval,FALSE);
            $this->db->set('Shipped','Shipped+'.$interval,FALSE);
            if($this->db->update('products')){
                $this->db->where('id', $id);
                $result = $this->db->update('outputs', $data);
                return $result;
            }

        } else{
            $this->db->where('id', $data['product_id']);
            $this->db->set('OnHand','OnHand+'.$interval,FALSE);
            $this->db->set('Shipped','Shipped-'.$interval,FALSE);
            if($this->db->update('products')){
                $this->db->where('id', $id);
                $result = $this->db->update('outputs', $data);
                return $result;
            }
        }
        return false;
    }
    public function remove_output($id){
        try{
            $this->db->where('id', $id);
            $this->db->select('number, product_id');
            $a = $this->db->get('outputs');

            $this->db->where('id', $a->row()->product_id);
            $this->db->set('OnHand','OnHand+'.$a->row()->number,FALSE);
            $this->db->set('Shipped','Shipped-'.$a->row()->number,FALSE);
            if($this->db->update('products')){
                $this->db->where('id',$id);
                $res = $this->db->delete('outputs');
                return $res;
            }
            return false;
        }
        catch(Exception $e){

        }
    }
}