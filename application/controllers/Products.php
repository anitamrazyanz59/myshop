<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function index()
    {
        $this->load->view('products_view');
    }

    public function  showProducts()
    {
        $this->load->model('Products_model');
        $data['products'] = $this->Products_model->get_products();
        $this->view_load->view('products_view', $data);
    }

}
