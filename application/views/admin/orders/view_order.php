<div class="wrapper">
    <div class="col-lg-9" style="margin:70px 220px;">
        <div class="col-lg-12" style="padding:20px;">
       <h2>  <strong>   Orders</strong></h2>
        </div>
        <table class="table table-hover table-striped table-bordered">
            <tr>
                <th>Serial No.</th>
                <th>Customer Name</th>
                <th>E-mail</th>
                <th>Contact</th>
                <th>Ordered Date</th>
                <th>Product Details</th>
                <th>Action</th>

            </tr>
            <?php $i=0;?>
            <?php foreach($orders as $order){
            foreach($user_details as $user){

                    if($order->customer_id == $user->user_id){?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                        <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->phone_no; ?></td>
                    <td><?php echo $order->order_date; ?></td>
                    <td><a class="btn btn-primary" href="<?php echo base_url('admin/order_manager/orderdetails/'.$order->serial)?>">Details</a></td>
                    <td><!--<a class="btn btn-primary" href="">Ship now</a>-->
                        <?php $attributes = array('id' => 'myform');
                          echo form_open('admin/order_manager/ship/'.$order->serial,$attributes)?>
                       <?php echo form_hidden('order_no', $order->serial);
                        echo form_hidden('customer_name',$user->name);
                        echo form_hidden('email',$user->email);
                        echo form_hidden('contact',$user->phone_no);
                        echo form_hidden('ordered_date',$order->order_date);?>
                       <input type="submit" class="btn btn-primary" value="Ship now" onclick="this.attr('disabled', 'disabled')"/>
                        <script>
                            $('#myform').submit(function(e){
                                $(this).find('input[type=submit]').attr('disabled', 'disabled');
                                // this is just for demonstration
                                e.preventDefault();
                                return false;
                            });
                        </script>
                        <?php echo form_close(); ?>

                        </td>
                </tr>
            <?php } } }?>
        </table>
    </div>
</div>

