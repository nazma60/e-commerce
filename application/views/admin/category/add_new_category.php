<div class="wrapper" xmlns="http://www.w3.org/1999/html">
    <div class="view" style="margin:70px 220px;">
        <?php echo form_open('admin/category_manager/add_category') ?>
        <p>

        <h3><strong></strong><span style="color: #383a1e">Enter the name:</strong></span></h3></p>
        <div class="form-group" style="display: inline-block">
            <input type="text" class="form-control" placeholder="Enter the name here..." name="category_name"
                   value="<?php echo (isset($category_details['name'])) ? $category_details['name'] : '' ?>"
                   style="width:600px; height:50px ">
            <input type="hidden" name="id"
                   value="<?php echo (isset($category_details['id'])) ? $category_details['id'] : '' ?>">
        </div>
        <div class="form-group">
            <select name="cat_id" class="form-control">
                <option value="root">Root Category</option>
                <?php foreach ($category as $data) { ?>
                <?php if ($data['parent_id'] == 0) {
                    if ($category_details['id'] == $data['id']) { ?>
                        <b>
                            <option value="<?php echo $data['id']; ?>" selected><?php echo $data['name']; ?></option>
                        </b>
                    <?php } else { ?>
                        <option value="<?php echo $data['id']; ?>"><b><?php echo $data['name']; ?></b></option>
                    <?php } ?>
                    <?php foreach ($category as $sub) {
                        if ($sub['parent_id'] == $data['id']) {
                            if ($type == "new") {
                                ?>
                                <option
                                    value="<?php echo $sub['id']; ?>"
                                    disabled><?php echo ("  --") . $sub['name']; ?> </option>
                            <?php } else {
                                if ($category_details['id'] == $sub['id']) {
                                    ?>
                                    <option value="<?php echo $sub['id']; ?>"
                                            selected><?php echo ("  --") . $sub['name']; ?> </option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $sub['id']; ?>"><?php echo ("  --") . $sub['name']; ?> </option>
                                <?php } ?>

                            <?php
                            }
                        } ?>

                    <?php }
                } }?>

            </select>
        </div>
        <div class="btn-group btn-group-lg">
            <button class="btn btn-success ">Add</button>
            <br><br><br><br>

            <p style="..." id="demo"></p></a>
        </div>

        <?php echo form_close(); ?>
    </div>

</div>
<!--<script>
    function add() {
        document.getElementById("demo").innerHTML = "The category has been added.";
    }
</script>-->

