<div class="wrapper">
    <div class="col-lg-9" style="margin:70px 220px;">
        <div class="col-lg-12" style="padding:20px;">
            <h2>  <strong>   Orders</strong></h2>
        </div>
        <table class="table table-hover table-striped table-bordered">
            <tr>

                <th>Order Number</th>
                <th>Customer id</th>
                <th>Ordered Date</th>
                <th>Shipping Date</th>
                <th>Shipping Status</th>
                <th>Total Sum</th>


            </tr>
            <?php $i=0;?>
            <?php  foreach($ship_info as $ship){ ?>
                        <tr>

                            <td><?php echo $ship['serial']; ?></td>
                            <td><?php echo $ship['customer_id']; ?></td>
                            <td><?php echo $ship['order_date']; ?></td>
                            <td><?php echo $ship['shipping_date']; ?></td>
                            <td><?php echo ucwords($ship['shipping_status']); ?></td>
                            <td><?php echo $ship['Sum']; ?></td>
                        </tr>
                    <?php }?>
        </table>
    </div>
</div>
