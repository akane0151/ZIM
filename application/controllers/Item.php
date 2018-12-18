<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:36 AM
 */
class Item extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Item_model');
    }
    public function index()
    {
        $this->load->view("header.html");
        $this->load->view("topbar");
        $this->load->view("pages/projects");
        $this->load->view("sidebar.html");
        $this->load->view("footer.html");
    }
    public function get_projects(){

        $res = $this->Item_model->get_projects();

        $data = array();

        foreach($res->result() as $r) {
            $action = "<div class='table-data-feature'><button class='item editItem' data-toggle='tooltip' data-project_id='".$r->id."' data-placement='top' title='Edit'><i class='zmdi zmdi-edit'></i></button></button><button class='item removeItem' data-toggle='tooltip' data-project_id='".$r->id."' data-placement='top' title='Delete'><i class='zmdi zmdi-delete'></i></button></div>";

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

                $data = array (
                    'name' => $name,
                    'descriptions' => $descriptions
                );
            $result = $this->Project_model->insert_project($data);
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
    public function get_project(){
        try{
            $id = $this->input->post('id', TRUE);


            $result = $this->Project_model->get_project($id);
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
            $name = $this->input->post('name', TRUE);
            $descriptions = $this->input->post('descriptions', TRUE);

            $data = array (
                'name' => $name,
                'descriptions' => $descriptions
            );
            $result = $this->Project_model->update($data,$id);
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
            $result = $this->Project_model->remove_project($id);
            echo json_encode($result);
        }
        catch (Exception $e){

        }

    }
}