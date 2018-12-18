<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:37 AM
 */
class Product_model extends CI_Model
{
    public $name;
    public $productNumber;
    public $StartingInventory;
    public $Received;
    public $Shipped;
    public $OnHand;
    public $MinimumRequired;
    public $Description;


    public function get_products()
    {
        $query = $this->db->get('products');
        return $query;
    }

    public function get_product($id)
    {
        $this->db->where('ID',$id);
        $query = $this->db->get('products');
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $data = array (
                'id' => $row['id'],
                'Name' => $row['Name'],
                'ProductNumber' => $row['ProductNumber'],
                'StartingInventory' => $row['StartingInventory'],
                'Received' => $row['Received'],
                'Shipped' => $row['Shipped'],
                'OnHand' => $row['OnHand'],
                'MinimumRequired' => $row['MinimumRequired'],
                'Descriptions' => $row['Descriptions'],
                'template_id' => $row['template_id'],
                'attributes' => $row['attributes'],
                'category_id' => $row['category_id']
            );
            return $data;
        } else {
            return "Error"; // Has keys 'code' and 'message'
        }

    }


    public function insert_product($data)
    {
        try{
            $result = $this->db->insert('products', $data);
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
    public function get_stock($id){
        $this->db->select('OnHand');
        $this->db->where('id',$id);
        $this->db->from('products');
        $res = $this->db->get();
        return $res->row()->OnHand;
    }
    public function decrease_stock($id,$number){
        $this->db->where('id',$id);
        $this->db->set('Shipped', 'Shipped+'.$number, FALSE);
        $this->db->set('OnHand', 'OnHand-'.$number, FALSE);
        $res = $this->db->update('products');
        return $res;
    }
    public function update_stock($id,$number){
        $this->db->where('id',$id);
        $this->db->set('Received', 'Received+'.$number, FALSE);
        $this->db->set('OnHand', 'OnHand+'.$number, FALSE);
        $res = $this->db->update('products');
        return $res;
    }
    public function update($data,$id)
    {
        $this->db->where('id', $id);
        $result = $this->db->update('products', $data);
        return $result;
    }
    public function remove_product($id){
        try{
            $this->db->where('id',$id);
            $res = $this->db->delete('products');
            return $res;

        }
        catch(Exception $e){

        }
    }
}