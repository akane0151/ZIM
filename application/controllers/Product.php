<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:36 AM
 */
class Product extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Product_model');
    }
    public function index()
    {
        if($this->session->userdata('login')){
            $data['module'] = 'product';
            $data['access'] = $this->session->userdata('access');
            $this->load->view("header.html");
            $this->load->view("sidebar",$data);
            $this->load->view("topbar");
            $this->load->view("pages/products");
            $this->load->view("footer.html");
        } else {
            redirect('user');
        }

    }
    public function get_products(){

        $res = $this->Product_model->get_products();
        $data = array();
        foreach($res->result() as $r) {
            $action = "<div class='table-data-feature'><button class='item editItem' data-toggle='tooltip' data-product_id='".$r->id."' data-placement='top' title='Edit'><i class='zmdi zmdi-edit'></i></button></button><button class='item removeItem' data-toggle='tooltip' data-product_id='".$r->id."' data-placement='top' title='Delete'><i class='zmdi zmdi-delete'></i></button></div>";
            $atr = "<ul>";
            foreach (json_decode($r->attributes) as $item){
                if($item->value != 'true' & $item->value != 'false'){
                    $atr .= "<li>".$item->name.": ".$item->value;
                    if(isset($item->unit)){
                        $atr .= " ".$item->unit."</li>";
                    } else {
                        $atr .= "<li/>";
                    }
                } else {
                    $atr .= "<li>".$item->name.": ".($item->value=="true"? "Yes" : "No")."</li>";
                }

            }
            $atr.="</ul>";

            $data[] = array(
                $r->id,
                $r->Name,
                $r->ProductNumber,
                //$r->StartingInventory,
                //$r->Received,
                //$r->Shipped,
                $r->OnHand,
                $atr,
                $r->Descriptions,
                $action
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function get_list(){

        $res = $this->Product_model->get_products();
        $data = array();
        foreach($res->result() as $r) {
            $atr = "";
            foreach (json_decode($r->attributes) as $item){
                if($item->value != 'true' & $item->value != 'false'){
                    $atr .= $item->value;
                    if(isset($item->unit)){
                        $atr .= $item->unit." - ";
                    }
                } else {
                    $atr = $item->value=="true"? $item->name : "";
                    $atr .= " - ";
                }

            }
            $data[] = array(
                $r->id,
                $r->Name,
                //$r->ProductNumber,
                //$r->StartingInventory,
                //$r->Received,
                //$r->Shipped,
                $r->OnHand,
                $atr
                //$r->Descriptions,
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function add(){
        try{
            $name = $this->input->post('Name', TRUE);
            $number = $this->input->post('ProductNumber', TRUE);
            $inventory = $this->input->post('StartingInventory', TRUE);
            //$received = $this->input->post('Received', TRUE);
            //$shipped = $this->input->post('Shipped', TRUE);
            //$onhand = $this->input->post('OnHand', TRUE);
            $minimum = $this->input->post('MinimumRequired', TRUE);
            $descriptions = $this->input->post('Descriptions', TRUE);
            $tid = $this->input->post('template_id', TRUE);
            $attr = $this->input->post('attributes', TRUE);
            $cid = $this->input->post('catid', TRUE);

            $data = array (
                    'Name' => $name,
                    'ProductNumber' => $number,
                    'StartingInventory' => $inventory,
                    //'Received' => $received,
                    //'Shipped' => $shipped,
                    'OnHand' => $inventory,
                    'MinimumRequired' => $minimum,
                    'Descriptions' => $descriptions,
                    'template_id' => $tid,
                    'attributes' => json_encode($attr),
                    'category_id' => $cid
                );
            $result = $this->Product_model->insert_product($data);
            if(!is_string($result) && $result)
                echo json_encode("true");
            elseif(is_string($result))
                echo $result;
            else
                echo json_encode("false");
        }catch (Exception $e){
            echo $e;
        }

    }
    public function get_product(){
        try{
            $id = $this->input->post('id', TRUE);


            $result = $this->Product_model->get_product($id);
            if(!is_string($result))
                echo json_encode($result);
            elseif(is_string($result))
                echo $result;
            else
                echo json_encode("false");
        }
        catch (Exception $e){
            echo $e->getMessage();
        }

    }
    public function get_stock(){
        $id = $this->input->post('id', TRUE);
        $result = $this->Product_model->get_stock($id);
        if(!is_string($result) && $result)
            echo json_encode($result);
        elseif(is_string($result))
            echo $result;
        else
            echo "false";
    }
    public function update(){
        try{
            $id = $this->input->post('id', TRUE);
            $name = $this->input->post('Name', TRUE);
            $number = $this->input->post('ProductNumber', TRUE);
            $inventory = $this->input->post('StartingInventory', TRUE);
            $received = $this->input->post('Received', TRUE);
            $shipped = $this->input->post('Shipped', TRUE);
            $hand = $this->input->post('OnHand', TRUE);
            $minimum = $this->input->post('MinimumRequired', TRUE);
            $descriptions = $this->input->post('Descriptions', TRUE);
            $tid = $this->input->post('template_id', TRUE);
            $attrs = $this->input->post('attrs', TRUE);
            $cid = $this->input->post('catid', TRUE);

            $data = array (
                'Name' => $name,
                'ProductNumber' => $number,
                'StartingInventory' => $inventory,
                'Received' => $received,
                'Shipped' => $shipped,
                'OnHand' => $hand,
                'MinimumRequired' => $minimum,
                'Descriptions' => $descriptions,
                'template_id' => $tid,
                'attributes' => json_encode($attrs),
                'category_id' => $cid
            );
            $result = $this->Product_model->update($data,$id);
            if(!is_string($result) && $result)
                echo json_encode("true");
            elseif(is_string($result))
                echo $result;
            else
                echo json_encode("false");


        }catch (Exception $e){
            echo $e;
        }

    }
    public function remove(){
        try{
            $id = $this->input->post('id', TRUE);
            $result = $this->Product_model->remove_product($id);
            echo json_encode($result);
        }
        catch (Exception $e){

        }

    }
}