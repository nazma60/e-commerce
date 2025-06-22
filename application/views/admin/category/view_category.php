<div class="wrapper">
    <div class="col-lg-9" style="margin:70px 220px;">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
        <?php } ?>
        <div class="col-lg-12" style="padding:20px;">
            <a href="<?php echo base_url('admin/category_manager/add_category_form') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Add"> +
            </a>
        </div>
        <table class="table table-hover table-striped table-bordered">
            <tr>
                <th>S. No.</th>
                <th>Category</th>
                <th>Actions</th>

            </tr>
            <?php $i=0; $check="no";?>
            <?php foreach($category as $data){
                if($data['parent_id'] == 0){
                     $check="no";?>
            <tr>
                <td><?php echo ++$i; ?></td>
                <td><?php echo $data['name'];
                    foreach($category as $item)
                    {
                        if ($data['id'] == $item['parent_id']){
                            $check="yes";
                        }
                    }
                    if ($check=="yes"){?>
                        <button class="btn btn-success sub_category" style="float:right">View Sub-categories</button>
                    <?php }?>
                    <div class="category" style="display:none">
                        <ul>
                            <?php
                                foreach($category as $items){
                                    if ($data['id'] == $items['parent_id']){?>
                                        <li> <?php echo ucwords($items['name'])?></li>
                                        <a class="btn btn-warning" href="<?php echo base_url('admin/category_manager/edit_category/'.$items['id']) ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><span class="fa fa-edit" aria-hidden="true"></span></a>
                                        <a href="<?php echo base_url('admin/category_manager/delete_category/'.$items['id']) ?>" class="btn btn-danger delete_category" data-toggle="tooltip" data-placement="bottom" title="Delete" ><span class="fa fa-trash" aria-hidden="true"></span></a>

                                   <?php }?>
                            <?php
                            }
                          ?>
                        </ul>
                    </div>
                </td>
                <td><a class="btn btn-warning" href="<?php echo base_url('admin/category_manager/edit_category/'.$data['id']) ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="fa fa-pencil" aria-hidden="true"></span></a>
                     <a href="<?php echo base_url('admin/category_manager/delete_category/'.$data['id']) ?>" class="btn btn-danger " data-toggle="tooltip" data-placement="bottom" title="Delete" ><span class="fa fa-trash" aria-hidden="true"></span></a></td>
            </tr>
            <?php } } ?>
        </table>
    </div>
</div>


