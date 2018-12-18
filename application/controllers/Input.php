<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:36 AM
 */
class Input extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Input_model');
    }
    public function index()
    {
        $data['module'] = 'input';
        $data['access'] = $this->session->userdata('access');
        $this->load->view("header.html");
        $this->load->view("topbar");
        $this->load->view("sidebar",$data);
        $this->load->view("pages/inputs");


        $this->load->view("footer.html");
    }
    public function get_inputs(){

        $res = $this->Input_model->get_inputs();

        $data = array();

        foreach($res->result() as $r) {
            $action = "<div class='table-data-feature'><button class='item editItem' data-toggle='tooltip' data-input_id='".$r->id."' data-placement='top' title='Edit'><i class='zmdi zmdi-edit'></i></button></button><button class='item removeItem' data-toggle='tooltip' data-input_id='".$r->id."' data-placement='top' title='Delete'><i class='zmdi zmdi-delete'></i></button></div>";

            $data[] = array(
                $r->id,
                $r->Name,
                $r->date,
                $r->number,
                $r->final_price,
                $action
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function add(){
        try{
            $pid = $this->input->post('pid', TRUE);
            $uid = $this->session->userdata('userid');
            $number = $this->input->post('number', TRUE);
            $uprice = $this->input->post('unitprice', TRUE);
            $fprice = $this->input->post('finalprice', TRUE);
            $date = $this->input->post('date', TRUE);
            $supplier = $this->input->post('supplier', TRUE);
            $descriptions = $this->input->post('descriptions', TRUE);

            $this->load->model('Product_model');
            $laststock = $this->Product_model->get_stock($pid);
            if($this->Product_model->update_stock($pid,$number)){
                $data = array (
                    'product_id' => $pid,
                    'number' => $number,
                    'last_stock' => $laststock,
                    'date' => $date,
                    'unit_price' => $uprice,
                    'final_price' => $fprice,
                    'supplier' => $supplier,
                    'user_id' => $uid,
                    'descriptions' => $descriptions
                );
                $result = $this->Input_model->insert_input($data);
                if(!is_string($result) && $result)
                    echo json_encode($result);
                elseif(is_string($result))
                    echo $result;
                else
                    echo "false";
            }





        }catch (Exception $e){
            echo $e;
        }

    }
    public function get_input(){
        try{
            $id = $this->input->post('id', TRUE);
            $result = $this->Input_model->get_input($id);
            if(!is_string($result))
                echo json_encode($result);
            elseif(is_string($result))
                echo $result;
            else
                echo "false";
        }
        catch (Exception $e){
            echo $e->getMessage();
        }

    }
    public function update(){
        try{
            $id = $this->input->post('id', TRUE);
            $pid = $this->input->post('pid', TRUE);
            $uid = $this->session->userdata('userid');
            $number = $this->input->post('number', TRUE);
            $uprice = $this->input->post('unitprice', TRUE);
            $fprice = $this->input->post('finalprice', TRUE);
            $date = $this->input->post('date', TRUE);
            $supplier = $this->input->post('supplier', TRUE);
            $descriptions = $this->input->post('descriptions', TRUE);


            $data = array (
                'product_id' => $pid,
                'number' => $number,
                'date' => $date,
                'unit_price' => $uprice,
                'final_price' => $fprice,
                'supplier' => $supplier,
                'user_id' => $uid,
                'descriptions' => $descriptions
            );
            $result = $this->Input_model->update($data,$id);
            if(!is_string($result) && $result)
                echo json_encode($result);
            elseif(is_string($result))
                echo $result;
            else
                echo "false";


        }catch (Exception $e){
            echo $e;
        }

    }
    public function remove(){
        try{
            $id = $this->input->post('id', TRUE);
            $result = $this->Input_model->remove_input($id);
            echo json_encode($result);
        }
        catch (Exception $e){

        }

    }
}