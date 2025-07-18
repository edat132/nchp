<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `visit_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="visit-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		 <div class="form-group">
            <label for="cell_id" class="control-label">Instrument Model</label>
                <select class="form-control form-control-sm rounded-0" name="cell_id" id="cell_id" required="required">
                <option value="" <?= !isset($cell_id) ? 'selected' : '' ?>></option>
                <?php 
                     $cells = $conn->query("SELECT c.*, p.name as `prison` FROM `cell_list` c inner join prison_list p on c.prison_id = p.id where c.delete_flag = 0 and c.`status` = 1 order by c.`name` asc ");
                         while($row = $cells->fetch_assoc()):
                           ?>
                         <option value="<?= $row['id'] ?>" <?= isset($cell_id) && $cell_id == $row['id'] ? 'selected' : '' ?>><?= $row['prison'] . " - " . $row['name'] ?></option>
                        <?php endwhile; ?>
                        </select>
                        </div>
                          </div>

		<label for="action_id" class="control-label">Serial Number</label>
            <select class="form-control form-control-sm rounded-0" name="action_id" id="action_id" required="required">
                <option value="" <?= !isset($action_id) ? 'selected' : '' ?>></option>
                <?php 
                $actions = $conn->query("SELECT * FROM `action_list` where delete_flag = 0 and `status` = 1 order by `name` asc");
                while($row = $actions->fetch_assoc()):
                ?>
                <option value="<?= $row['id'] ?>" <?= isset($action_id) && $row['id'] == $action_id ? 'selected' : '' ?>><?= $row['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
		<div class="form-group">
			<label for="relation" class="control-label">Relation</label>
			<input type="text" name="relation" id="relation" class="form-control form-control-sm rounded-0" value="<?php echo isset($relation) ? $relation : ''; ?>"  required/>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#uni_modal').on('shown.bs.modal', function(){
			$('#inmate_id').select2({
				placeholder:'Please select inmate here',
				width:'100%',
				dropdownParent:$('#uni_modal'),
				containerCssClass:'form-control form-control-sm rounded-0'
			})
		})
		$('#visit-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_visit",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						// location.reload()
						alert_toast(resp.msg, 'success')
						uni_modal("<i class='fa fa-th-list'></i> Visitor Details ","visits/view_visit.php?id="+resp.cid)
						$('#uni_modal').on('hide.bs.modal', function(){
							location.reload()
						})
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").scrollTop(0);
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>