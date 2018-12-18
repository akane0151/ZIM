<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:36 AM
 */
class Dashboard extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index()
    {
        if($this->session->userdata('login')) {
            $data['module'] = 'dashboard';
            $data['access'] = $this->session->userdata('access');
            $this->load->view("header.html");
            $this->load->view("topbar");
            $this->load->view("sidebar",$data);
            $this->load->view("pages/dashboard");
            $this->load->view("footer.html");
        } /*else if($this->session->userdata('access')=='1') {
            $data['module'] = 'user';
            $data['access'] = $this->session->userdata('access');
            $this->load->view("header.html");
            $this->load->view("topbar");
            $this->load->view("sidebar",$data);
            $this->load->view("pages/users");
            $this->load->view("footer.html");
        }*/
        else{
            redirect("user");
        }
    }

    public function login(){
        $username = $this->input->post('username', TRUE);
        $pass = $this->input->post('password', TRUE);
        $result = $this->User_model->login($username,$pass);
        if(!is_string($result) && $result) {
            $sesdata = array(
                'username'  => $result['username'],
                'access'     => $result['access'],
                'login' => TRUE
            );
            $this->session->set_userdata($sesdata);
            echo json_encode("true");
        }
        else{
            echo json_encode("false");
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        echo json_encode("true");
    }

    public function getinfo(){
        try{

            if($this->session->userdata('login')){
                echo json_encode($this->session->userdata());


            } else {
                echo json_encode("false");
            }

        }
        catch (Exception $e){
            echo $e->getMessage();
        }

    }

    public function get_users(){

        $res = $this->User_model->get_users();

        $data = array();

        foreach($res->result() as $r) {
            $action = "<div class='table-data-feature'><button class='item editItem' data-toggle='tooltip' data-uid='".$r->id."' data-placement='top' title='Edit'><i class='zmdi zmdi-edit'></i></button></button><button class='item removeItem' data-toggle='tooltip' data-uid='".$r->id."' data-placement='top' title='Delete'><i class='zmdi zmdi-delete'></i></button></div>";

            $data[] = array(
                $r->id,
                $r->username,
                $r->fullname,
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
            $username = $this->input->post('username', TRUE);
            $pass = $this->input->post('password', TRUE);
            $access = $this->input->post('access', TRUE);
            $fullname = $this->input->post('fullname', TRUE);

            $data = array (
                    'username' => $username,
                    'password' => $pass,
                    'fullname' => $fullname,
                    'access' => $access
                );
                $result = $this->User_model->insert_user($data);
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
    public function get_user(){
        try{
            $id = $this->input->post('id', TRUE);
            $result = $this->User_model->get_user($id);
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
            $username = $this->input->post('username', TRUE);
            $pass = $this->input->post('password', TRUE);
            $access = $this->input->post('access', TRUE);
            $fullname = $this->input->post('fullname', TRUE);

            $data = array (
                'username' => $username,
                'password' => $pass,
                'fullname' => $fullname,
                'access' => $access
            );
            $result = $this->User_model->update($data,$id);
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
            $result = $this->User_model->remove_user($id);
            echo json_encode("true");
        }
        catch (Exception $e){

        }

    }
}