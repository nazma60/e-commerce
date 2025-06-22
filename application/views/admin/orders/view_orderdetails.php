<div class="wrapper">
    <div class="col-lg-9" style="margin:70px 220px;">
        <div class="col-lg-12" style="padding:20px;">
            <h3><strong>Orders</strong></h3>
        </div>
        <table class="table table-hover table-striped table-bordered">
            <tr>
                <th>Serial No.</th>
                <th>Order No.</th>

                <th>Product Name</th>

                <th>Quantity ordered</th>
                <th>Unit Price</th>
                <!--<th>Action</th>-->

            </tr>
            <?php $i=0;?>
            <?php foreach($product_details as $product){
                foreach($orderdetails as $orderd){
                    if($orderd['product_id'] == $product->id){?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $product->name; ?></td>


                            <td><?php echo $orderd['quantity']; ?></td>
                            <td><?php echo $orderd['price'];?></td>

                            <!--<td><a class="btn btn-primary" href="#">Shipped</a>
                                <a class="btn btn-primary" href="#">Pending</a></td>
                            -->
                        </tr>
                    <?php } } }?>
        </table>
    </div>
</div>
