<div class="wrapper">
    <div class="col-lg-9" style="margin:70px 220px;">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
        <?php } ?>
        <div class="text-center"><h1><b>BRANDS</b></h1></div>
        <div class="col-lg-12" style="padding:20px;">
            <a href="<?php echo base_url('admin/brand_manager/add') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Add"> +
            </a>
        </div>
        <table class="table table-hover table-striped table-bordered">
            <tr>
                <th>S. No.</th>
                <th>Brands</th>
                <th>Actions</th>

            </tr>
            <?php $i=0; $check="no";?>
            <?php foreach($brands as $brand){?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $brand->name;?>
                        </td>
                        <td><a class="btn btn-warning" href="<?php echo base_url('admin/brand_manager/edit/'.$brand->id) ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="fa fa-pencil" aria-hidden="true"></span></a>
                            <a href="<?php echo base_url('admin/brand_manager/delete/'.$brand->id) ?>" class="btn btn-danger " data-toggle="tooltip" data-placement="bottom" title="Delete" ><span class="fa fa-trash" aria-hidden="true"></span></a></td>
                    </tr>
                <?php }  ?>
        </table>
    </div>
</div>


