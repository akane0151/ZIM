<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:36 AM
 */
class Project extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->model('Product_model');
    }
    public function index()
    {
        if($this->session->userdata('login') && $this->session->userdata('access')=='1') {
            $data['module'] = 'project';
            $data['access'] = $this->session->userdata('access');
            $this->load->view("header.html");

            $this->load->view("sidebar", $data);
            $this->load->view("topbar");
            $this->load->view("pages/projects");


            $this->load->view("footer.html");
        }
        else {
            redirect('product');
        }

    }
    public function get_projects(){

        $res = $this->Project_model->get_projects();

        $data = array();

        foreach($res->result() as $r) {
            $action = "<div class='table-data-feature'><button class='item showItem' data-toggle='tooltip' data-project_id='".$r->id."' data-placement='top' title='Info'><i class='zmdi zmdi-info'></i></button><button class='item editItem' data-toggle='tooltip' data-project_id='".$r->id."' data-placement='top' title='Edit'><i class='zmdi zmdi-edit'></i></button></button><button class='item removeItem' data-toggle='tooltip' data-project_id='".$r->id."' data-placement='top' title='Delete'><i class='zmdi zmdi-delete'></i></button></div>";

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
            $items = $this->input->post('items', TRUE);
            $data = array (
                'name' => $name,
                'descriptions' => $descriptions,
                'items' => json_encode($items)

            );
            $result = $this->Project_model->insert_project($data);
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
            $items = $this->input->post('items', TRUE);
            $data = array (
                'name' => $name,
                'descriptions' => $descriptions,
                'items' => json_encode($items)

            );
            $result = $this->Project_model->update($data,$id);
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
            $result = $this->Project_model->remove_project($id);
            echo json_encode($result);
        }
        catch (Exception $e){

        }

    }
    public function calculate(){
        try{
            $id = $this->input->post('id', TRUE);
            $result = $this->Project_model->get_project($id);
            if(!is_string($result)){
                $items = json_decode($result['items']);
                $hm = 1000000000;
                foreach($items as $i){
                    $tmp = $this->howmany($i->id, $i->number);
                    if($hm > $tmp){
                        $hm = $tmp;
                    }
                }
                echo json_encode($hm);
            }
                //echo json_encode($result);
            else {
                echo json_encode("false");
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
    public function howmany($id,$number){
        $stock = $this->Product_model->get_stock($id);
        $result = ($stock/$number);
        return floor($result);
    }
}