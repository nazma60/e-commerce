<div class="wrapper" xmlns="http://www.w3.org/1999/html">
    <div class="view" style="margin:60px 200px">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-info"> <?php echo($this->session->flashdata('message')) ?> </div>
        <?php } ?>
        <?php if (isset($brands['id'])) { ?>
            <h3><b>Edit Product</b></h3><br>
        <?php } else { ?>
            <h3><b>Add new Product</b></h3><br>
        <?php } ?>
        <?php echo form_open_multipart('admin/brand_manager/add_brands') ?>
        <div class="col-lg-6">

            <input type="hidden" value="<?php echo (isset($brands['id'])) ? $brands['id'] : '' ?>"
                   name="id">

            <div class="form-group">
                <span style="color: #383a1e">Enter the name:</strong></span>
                <input type="text" class="form-control" placeholder="Brand Name" name="brand_name"
                       value="<?php echo $brands['name']; ?>">
            </div>
            <div class="form-group">
                <label for="long_description">Description</label>
                <textarea rows="7" name="description" class="form-control ckeditor" id="description" placeholder="Description"><?php echo $brands['description'] ?></textarea>
            </div>


        <div class="btn-group btn-group-lg">
            <button class="btn btn-success ">Add</button>
            <br><br><br><br>

            <p style="..." id="demo"></p></a>
        </div>
    </div>
    <?php echo form_close(); ?>

</div>
</div>

