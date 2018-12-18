<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:36 AM
 */
class Category extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Category_model');
    }
    public function index()
    {
        $data['module'] = 'category';
        $data['access'] = $this->session->userdata('access');
        $this->load->view("header.html");
        $this->load->view("topbar");
        $this->load->view("sidebar",$data);
        $this->load->view("pages/categories");


        $this->load->view("footer.html");
    }
    public function get_categories(){

        $res = $this->Category_model->get_categories();

        $data = array();

        foreach($res->result() as $r) {
            $action = "<div class='table-data-feature'><button class='item editItem' data-toggle='tooltip' data-cat_id='".$r->id."' data-placement='top' title='Edit'><i class='zmdi zmdi-edit'></i></button></button><button class='item removeItem' data-toggle='tooltip' data-cat_id='".$r->id."' data-placement='top' title='Delete'><i class='zmdi zmdi-delete'></i></button></div>";

            $data[] = array(
                $r->id,
                $r->name,
                //$r->parent_id,
                $r->descriptions,
                $action
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function tree(){
        $res = $this->Category_model->get_tree();

        $data = array();
        $pid = 0;
        $tree = array();
        foreach($res->result() as $r) {
            $data[] = array(
                'id' => $r->id,
                'name' => $r->name,
                'parent' =>$r->parent_id
            );
        }
    }
    function get_tree()
    {
        $result = $this->Category_model->get_tree();

        $itemsByReference = array();
        $data = array();
        // Build array of item references:
        foreach($result as $key => &$item) {
            $itemsByReference[$item['id']] = &$item;
            // Children array:
            $itemsByReference[$item['id']]['children'] = array();
            // Empty data class (so that json_encode adds "data: {}" )
            $itemsByReference[$item['id']]['data'] = new StdClass();
        }

        // Set items as children of the relevant parent item.
        foreach($result as $key => &$item)
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                $itemsByReference [$item['parent_id']]['children'][] = &$item;

        // Remove items that were added to parents elsewhere:
        foreach($result as $key => &$item) {
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                unset($result[$key]);
        }
        foreach ($result as $row) {
            $data[] = $row;
        }

        // Encode:
        echo json_encode($data);
    }
    public function add(){
        try{
            $pid = $this->input->post('parent_id', TRUE);
            $uid = 1;
            $name = $this->input->post('name', TRUE);
            $descriptions = $this->input->post('descriptions', TRUE);
                $data = array (
                    'parent_id' => $pid,
                    'name' => $name,
                    'descriptions' => $descriptions
                );
                $result = $this->Category_model->insert_category($data);
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
    public function get_category(){
        try{
            $id = $this->input->post('id', TRUE);
            $result = $this->Category_model->get_category($id);
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
            $pid = $this->input->post('parent_id', TRUE);
            $uid = 1;
            $name = $this->input->post('name', TRUE);
            $descriptions = $this->input->post('descriptions', TRUE);

            $data = array (
                'parent_id' => $pid,
                'name' => $name,
                'descriptions' => $descriptions
            );
            $result = $this->Category_model->update($data,$id);
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
            $result = $this->Category_model->remove_category($id);
            echo json_encode("true");
        }
        catch (Exception $e){

        }

    }
}