<div class="wrapper">
    <div class="col-lg-9" style="margin:70px 220px;">
        <?php if ($this->session->flashdata('message')){ ?>
            <div class="alert alert-info"><?php echo ($this->session->flashdata('message'));?></div>
       <?php }?>
        <div class="text-center"><h1><b>PRODUCTS</b></h1></div>
        <div class="col-lg-12" style="padding:20px;">
            <a href="<?php echo base_url('admin/product/add_product_form') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="ADd"> +
            </a>
        </div>
        <table class="table table-hover table-striped table-bordered">
            <tr>
                <th>S. No.</th>
                <th>Product</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>

            <?php $i = 0; ?>
            <?php foreach ($product as $data) { ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo ucwords($data['name']); ?></td>
                    <td><?php foreach ($category as $items){
                            if($data['cat_id'] == $items['id']){
                                foreach($category as $item) {
                                    if ($items['parent_id'] == $item['id']) {
                                        echo $item['name'];
                                    }
                                }
                            }
                     }?></td>
                    <td><a class="btn btn-warning" href="<?php echo base_url('admin/product/edit_product/' . $data['id']) ?>" data-toggle="tooltip" data-placement="bottom"
                           title="Edit"><span class="fa fa-pencil" aria-hidden="true"></span></a>
                        <a href="<?php echo base_url('admin/product/delete_product/' . $data['id']) ?>"
                           class="btn btn-danger" data-toggle="tooltip" data-placement="bottom"
                           title="Delete"><span class="fa fa-trash" aria-hidden="true"></span></a>
                        <?php if($data['featured'] == 'yes'){
                            $title = "Unset Featured Item";
                            $class = "fa fa-times";
                        } else {
                            $title = "Set Featured Item";
                            $class = "fa fa-check";
                        }?>
                        <a href="<?php echo base_url('admin/product/featured_product/' . $data['id']) ?>"
                           class="btn btn-info" data-toggle="tooltip" data-placement="bottom"
                           title="<?php echo $title;?>"><span class="<?php echo $class?>" aria-hidden="true"></span></a></td>

                </tr>
            <?php } ?>
        </table>

    </div>
</div>



