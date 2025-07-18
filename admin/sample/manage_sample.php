<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `sample_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
    if(isset($id)){
        $status = $conn->query("SELECT status_id from `sample_status` where sample_id = '{$id}' ");
       $status = array_column($status->fetch_all(MYSQLI_ASSOC),'status_id');
    }
}
?>
<style>
    img#cimg{
		max-height: 15em;
		max-width: 100%;
		object-fit: scale-down;
	}
</style>
<div class="content py-4 bg-gradient-navy px-3">
    <h4 class="mb-0"><?= isset($id) ? "Update Sample" : "New Sample Entry" ?></h4>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="card rounded-0 shadow">
            <div class="card-body">
                <div class="container-fluid">
                    <form action="" id="serial-form">
                        <input type="hidden" name="id" value="<?= isset( $id) ? $id : '' ?>">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="code" class="control-label">Entry Code</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="code" id="code" required="required" value="<?= isset($code) ? $code : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="cell_id" class="control-label">Entry Date</label>
                                    
                                    <input type="date" class="form-control form-control-sm rounded-0" name="dob" id="dob" required="required" value="<?= isset($dob) ? $dob : "" ?>">
                                </div>
                                    </div>
                                </div>
                              </div>
                                     <label>Client/Depoositor</label>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                
                                <div class="form-group">
                             
                                    <label for="firstname" class="control-label">First Name</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="firstname" id="firstname" required="required" value="<?= isset($firstname) ? $firstname : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="middlename" class="control-label">Middle Name</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="middlename" id="middlename" placeholder="optional" value="<?= isset($middlename) ? $middlename : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="lastname" class="control-label">Last Name</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="lastname" id="lastname" required="required" value="<?= isset($lastname) ? $lastname : "" ?>">
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="address" class="control-label">Address</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="address" id="address" required="required"><?= isset($address) ? $address : "" ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="emergency_contact" class="control-label">Contact # / Email Address</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="emergency_contact" id="emergency_contact" value="<?= isset($emergency_contact) ? $emergency_contact : "" ?>">
                                </div>
                            </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="complexion" class="control-label">Code Indentifier</label>
                                    <input type="complexion" class="form-control form-control-sm rounded-0" name="complexion" id="complexion" required="required" value="<?= isset($complexion) ? $complexion : "" ?>">
                                    </div>
                                </div>
                            </div>
                       
                           

                        <div class="row">
            
                      <br> <br/>
                    	&nbsp;&nbsp;&nbsp;&nbsp;<label><strong><center><align="center"></align><hr>Laboratory Services</cente><hr /></label></center>
	 
				<strong><input type="checkbox" id="documentation" name="documentation" value="Documentation">&nbsp;Documentation:</strong>
				<br/>
			    <label><input type="checkbox" id="compressive""  name="compressive" value="Compressive Strength"/>&nbsp;Compressive Strength:</label>
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" id="utm" name="utm" value="UTM"/>UTM</label>
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" id="rebounds" name="rebounds" value="Rebound Hammer"/>Rebound Hammer</label>
				<br />
			    <label><input type="checkbox" id="particle_size" name="particle_size" value="Particle Size Determination"/>&nbsp;Particle Size Determination</label>
				<br />
                <label><input type="checkbox" id="physicalprop" name="physicalprop" value="Physical Property Analysis"/>&nbsp;Physical Property Analysis</label>
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" id="moisture" name="moisture" value="Moisture Content"/>&nbsp;Moisture Content</label>
             
				<label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="water_absorption" name="water_absorption" value="Water Absorption Capacity and Porosity"/>Water Absorption Capacity and Porosity</label>
				&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" id="ph" name="ph" value="pH"/>pH</label>
                 <br/>
				<label><input type="checkbox" id="binder" name="binder" value="Binder Analysis "/>&nbsp;Binder Analysis </label>
			
			      <br/>
				<label><input type="checkbox" id="xrf" name="xrf" value="XRF Analysis "/>&nbsp;XRF Analysis  </label>
			
			      <br/>
				<label><input type="checkbox" id="XRD_Analysis" name="XRD_Analysis" value="XRD Analysis "/>&nbsp;XRD Analysis</label>
							      <br/>
				<label><input type="checkbox" id="ftir" name="ftir" value="FTIRAnalysis "/>&nbsp;FTIR Analysis </label>
				<br />
				<label>*check all that applies</label>
			
		 
            <div class="card-footer py-1 text-center">
                <button class="btn btn-flat btn-sm btn-navy bg-gradient-navy" form="inmate-form"><i class="fa fa-save"></i> Save</button>
                <?php if(!isset($id)): ?>
                <a class="btn btn-flat btn-sm btn-light bg-gradient-light border" href="./?page=sample"><i class="fa fa-angle-left"></i> Cancel</a>
                <?php else: ?>
                <a class="btn btn-flat btn-sm btn-light bg-gradient-light border" href="./?page=sample/view_sample&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-angle-left"></i> Cancel</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>

    
    function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        	$(input).siblings('.custom-file-label').html(input.files[0].name)
	        }
	        reader.readAsDataURL(input.files[0]);
	    }else{
            $('#cimg').attr('src', "<?php echo validate_image(isset($image_path) ? $image_path : '') ?>");
            $(input).siblings('.custom-file-label').html('Choose file')
        }
	}
	$(document).ready(function(){
        $('#status_ids').select2({
            placeholder:"Please select  here",
            width:'100%',
            containerCssClass:'rounded-0 rounded-0 pb-2'
        })
        $('#cell_id').select2({
            placeholder:"Please select  cell block here",
            width:'100%',
            containerCssClass:'form-control form-control-sm rounded-0'
        })
		$('#inmate-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
            var el = $('<div>')
            el.addClass('alert alert-danger rounded-0 err-msg')
            el.hide()
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_sample",
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
						location.replace("./?page=sample/view_sample&id="+resp.iid)
					}else if(resp.status == 'failed' && !!resp.msg){
                            el.text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").scrollTop(0);
                    }else{
						alert_toast("An error occured",'error');
					}
                    end_loader()
				}
			})
		})

	})
</script>