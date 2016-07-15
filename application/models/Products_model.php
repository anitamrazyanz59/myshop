<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// product model zzzz hgfgf tgrt
// product model ccc
class Products_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function get_products()
    {
        if ($this->input->post('product_id')) {
            $product_id = abs((int)$this->input->post('product_id'));
            if ($product_id) {
                $products_ides = $this->session->userdata('products_ides');
                if (is_array($products_ides)) {
                    if (!in_array($product_id, $products_ides)) {
                        $products_ides[] = $product_id;
                    }
                } else {
                    $products_ides = [];
                    $products_ides[] = $product_id;
                }
                $this->session->set_userdata('products_ides', $products_ides);
            }

        }


        $query = $this->db->get('products');
        return $query->result_array();

    }

    public function add_product($data)
    {
        $this->db->insert('products', $data);
    }

    /**
     *
     * @param array $product_ides
     * @return array
     */
    public function buy_products($product_ides)
    {
        if($product_ides) {
            $this->db->where_in('product_id', $product_ides);
            $query = $this->db->get('products');
            return $query->result_array();
        }
        return [];

    }

    public function  add_user_and_order($data, $order_data)
    {
        if ($this->input->post('prod_id') && $this->input->post('buy_qty')) {

            $this->db->insert('users', $data);
            $order_data['user_id'] = $this->db->insert_id();
            $this->db->insert('orders', $order_data);
            $order_products_data['order_id'] = $this->db->insert_id();

            $prod_ides = $this->input->post('prod_id');
            $buy_qtyes = $this->input->post('buy_qty');
            foreach ($prod_ides as $key => $product_id) {
                $order_products_data['product_id'] = $product_id;
                $order_products_data['qty'] = $buy_qtyes[$key];
                $this->db->insert('order_products', $order_products_data);
            }
        }

        $this->session->sess_destroy();
    }

    public function get_all_orders()
    {
        $orders = $this->db  ->select('o.*, u.first_name, u.email')
                            ->join('users as u', 'o.user_id = u.user_id')
                            ->order_by("o.order_id", "desc")
                            ->get('orders as o')
                            ->result_array();
        foreach($orders as &$order) {
            $order['products'] = $this->db  ->select('op.qty, p.name, p.price')
                                            ->join('products as p', 'op.product_id = p.product_id')
                                            ->where('op.order_id', $order['order_id'])
                                            ->get('order_products as op')
                                            ->result_array();
        }
        return $orders;
    }

}
//SELECT * FROM `order_products`
// INNER JOIN orders ON order_products.order_id = orders.order_id
// INNER JOIN products ON order_products.product_id =products.product_id
// INNER JOIN users ON orders.user_id = users.user_id