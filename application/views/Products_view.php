


<?php foreach($products as $product):?>
  <div class="product_div">
      <h2> <?=$product['name']?> </h2>
      <h4> <?=$product['description']?></h4>
      <h3>$<?=$product['price']?></h3>
  </div>
<?php endforeach;?>

