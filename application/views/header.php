<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.0.0.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js');?>"></script>

</head>

<body>
    <div class="content">
        <div class="page_class">
           <div class="link_div">
               <a href="<?php echo site_url('form'); ?>">Add product</a>
               <a href="<?php echo site_url(''); ?>">All products</a>
               <a href="<?php echo site_url('products/show_all_orders'); ?>">All orders</a>
            </div>
            <div class="buscet">
                <?php $products_count = $this->session->userdata('products_ides');

                echo '<p>'.count($products_count).'</p>'  ?>
            </div>

        </div>
        <div class="clear"></div>
