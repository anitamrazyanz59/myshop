<div class="all_products">
    <form method="post" action="<?=site_url('Products/buy_products');?>">
        <?php foreach($products as $product):?>
            <div class="product_div">
                <h2> <?=$product['name']?> </h2>
                <h4> <?=$product['description']?></h4>
                <h3>$<?=$product['price']?></h3>
                <img class="img_class"  data-id="<?=$product['product_id']?>"  src="<?php echo base_url('assets/img/11.png');?>">
            </div>
        <?php endforeach;?>
        <div class="clear"></div>
        <input type="hidden" value="<?=site_url('Products/show_products');?>" class="ajax_url">
        <a  class="buy_class" href="<?php echo site_url('Products/buy_products'); ?>">Buy </a>
        <div class="clear"></div>
    </form>
</div>

