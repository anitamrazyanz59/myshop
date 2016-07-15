<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('products_view');
    }

    public function  show_products()
    {

        $data['products'] = $this->products_model->get_products();
        $this->view_load->view('products_view', $data);
    }



    public function buy_products()
    {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name',' Name','required|encode_php_tags|prep_for_form|max_length[225]',
            array('required' => 'You must add %s.'));
        $this->form_validation->set_rules('surname','Surname', 'trim|required|encode_php_tags|prep_for_form',
            array('required' => 'Add %s.'));
        $this->form_validation->set_rules('email','Email','required|encode_php_tags|min_length[2]|prep_for_form|valid_email',
            array('required' => 'Add %s.'));

        if ($this->form_validation->run() == FALSE) {
            $products_ides = $this->session->userdata('products_ides');
            $products = $this->products_model->buy_products($products_ides);
            $sum = 0;
            foreach ($products as $product) {
                $sum += $product['price'] ;
            }
            $this->view_load->view('buy_products_view', compact('products', 'sum'));
        } else {
            $data['first_name'] = $this->input->post('name', true);
            $data['last_name'] = $this->input->post('surname', true);
            $data['email'] = $this->input->post('email', true);
            $order_data['sum'] = $this->input->post('sum', true);
            $order_data['order_date'] = date('Y-m-d H:i:s');
            $this->products_model->add_user_and_order($data, $order_data);
            redirect('', 'refresh');
        }

    }

    public function show_all_orders()
    {
        $orders = $this->products_model->get_all_orders();
        $this->view_load->view('all_orders_view', compact('orders'));
    }

    public function del_product()
    {
        $product_id= '';
        if($this->uri->segment(3)){
            $product_id = $this->uri->segment(3);
            $product_new_ides=array();
            $products_ides = $this->session->userdata('products_ides');
            foreach($products_ides as  $key => $del_product_id){
                if($del_product_id != $product_id){
                    $product_new_ides[$key] = $del_product_id;
                }
            }
            $this->session->set_userdata('products_ides', $product_new_ides);
           redirect('/Products/buy_products', 'refresh');
        }

    }


}
/*   */