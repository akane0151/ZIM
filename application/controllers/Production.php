<?php

/**
 * Created by PhpStorm.
 * User: asus iran
 * Date: 7/27/2018
 * Time: 12:36 AM
 */
class Production extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->model('Product_model');

    }
    public function index()
    {
        if($this->session->userdata('login')) {
            $data['module'] = 'production';
            $data['access'] = $this->session->userdata('access');
            $this->load->view("sidebar",$data);
            $this->load->view("header.html");
            $this->load->view("topbar");

            $this->load->view("pages/productions");
            $this->load->view("footer.html");
        }
        else{
            redirect("user");
        }
    }

    public function calculation(){
        try {
            $projects = $this->input->post('projects', TRUE);
            //$projects = json_decode($projects);
            $temp = array();
            //fetching every project data
            foreach ($projects as $p) {
                $result = $this->Project_model->get_project($p['id']);
                if (!is_string($result)) {
                    $items = json_decode($result['items']);
                    //$hm = 1000000000000;
                    foreach ($items as $it) {
                        //$tmp = $this->howmany($i->id, $i->number);
                        //if ($hm > $tmp)
                        //{
                        //    $hm = $tmp;
                        //}
                        $n=$p['number']*$it->number;
                        $exist = false;
                        for($i = 0; $i<count($temp); $i++)
                        {
                            if($temp[$i][0] == $it->id){
                                $exist = true;
                                $temp[$i][1]+=$n;
                                break;
                            }
                        }
                        if(!$exist){
                            $temp[] = array(
                                $it->id,
                                $n
                            );
                        }
                    }
                }
                else {
                    echo json_encode("false");
                }
            }
            $need = array();
            foreach ($temp as $t){
                $stock = $this->Product_model->get_stock($t[0]);
                if($t[1]>$stock) {
                    $need[] = array(
                        'id' => $t[0],
                        'name' => $this->Product_model->get_name($t[0]),
                        'number' => $t[1]-$stock
                    );
                }
            }
            echo json_encode($need);
        }
        catch (Exception $e){
            echo json_encode($e->getMessage());
        }
    }
    public function howmany($id,$number){
        $stock = $this->Product_model->get_stock($id);
        $result = ($stock/$number);
        return floor($result);

    }


}