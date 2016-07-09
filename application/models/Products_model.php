<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public function get_products()
    {
        $query = $this->db->get('products');
        return $query->result_array();
    }


}
