<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function add_name_data()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        echo   $this->db->insert("student", $request);
    }
    public function get_name(){
        $query = $this->db->get('student',array())->result();
        // echo "<pre>";
        // print_r($query);
        // echo "</pre>";
        echo json_encode($query);

    }
}
