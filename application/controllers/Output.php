<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:36 AM
 */
class Output extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Output_model');
    }
    public function index()
    {
        $data['module'] = 'output';
        $data['access'] = $this->session->userdata('access');
        $this->load->view("header.html");
        $this->load->view("topbar");
        $this->load->view("sidebar",$data);
        $this->load->view("pages/outputs");


        $this->load->view("footer.html");
    }
    public function get_outputs(){

        $res = $this->Output_model->get_outputs();

        $data = array();

        foreach($res->result() as $r) {
            $action = "<div class='table-data-feature'><button class='item editItem' data-toggle='tooltip' data-output_id='".$r->id."' data-placement='top' title='Edit'><i class='zmdi zmdi-edit'></i></button></button><button class='item removeItem' data-toggle='tooltip' data-output_id='".$r->id."' data-placement='top' title='Delete'><i class='zmdi zmdi-delete'></i></button></div>";

            $data[] = array(
                $r->id,
                $r->Name,
                $r->number,
                $r->date,
                $r->descriptions,
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
            $date = $this->input->post('date', TRUE);
            $descriptions = $this->input->post('descriptions', TRUE);

            $this->load->model('Product_model');
            $laststock = $this->Product_model->get_stock($pid);
            if($this->Product_model->decrease_stock($pid,$number)){
                $data = array (
                    'product_id' => $pid,
                    'number' => $number,
                    'last_stock' => $laststock,
                    'date' => $date,
                    'user_id' => $uid,
                    'descriptions' => $descriptions
                );
                $result = $this->Output_model->insert_output($data);
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
    public function get_output(){
        try{
            $id = $this->input->post('id', TRUE);
            $result = $this->Output_model->get_output($id);
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

            $date = $this->input->post('date', TRUE);
            $descriptions = $this->input->post('descriptions', TRUE);


            $data = array (
                'product_id' => $pid,
                'number' => $number,
                'date' => $date,
                'user_id' => $uid,
                'descriptions' => $descriptions
            );
            $result = $this->Output_model->update($data,$id);
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
            $result = $this->Output_model->remove_output($id);
            echo json_encode($result);
        }
        catch (Exception $e){

        }

    }
}