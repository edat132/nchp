<?php

require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `serial_list` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0){
        $row = $qry->fetch_assoc();
        foreach($row as $k => $v){
            $$k=$v;
        }
    }else{
        echo '<script>alert("action ID is not valid."); location.replace("./?page=actions")</script>';
    }
}else{
    echo '<script>alert("action ID is Required."); location.replace("./?page=actions")</script>';
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
    <dl>
        <dt class="text-muted">Serial Number</dt>
        <dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>
		<dt class="text-muted">Lab Instrument</dt>
        <dd class="pl-4"><?= isset($instruments) ? $instruments : "" ?></dd>
        <dt class="text-muted">Status</dt>
        <dd class="pl-4">
            <?php if(isset($status) && $status == 1): ?>
                <span class="badge bg-success rounded-pill">CALIBRATED</span>
            <?php elseif(isset($status) && $status == 2): ?>
                <span class="badge bg-danger rounded-pill">DECOMMISSIONED</span>
            <?php elseif(isset($status) && $status == 3): ?>
                <span class="badge bg-warning rounded-pill">UNDER MAINTENANCED</span>
          <?php elseif(isset($status) && $status == 0): ?>
                <span class="badge bg-secondary rounded-pill">Unknown Status</span>
            <?php endif; ?>
        </dd>
    </dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
    <button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>