<div class="wrapper">
    <div class="col-lg-9" style="margin:70px 220px;">
        <?php echo form_open_multipart('admin/image/save/'); ?>
        <table class="table">
            <tr>
                <td>Title</td>
                <td><?php echo form_input('title'); ?></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><?php echo form_upload('pic'); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_submit('submit', 'Save', 'class="btn btn-success"'); ?></td>
            </tr>
        </table>
    </div>
</div>