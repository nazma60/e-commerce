<div class="wrapper" xmlns="http://www.w3.org/1999/html">
    <div class="view" style="margin:60px 200px">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-info"> <?php echo($this->session->flashdata('message')) ?> </div>
        <?php } ?>
        <?php if (isset($product_item->id)) { ?>
            <h3><b>Edit Product</b></h3><br>
        <?php } else { ?>
            <h3><b>Add new Product</b></h3><br>
        <?php } ?>
        <?php echo form_open_multipart('admin/product/add_product') ?>
        <div class="col-lg-6">

            <input type="hidden" value="<?php echo (isset($product_item->id)) ? $product_item->id : '' ?>"
                   name="id">

            <div class="form-group">
                <span style="color: #383a1e">Enter the name:</strong></span>
                <input type="text" class="form-control" placeholder="Product Name" name="product_name"
                       value="<?php echo (isset($value)) ? set_value('name') : $product_item->name ?>">

                <div class="error"><?php echo form_error('name'); ?></div>
            </div>
            <div class="form-group">
                <span style="color: #383a1e">Enter the Brand Name:</strong></span>
                <select name="product_brand" class="form-control">
                    <option>Select Brands</option>
                    <?php foreach ($brands as $brand) { ?>
                        <?php
                        if ($product_item->brand_id == $brand->id) {
                            ?>
                            <option value="<?php echo $brand->id; ?>"
                                    selected><?php echo $brand->name; ?> </option>
                        <?php } else { ?>
                            <option
                                value="<?php echo $brand->id; ?>"><?php echo ucwords($brand->name); ?> </option>
                        <?php }
                    }
                    ?>


                </select>

            </div>

            <div class="form-group ">
                <span><b>Cover Image:</b></span><br>
                <?php if (isset($product_item->cover_image)) { ?>
                    <div class="col-lg-6 " style="margin: 25px 0;">
                        <a class="fancybox-thumb" rel="fancybox-thumb"
                           href="<?php echo base_url('images/' . $product_item->cover_image) ?>"><img
                                src="<?php echo base_url('images/' . $product_item->cover_image) ?>"
                                style="height: 100px;"></a>
                    </div>
                    <br>
                    <input type="hidden" name="cover_image" value="<?php echo $product_item->cover_image;?>" multiple>
                <?php }?>
                    <br>
                    <input type="file" name="cover_image" multiple>

            </div>
            <div class="form-group ">
                <span><b>Images:</b></span><br>
                <?php if (isset($image_item)) { ?>
                    <?php foreach ($image_item as $image) { ?>
                        <div class="col-lg-6 " style="margin: 25px 0;">
                            <a class="fancybox-thumb" rel="fancybox-thumb"
                               href="<?php echo base_url('images/' . $image['image']) ?>"><img
                                    src="<?php echo base_url('images/' . $image['image']) ?>"
                                    style="height: 100px;"></a>
                            <hr>
                            <a href="<?php echo base_url('admin/product/delete_image/' . $image['image']) ?>"
                               class="btn btn-danger delete">
                                DELETE </a>
                        </div>
                    <?php }
                    ?>
                <?php } ?>
                <br>
                <input type="file" name="files[]" multiple>

            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <span style="color: #383a1e">Enter the Price:</strong></span>
                <input type="text" class="form-control" placeholder="Enter the product price" name="price"
                       value="<?php echo (isset($value)) ? set_value('price') : $product_item->price ?>">

            </div>
          <!--  <div class="form-group">
                <span style="color: #383a1e">Enter the discount:</strong></span>
                <input type="text" class="form-control" placeholder="Enter the product discount %" name="product_dis"
                       value="<?php /*echo (isset($value)) ? set_value('discount') : $product_item->discount */?>">

                <div class="error"><?php /*echo form_error('discount'); */?></div>
            </div>-->

            <div class="form-group">
                <span style="color: #383a1e">Enter the category:</strong></span>
                <select name="cat_id" class="form-control">
                    <?php foreach ($category as $data) { ?>
                        <?php if ($data['parent_id'] == 0) { ?>
                            <optgroup label="<?php echo $data['name']; ?>">
                                <?php foreach ($category as $sub) {
                                    if ($sub['parent_id'] == $data['id']) {
                                        if ($product_item->cat_id == $sub['id']) {
                                            ?>
                                            <option value="<?php echo $sub['id']; ?>"
                                                    selected><?php echo $sub['name']; ?> </option>
                                        <?php } else { ?>
                                            <option
                                                value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?> </option>
                                        <?php }
                                    }
                                } ?>
                            </optgroup>
                        <?php }
                    } ?>

                </select>
            </div>
            <div class="form-group">
                <span style="color: #383a1e">Enter the Description:</strong></span>
                <textarea class="form-control ckeditor" name="product_des"
                          style="width: 440px; height: 200px;"><?php echo (isset($product_item->description)) ? $product_item->description : "Product Description" ?> </textarea>

                <div class="error"><?php echo form_error('description'); ?></div>
            </div>
        </div>

        <div class="btn-group btn-group-lg">
            <button class="btn btn-success ">Add Colors</button>
            <br><br><br><br>

            <p style="..." id="demo"></p></a>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
</div>
