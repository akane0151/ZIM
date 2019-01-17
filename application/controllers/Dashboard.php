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
        $this->load->model('Project_model');
        $this->load->model('Product_model');

    }
    public function index()
    {
        if($this->session->userdata('login')) {
            $data['module'] = 'dashboard';
            $data['access'] = $this->session->userdata('access');
            $this->load->view("sidebar",$data);
            $this->load->view("header.html");
            $this->load->view("topbar");

            $this->load->view("pages/dashboard");
            $this->load->view("footer.html");
        }
        else{
            redirect("user");
        }
    }

    public function get_projects(){
        try{
            $res = $this->Project_model->get_projects();
            $data = array();
            foreach($res->result() as $r) {
                $id = $r->id;
                $result = $this->Project_model->get_project($id);
                if (!is_string($result)) {
                    $items = json_decode($result['items']);
                    $hm = 1000000000000;
                    foreach ($items as $i) {
                        $tmp = $this->howmany($i->id, $i->number);
                        if ($hm > $tmp) {
                            $hm = $tmp;
                        }
                    }
                    $data[] = array(
                      $id." - ".$r->name,
                        $hm
                    );

                } //echo json_encode($result);
                else {
                    echo json_encode("false");
                }
            }
            $output = array(
                "data" => $data
            );
            echo json_encode($output);
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
    public function underlimit(){
        $result = $this->Product_model->get_productlimit();
        $warn = array();
        foreach($result->result() as $r) {

                $warn[] = array(
                    'id'=>$r->id,
                    'name'=>$r->Name,
                    'shortage'=>($r->MinimumRequired - $r->OnHand)
                );


        }
        echo json_encode($warn);
    }

}