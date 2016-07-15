<?php

class Form extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
    }

    public function index()
    {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name','Product Name','required|encode_php_tags|prep_for_form|max_length[225]',
            array('required' => 'You must add %s.'));
        $this->form_validation->set_rules('product_price','Product price', 'trim|required|numeric|encode_php_tags|prep_for_form',
            array('required' => 'Add %s.'));
        $this->form_validation->set_rules('product_description','Product description','required|encode_php_tags|min_length[2]|prep_for_form',
            array('required' => 'Add %s.'));

        if ($this->form_validation->run() == FALSE) {
            $this->view_load->view('add_product_view');
        } else {
            $data['name'] = $this->input->post('product_name', true);
            $data['price'] = $this->input->post('product_price', true);
            $data['description'] = $this->input->post('product_description',true);
            $this->products_model->add_product($data);
            redirect('', 'refresh');
        }
    }
}