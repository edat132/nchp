<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `sample_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
    if(isset($id)){
        $status_qry = $conn->query("SELECT ic.status_id, c.name as `status` from `sample_status` ic inner join status_list c on ic.status_id = c.id where ic.sample_id = '{$id}' ");
       $status = implode(", ", array_column($status_qry->fetch_all(MYSQLI_ASSOC),'crime'));
    }
    if(isset($cell_id)){
        $cell_block_qry = $conn->query("SELECT concat(p.name,' - ', c.name) as `cell_block` FROM `cell_list` c inner join `prison_list` p on c.prison_id = p.id where c.id = '{$cell_id}'");
        if($cell_block_qry->num_rows > 0)
         $cell_block = $cell_block_qry->fetch_array()[0];
    }
}
?>
<style>
    img#cimg{
		height: 14em;
		width: 100%;
		object-fit: cover;
	}
</style>
<div class="content py-4 bg-gradient-navy px-3">
    <h4 class="mb-0">View Sample Entry Details</h4>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="card rounded-0 shadow">
            <div class="card-header py-1 text-center">
                <div class="card-tools">
                <button class="btn btn-flat btn-sm btn-light bg-gradient-light border" id="print" type="button"><i class="fa fa-print"></i>Print</button>
                <button class="btn btn-flat btn-sm btn-primary bg-gradient-primary border" id="update_privilege" type="button">Update Privilege</button>
                <button class="btn btn-flat btn-sm btn-danger bg-gradient-danger border" id="delete-sample" type="button"><i class="fa fa-trash"></i> Delete</button>
                <a class="btn btn-flat btn-sm btn-navy bg-gradient-navy border" href="./?page=sample/manage_sample&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-flat btn-sm btn-light bg-gradient-light border" href="./?page=sample"><i class="fa fa-angle-left"></i> Back to List</a>
                </div>
            </div>
        </div>
        <div class="card rounded-0 shadow">
            <div class="card-header py-1 text-center">
                <div class="card-tools">
                    <div class=""><b>Sample Entry Status:</b> 
                    <?php if(isset($date_to) && !empty($date_to) && strtotime($date_to) <= strtotime(date('Y-m-d'))): ?>
                        <span class='text-primary'>Active</span>
                    <?php else: ?>
                    <?= isset($status) && $status == 1 ? "<span class='text-success'>Acitve</span>" : "<span class='text-danger'>Inactive</span>" ?>
                    <?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="card rounded-0 shadow">
            <div class="card-body">
                <div class="container-fluid" id="sample-details">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                            <img src="<?= validate_image(isset($image_path) ? $image_path : '') ?>" alt="Inmate image" class="img-thumbnail rounded-0 bg-gradient-dark border p-0 border-4 border-dark" id="cimg">
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
                            <div class="d-flex w-100">
                                <div class="col-auto m-0 border bg-gradient-secondary">BarCode</div>
                                <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($code) ? $code : '' ?></div>
                                <div class="col-auto m-0 border bg-gradient-secondary">Equipment Model</div>
                                <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($cell_block) ? $cell_block : '' ?></div>
                            </div>
                            <div class="d-flex w-100">
                                <div class="col-auto m-0 border bg-gradient-secondary">Name</div>
                                <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($name) ? $name : '' ?></div>
                            </div>
                            <div class="d-flex w-100">
                                <div class="col-auto m-0 border bg-gradient-secondary">Sex</div>
                                <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($sex) ? $sex : '' ?></div>
                                <div class="col-auto m-0 border bg-gradient-secondary">Entry Date</div>
                                <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($dob) ? date("F d, Y", strtotime($dob)) : '' ?></div>
                            </div>
                            <div class="d-flex w-100">
                                <div class="col-auto m-0 border bg-gradient-secondary">Address</div>
                                <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($address) ? $address : '' ?></div>
                            </div>
                           
                        </div>
                    </div>
                    <fieldset class="border px-2 pb-2">
                        <legend class="w-auto mx-3 px-2">Machine Details</legend>
                        <div class="d-flex w-100">
                            <div class="col-auto m-0 border bg-gradient-secondary">Machine Status</div>
                            <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($crimes) ? $crimes : '' ?></div>
                        </div>
                        <div class="d-flex w-100">
                            <div class="col-auto m-0 border bg-gradient-secondary">Remarks</div>
                            <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($sentence) ? $sentence : '' ?></div>
                        </div>
                        <div class="d-flex w-100">
                            <div class="col-auto m-0 border bg-gradient-secondary">Registered At</div>
                            <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($date_from) ? date("M d, Y", strtotime($date_from)) : '' ?></div>
                            <div class="col-auto m-0 border bg-gradient-secondary">Modified At</div>
                            <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($date_to) && !empty($date_to) ? date("M d, Y", strtotime($date_to)) : '---- -- --' ?></div>
                        </div>
                    </fieldset>
                    <fieldset class="border px-2 pb-2">
                        <legend class="w-auto mx-3 px-2">Emergency Contact Details</legend>
                        <div class="d-flex w-100">

                            <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($emergency_name) ? $emergency_name : '' ?></div>
                        </div>
                        <div class="d-flex w-100">
                            <div class="col-auto m-0 border bg-gradient-secondary">Email</div>
                            <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($emergency_relation) ? $emergency_relation : '' ?></div>
                            <div class="col-auto m-0 border bg-gradient-secondary">Contact #</div>
                            <div class="col-auto m-0 border flex-shrink-1 flex-grow-1"><?= isset($emergency_contact) ? $emergency_contact : '' ?></div>
                        </div>
                         </div>
                    <fieldset class="border px-4 pb-3">
                        <legend class="w-auto mx-3 px-2">Laboratory Services</legend>
                        <div class="d-flex w-100">
                         
 <label>
      
        <input type="checkbox" id="documentation" name="documentation" value="Documentation"
            <?= isset($documentation) && $documentation ? 'checked' : '' ?>>
        Documentation
    </label>
</div>
         
          <label>
        <input type="checkbox" id="Compressive Strength:" name="Compressive Strength:" value="Compressive Strength:"
            <?= $compressive ? 'checked' : '' ?>>
    Compressive Strength:
    </label>
<br>
  <label>
        <input type="checkbox" id="Compressive Strength:" name="Compressive Strength:" value="Compressive Strength:"
            <?= $utm ? 'checked' : '' ?>>
   UTM:
    </label>
    <br/>
     <label>
        <input type="checkbox" id="Compressive Strength:" name="Compressive Strength:" value="Compressive Strength:"
            <?= $rebounds ? 'checked' : '' ?>>
    Rebound Hammer:
    </label>
                    <br/> 
    <label>
        <input type="checkbox" id="Compressive Strength:" name="Compressive Strength:" value="Compressive Strength:"
            <?= $particle_size? 'checked' : '' ?>>
    Particle Size Determination:

    </label>
    <br/>
     <label>
        <input type="checkbox" id="physicalprop" name="physicalprop" value="Compressive Strength:"
            <?= $physicalprop ? 'checked' : '' ?>>
   Physical Property Analysis:
    </label>
    <br>
  <label>
        <input type="checkbox" id="Compressive Strength:" name=" moisture" value=" Moisture Content"
            <?= $moisture ? 'checked' : '' ?>>
   Moisture Content:
    </label>
    <br/>
     <label>
        <input type="checkbox" id="Compressive Strength:" name="" value="Compressive Strength:"
            <?= $water_absorption ? 'checked' : '' ?>>
    Water Absorption Capacity and Porosity:
    </label>
                    <br/> 
    <label>
        <input type="checkbox" id="Compressive Strength:" name="Compressive Strength:" value="Compressive Strength:"
            <?= $ph ? 'checked' : '' ?>>
   pH :

    </label>
    <br/>
     <label>
        <input type="checkbox" id="Compressive Strength:" name="Compressive Strength:" value="Compressive Strength:"
            <?= $binder ? 'checked' : '' ?>>
   Binder Analysis:
    </label>
<br/>
     <label>
        <input type="checkbox" id="Compressive Strength:" name="Compressive Strength:" value="Compressive Strength:"
            <?= $xrf ? 'checked' : '' ?>>
   XRF Analysis:
    </label>
    <br/>
     <label>
        <input type="checkbox" id="xrd:" name="Compressive Strength:" value="Compressive Strength:"
            <?= isset($XRD_Analysis) && $XRD_Analysis ? 'checked' : '' ?>>
   XRD Analysis:
    </label>
    <br/>
     <label>
        <input type="checkbox" id="Compressive Strength:" name="Compressive Strength:" value="Compressive Strength:"
            <?= $ftir ? 'checked' : '' ?>>
   FTIR Analysis:
    </label>
</div>
</div>
         
                    </fieldset>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="card rounded-0 shadow">
            <div class="card-header py-1">
                <div class="card-title"><b>Serial Number Equipment </b></div>
                <div class="card-tools">
                    <button class="btn btn-flat btn-light border-gradient-light border" type="button" id="add_record"><i class="far fa-plus-square"></i> Add Record</button>
                </div>
            </div>
            <div class="card-body container-fluid">
                <table class="table table-striped table-bordered" id="record-table">
                    <colgroup>
                        <col width="15%">
                        <col width="25%">
                        <col width="40%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="p-1 text-center">Date</th>
                            <th class="p-1 text-center">Action</th>
                            <th class="p-1 text-center">Remarks</th>
                            <th class="p-1 text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php 
                        if(isset($id)):
                        $records = $conn->query("SELECT r.*,a.name as `action` FROM `record_list` r inner join `serial_list` a on r.action_id = a.id where r.`sample_id` ='{$id}' order by date(r.`date`) asc, abs(unix_timestamp(r.date_created)) asc ");
                        while($row = $records->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?= date("M d, Y", strtotime($row['date'])) ?></td>
                            <td><?= $row['action'] ?></td>
                            <td><?= $row['remarks'] ?></td>
                            <td class="text-center">
                                <div class="btn-group btn-sm">
                                    <button class="btn btn-flat btn-xs btn-primary bg-gradient-primary edit-record" type="button" data-id="<?= $row['id'] ?>"><small><i class="fa fa-edit"></i></small></button>
                                    <button class="btn btn-flat btn-xs btn-danger bg-gradient-danger delete-record" type="button" data-id="<?= $row['id'] ?>"><small><i class="fa fa-trash"></i></small></button>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
    <div>
        <style>
            html{
                min-height:unset !important;
            }
            @media print{
                html, body{
                    min-height:unset !important;
                }
                img#cimg{
                    height: 14em;
                    width: 100%;
                    object-fit: cover;
                }
            }
        </style>
        <div class="d-flex w-100 align-items-center">
            <div class="col-2 text-center">
                
            </div>
            <div class="col-8">
                <div style="line-height:1em">
                    <div class="text-center font-weight-bold h5 mb-0"><large><?= $_settings->info('name') ?></large></div>
                    <div class="text-center font-weight-bold h5 mb-0"><large>Sample Entry Details</large></div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</noscript>
<script>
    function delete_sample($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_sample",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.replace('./?page=sample');
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
    function delete_record($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_record",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload()
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
    $(function(){
        $('#update_privilege').click(function(){
            uni_modal('Update <b>Client-<?= isset($code) ? $code : '' ?></b>\Privilege', 'sample/manage_privilege.php?id=<?= isset($id) ? $id : '' ?>')
        })
        $('#delete-sample').click(function(){
			_conf("Are you sure to delete this Client permanently?","delete_sample",['<?= isset($id) ? $id : '' ?>'])
		})
        $('#add_record').click(function(){
            uni_modal('<i class="far fa-plus-square"></i> Add Serial Equipment for <b>Client - <?= isset($code) ? $code : '' ?></b>', 'sample/manage_record.php?sample_id=<?= isset($id) ? $id : '' ?>')
        })
        $('.edit-record').click(function(){
            uni_modal('<i class="far fa-edit"></i> Edit Serial Equipment Record', 'sample/manage_record.php?id='+$(this).attr('data-id'))
        })
        $('.delete-record').click(function(){
            _conf("Are you sure to delete this record?", "delete_record", [$(this).attr('data-id')])
        })
        $('#record-table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [3] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
        $('.dataTables_paginate').find('.pagination .page-link').addClass('py-1')
        $('#print').click(function(){
            var h = $('head').clone()
            var ph = $($('noscript#print-header').html()).clone()
            var scritps = $('#script-list').clone()
            var details = $('#sample-details').clone()
            var records = $('#record-table').clone()
            records.dataTable().fnDestroy()
            records.find('th:nth-last-child(1)').remove()
            records.find('td:nth-last-child(1)').remove()
            records.find('col:nth-last-child(2)').attr('width',"60%")
            records.find('col:nth-last-child(1)').remove()
            h.find('title').text(" Details - Print View")
            var nw = window.open("", "_blank", "width="+($(window).width() * .8)+",left="+($(window).width() * .1)+",height="+($(window).height() * .8)+",top="+($(window).height() * .1))
            nw.document.querySelector('head').innerHTML = h.html()
            nw.document.querySelector('body').innerHTML = ph[0].outerHTML
            nw.document.querySelector('body').innerHTML += details[0].outerHTML
            nw.document.querySelector('body').innerHTML += "<h4 class='pt-3'> Serial Number</h4><hr>"
            nw.document.querySelector('body').innerHTML += records[0].outerHTML
            nw.document.querySelector('body').innerHTML += scritps[0].outerHTML
            nw.document.close()
            start_loader()
            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                    end_loader()
                }, 200);
            }, 300);

        })
    })
</script>