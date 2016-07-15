<div class="margin_class"></div>
<div>

</div>
<form method="post" action="<?=site_url('Products/buy_products');?>">
<table class="buy_table_class">
      <tr>
            <th><h3>Product name</h3></th>
            <th><h3>Quantity</h3></th>
            <th><h3>Price</h3></th>
            <th><h3>Total price</h3></th>
            <th><h3>Action</h3></th>
          </tr>

    <?php foreach($products as $key => $product):?>
    <tr class="tr1">
        <td><h2> <?=$product['name']?> </h2></td>
        <td><h2> <input type="number" name="buy_qty[]" class="buy_qty" value="1" > </h2></td>
        <input type="hidden" name="prod_id[]" value="<?= $product['product_id']?>">
        <td><h2 class="product_price"><?= $product['price']?></h2></td>
        <td><h2 class="total_price"> <?= $product['price']?>  </h2></td>
        <td><a class="del_class" href="/products/del_product/<?= $product['product_id']?>">Delete product </a></td>
    </tr>
    <?php endforeach;?>
    <tr>
        <td></td>
        <td><h1>Total</h1></td>
        <td><h1 ></h1></td>
        <td><h1 class="total_sum_class"><?=$sum?></h1></td>
    </tr>
</table>
<?php if($this->session->userdata('products_ides')):?>
<div class="form_div">
    <?php echo '<div class=error>'.validation_errors().'</div>'; ?>

    <p> Name <input type="text" value="<?php echo $this->input->post('name', true)?>" name="name"></p>
    <p> Surname  <input type="text" value="<?php echo  $this->input->post('surname', true)?>" name="surname"></p>
    <p>Email <input type="text" value="<?php echo  $this->input->post('email', true)?>" name="email"></p></p>
    <input type="hidden" name="sum" class="order_total_sum" value="">
    <p><input type="submit" value="Buy now" name="user"></p>

</div>
    <?php endif?>
</form>
