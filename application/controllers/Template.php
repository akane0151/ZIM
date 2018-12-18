<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:36 AM
 */
class Template extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Template_model');
    }
    public function index()
    {
        $data['module'] = 'template';
        $data['access'] = $this->session->userdata('access');
        $this->load->view("header.html");
        $this->load->view("topbar");
        $this->load->view("sidebar",$data);
        $this->load->view("pages/templates");
        $this->load->view("footer.html");
    }
    public function get_templates(){

        $res = $this->Template_model->get_templates();

        $data = array();

        foreach($res->result() as $r) {
            $action = "<div class='table-data-feature'><button class='item editItem' data-toggle='tooltip' data-template_id='".$r->id."' data-placement='top' title='Edit'><i class='zmdi zmdi-edit'></i></button></button><button class='item removeItem' data-toggle='tooltip' data-template_id='".$r->id."' data-placement='top' title='Delete'><i class='zmdi zmdi-delete'></i></button></div>";

            $data[] = array(
                $r->id,
                $r->name,
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
            $name = $this->input->post('name', TRUE);
            $descriptions = $this->input->post('descriptions', TRUE);
            $attr = $this->input->post('attributes', TRUE);
            $data = array (
                'name' => $name,
                'descriptions' => $descriptions,
                'attributes' => json_encode($attr)
            );
            $result = $this->Template_model->insert_template($data);
            if(!is_string($result) && $result)
                echo json_encode("true");
            elseif(is_string($result))
                echo $result;
            else
                echo json_encode("false");
        }
        catch (Exception $e)
        {
            echo $e;
        }
    }
    public function get_template(){
        try{
            $id = $this->input->post('id', TRUE);
            $result = $this->Template_model->get_template($id);
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
    public function update(){
        try{
            $id = $this->input->post('id', TRUE);
            $name = $this->input->post('name', TRUE);
            $descriptions = $this->input->post('descriptions', TRUE);
            $attr = $this->input->post('attributes', TRUE);
            $data = array (
                'name' => $name,
                'descriptions' => $descriptions,
                'attributes' => json_encode($attr)
            );
            $result = $this->Template_model->update($data,$id);
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
            $result = $this->Template_model->remove_template($id);
            echo json_encode($result);
        }
        catch (Exception $e){

        }

    }
}