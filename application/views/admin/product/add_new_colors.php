<div class="wrapper">
    <div class="col-lg-9" style="margin:70px 220px;">
        <?php if ($this->session->flashdata('message')){ ?>
            <div class="alert alert-info"><?php echo ($this->session->flashdata('message'));?></div>
        <?php }?>
        <div class="text-center"><h1><b><?php echo isset($product_item->name) ? ucwords($product_item->name):'ADD';?></b></h1></div>

        <form action="<?php echo base_url('admin/product/submit');?>" method = 'POST'>
            <input type="hidden" name="id" value="<?php echo isset($product_item->id) ? $product_item->id : ''?>">
                <div id="itemRows">
                    <input onclick="addRow(this.form);" type="button" class="btn btn-info" value="Add row" />
                    <br><br>
                <?php if(isset($color_item)){
                    foreach($color_item as $item){ ?>
                        <input type="hidden" name="type[]" value="<?php echo isset($item['id']) ? $item['id'] : 'add'?>">
                        Color: <input type="text" name="color[]" value="<?php echo isset($item['color']) ? $item['color'] : ''?>"/>
                        Size: <input type="text" name="size[]"  value="<?php echo isset($item['size']) ? $item['size'] : ''?>" />
                        Quantity: <input type="text" name="qty[]"  value="<?php echo isset($item['quantity']) ? $item['quantity'] : ''?>" />

                        <br><br>
                    <?php }
                }?>

                </div>

        <input type="submit" class="btn btn-primary" value="Save Changes">
        </form>

    </div>
</div>

<script type="text/javascript">
    var rowNum = 0;
    function addRow(frm) {
        rowNum ++;
        var row = 'Color: <input type="text" name="color[]"> size: <input type="text" name="size[]" > Quantity: <input type="text" name="qty[]"><input type="hidden" name="type[]" value="add"><br><br>';
        jQuery('#itemRows').append(row);

    }
</script>




