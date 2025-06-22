<?php foreach($items as $item){
         
                  ?><b>Product Name:-  </b><?php echo $item['name'];?><br>
               <b>   Price:- </b>NRs. <?php echo $item['price'];?>/-<br>
        <b>          Product Description:-</b> <?php echo $item['description'];?><br>

                            <?php }?>
         <?php //echo $user_id ?>  
           <?php echo form_open('single_product/addtowishlist') ?>
            <input type="hidden" name="productname"  value="<?php echo ucwords($item['name']);?>" readonly
                   >
            <input type="hidden" name="user_id"  value="<?php echo $user_id ?>" readonly
                   >
            <input type="hidden" name="id"
                   value="<?php echo $item['id'];?>" readonly>
				 
       <input type="hidden" name="price"
                   value="<?php echo $item['price'];?>" readonly>
        </div>
  <br> <mark>Are you sure want to add this product in your wishlists ??</mark><br><br><br>    <button class="btn btn-success ">Yes</button>
       <a href="<?php echo base_url('single_product/details/'.$item['id'])?>" class="btn btn-success">No</a>     <br><br><br><br>

            
        

        <?php echo form_close(); ?>
                    