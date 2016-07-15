<table >
      <tr>
        <th><h4>Order number</h4></th>
        <th><h4>Name</h4></th>
        <th><h4>Email</h4></th>
         <th><h4>Product name </h4></th>
        <th><h4>Order date</h4></th>
        <th><h4>Order Sum</h4></th>

      </tr>

    <?php foreach($orders as $order):?>
        <tr class="tr1">
            <td><h4> <?=$order['order_id']?> </h4></td>
            <td><h4> <?=$order['first_name']?> </h4></td>
            <td><h4> <?=$order['email']?> </h4></td>

            <td>
                <div class=""> </div>
                <p>product qty| name | price </p>
                <?php foreach($order['products'] as $product){

                   foreach( $product as $prod){

                       echo $prod.' ';
                   }
                    echo '</br>';

                }?> </h4></td>
            <td><h4> <?=$order['order_date']?> </h4></td>
            <td><h4> <?=$order['sum']?> </h4></td>
        </tr>
    <?php endforeach;?>
    <tr>
        <td></td>
        <td><h1></h1></td>
        <td><h1 ></h1></td>
        <td><h1></h1></td>
    </tr>
</table>