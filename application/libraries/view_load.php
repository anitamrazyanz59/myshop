<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// view load library
class View_load {

    private $ci;

    public function __construct(){
        $this->ci = &get_instance();
    }
    //view
    public function view($view, $data=null)
    {
        $this->ci->load->view('header', $data);
        $this->ci->load->view($view);
        $this->ci->load->view('footer');
    }

}