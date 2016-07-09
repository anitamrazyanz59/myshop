<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_load {

    private $ci;

    public function __construct(){
        $this->ci = &get_instance();
    }

    public function view($view, $data)
    {
        $this->ci->load->view('header', $data);
        $this->ci->load->view($view);
        $this->ci->load->view('footer');
    }

}