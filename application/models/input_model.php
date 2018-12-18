<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:37 AM
 */
class Input_model extends CI_Model
{

    public function get_inputs()
    {
        $this->db->select('inputs.id, inputs.final_price, inputs.date, products.Name, inputs.number');
        $this->db->from('inputs');
        $this->db->join('products','inputs.product_id=products.id','inner');
        //$this->db->join('users','inputs.user_id=users.id','inner');
        $query=$this->db->get();
        return $query;
    }

    public function get_input($id)
    {
        $this->db->where('inputs.id',$id);
        $this->db->select('inputs.id,,inputs.product_id, inputs.date, inputs.unit_price, inputs.final_price, inputs.number, inputs.last_stock, inputs.supplier, inputs.descriptions, users.username');
        $this->db->from('inputs');
        $this->db->join('products','inputs.product_id=products.id','inner');
        $this->db->join('users','inputs.user_id=users.id','inner');

        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $data = array (
                'id' => $row['id'],
                'pid' => $row['product_id'],
                'Date' => $row['date'],
                'UnitPrice' => $row['unit_price'],
                'FinalPrice' => $row['final_price'],
                'Number' => $row['number'],
                'LastStock' => $row['last_stock'],
                'Supplier' => $row['supplier'],
                'User' => $row['username'],
                'Descriptions' => $row['descriptions']
            );
            return $data;
        } else {
            return "Error"; // Has keys 'code' and 'message'
        }

    }


    public function insert_input($data)
    {
        try{
            $result = $this->db->insert('inputs', $data);
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
        $a = $this->db->get('inputs');
        $interval = abs($a->row()->number - $data['number']);
        if($data['number']>$a->row()->number){
            $this->db->where('id', $data['product_id']);
            $this->db->set('OnHand','OnHand+'.$interval,FALSE);
            $this->db->set('Received','Received+'.$interval,FALSE);
            if($this->db->update('products')){
                $this->db->where('id', $id);
                $result = $this->db->update('inputs', $data);
                return $result;
            }

        } else{
            $this->db->where('id', $data['product_id']);
            $this->db->set('OnHand','OnHand-'.$interval,FALSE);
            $this->db->set('Received','Received-'.$interval,FALSE);
            if($this->db->update('products')){
                $this->db->where('id', $id);
                $result = $this->db->update('inputs', $data);
                return $result;
            }
        }
        return false;

    }
    public function remove_input($id){
        try{
            $this->db->where('id', $id);
            $this->db->select('number, product_id');
            $a = $this->db->get('inputs');

            $this->db->where('id', $a->row()->product_id);
            $this->db->set('OnHand','Onhand-'.$a->row()->number,FALSE);
            $this->db->set('Received','Received-'.$a->row()->number,FALSE);
            if($this->db->update('products')){
                $this->db->where('id',$id);
                $res = $this->db->delete('inputs');
                return $res;
            }
            return false;
        }
        catch(Exception $e){

        }
    }
}