<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function__destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
		}
	}
// Removed duplicate save_equipment method to fix syntax error
	function delete_img(){
		extract($_POST);
		if(is_file($path)){
			if(unlink($path)){
				$resp['status'] = 'success';
			}else{
				$resp['status'] = 'failed';
				$resp['error'] = 'failed to delete '.$path;
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = 'Unkown '.$path.' path';
		}
		return json_encode($resp);
	}
	//Save apparatus Function
	function save_apparatus(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = $this->conn->real_escape_string(htmlspecialchars($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `apparatus_list` where `name` = '{$this->conn->real_escape_string($name)}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Apparatus already exists.";
			return json_encode($resp);
		}
		if(empty($id)){
			$sql = "INSERT INTO `apparatus_list` set {$data} ";
		}else{
			$sql = "UPDATE `apparatus_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Appartus successfully saved.";
			else
				$resp['msg'] = " Apparatus successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
	//delete apparatus
	function delete_apparatus(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `apparatus_list` set `delete_flag` = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Apparatus successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	//save equipment
	function save_equipment(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = $this->conn->real_escape_string(htmlspecialchars($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `equipment_list` where `name` = '{$this->conn->real_escape_string($name)}' and `apparatus_id` = '{$apparatus_id}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Equipment Model already exists.";
			return json_encode($resp);
		}
		if(empty($id)){
			$sql = "INSERT INTO `equipment_list` set {$data} ";
		}else{
			$sql = "UPDATE `equipment_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Equipment Model successfully saved.";
			else
				$resp['msg'] = " Equipment successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
	//Delete equipment
	function delete_equipment(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `equipment_list` set `delete_flag` = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Equipment successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	//Save Status
	function save_status(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = $this->conn->real_escape_string(htmlspecialchars($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `status_list` where `name` = '{$this->conn->real_escape_string($name)}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Equipment Status already exists.";
			return json_encode($resp);
		}
		if(empty($id)){
			$sql = "INSERT INTO `status_list` set {$data} ";
		}else{
			$sql = "UPDATE `status_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Equipment Model Status successfully saved.";
			else
				$resp['msg'] = "Equipment ModelStatus successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
	//delete status
	function delete_status(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `status_list` set `delete_flag` = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Equipment Model Status successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	//Save Sample
	function save_sample(){
		extract($_POST);
		$data = "";
		$lab_services = [
			'documentation','compressive','utm','rebounds','particle_size','physicalprop',
			'moisture','water_absorption','ph','binder','xrf','XRD_Analysis','ftir'
		];
		$lab_remarks = [];
		foreach($lab_services as $service) {
			$remarks_key = 'lab_remarks_' . $service;
			$lab_remarks[$service] = isset($_POST[$remarks_key]) ? $this->conn->real_escape_string(htmlspecialchars($_POST[$remarks_key])) : '';
	
// Collect all remarks fields from POST
				$remark_fields = [
			'documentation', 'compressive', 'utm', 'rebounds', 'particle_size',
			'physicalprop', 'moisture', 'water_absorption', 'ph', 'binder',
			'xrf', 'XRD_Analysis', 'ftir'
		];
		$lab_remarks = [];
		foreach ($remark_fields as $field) {
			$key = "remarks_" . $field;
			if (isset($_POST[$key]) && trim($_POST[$key]) !== '') {
				$lab_remarks[$field] = $_POST[$key];
			}
}
$lab_remarks_json = json_encode($lab_remarks);
// Save $lab_remarks_json to the lab_remarks column in your SQL
		}
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id')) && !is_array($_POST[$k]) && strpos($k, 'lab_remarks_') !== 0){
				if(!empty($data)) $data .=",";
				$v = $this->conn->real_escape_string(htmlspecialchars($v));
				if(!empty($v))
				$data .= " `{$k}`='{$v}' ";
				else
				$data .= " `{$k}`= NULL ";
			}
		}
		// Add lab_remarks JSON to data
		if(!empty($data)) $data .= ",";
		$data .= " `lab_remarks`='" . $this->conn->real_escape_string(json_encode($lab_remarks)) . "' ";
		$check = $this->conn->query("SELECT * FROM `sample_list` where `code` = '{$this->conn->real_escape_string($code)}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Sample Entry Code already exists.";
			return json_encode($resp);
		}
		if(empty($id)){
			$sql = "INSERT INTO `sample_list` set {$data} ";
		}else{
			$sql = "UPDATE `sample_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$iid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['iid'] = $iid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Sample Entry successfully saved.";
			else
				$resp['msg'] = " Sample Entry successfully updated.";
			if(isset($status_ids)){
				$this->conn->query("DELETE FROM `sample_status` where sample_id = '{$iid}'");
				$data = '';
				foreach($status_ids as $k=>$v){
					if(!empty($data)) $data .=", ";
					$data .= "('{$iid}', '{$v}')";
				}
				if(!empty($data)){
					$sql2 = "INSERT INTO `sample_status` (`sample_id`, `status_id`) VALUES {$data}";
					$save2 = $this->conn->query($sql2);
					if(!$save2){
						$resp['status'] = 'failed';
						$resp['msg'] = $this->conn->error;
						$resp['sql'] = $sql2;
					}
				}
			}
			if(!empty($_FILES['img']['tmp_name'])){
				$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
				$dir = "uploads/sample/";
				if(!is_dir(base_app.$dir))
					mkdir(base_app.$dir);
				$fname = $dir.$iid.'.png';
				$accept = array('image/jpeg','image/png');
				if(!in_array($_FILES['img']['type'],$accept)){
					$resp['msg'] .= "Image file type is invalid";
				}
				if($_FILES['img']['type'] == 'image/jpeg')
					$uploadfile = imagecreatefromjpeg($_FILES['img']['tmp_name']);
				elseif($_FILES['img']['type'] == 'image/png')
					$uploadfile = imagecreatefrompng($_FILES['img']['tmp_name']);
				if(!$uploadfile){
					$resp['msg'] .= "Image is invalid";
				}
				$temp = imagescale($uploadfile,200,200);
				if(is_file(base_app.$fname))
				unlink(base_app.$fname);
				$upload =imagepng($temp,base_app.$fname);
				if($upload){
					$qry = $this->conn->query("UPDATE sample_list set image_path = CONCAT('{$fname}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$iid}' ");
				}
				imagedestroy($temp);
			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success' && isset($resp['msg']))
			$this->settings->set_flashdata('success',$resp['msg']);
			
			return json_encode($resp);
	}
	//delete sample
	function delete_sample(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `sample_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Sample Entry successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	//Save Function serial

	function save_serial(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = $this->conn->real_escape_string(htmlspecialchars($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `serial_list` where `name` = '{$this->conn->real_escape_string($name)}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Serial Number already exists.";
			return json_encode($resp);
		}
		if(empty($id)){
			$sql = "INSERT INTO `serial_list` set {$data} ";
		}else{
			$sql = "UPDATE `serial_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Serial Number successfully saved.";
			else
				$resp['msg'] = " Serial Number successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
//Delete serial
	function delete_serial(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `serial_list` set `delete_flag` = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," serial successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	//Save Record
	function save_record(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = $this->conn->real_escape_string(htmlspecialchars($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `record_list` set {$data} ";
		}else{
			$sql = "UPDATE `record_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Record successfully saved.";
			else
				$resp['msg'] = " Record successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
	//delete Record
	function delete_record(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `record_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Record successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function update_privilege(){
		extract($_POST);
		$vp = isset($visiting_privilege) && $visiting_privilege == 'on' ? 1 : 0;
		$update = $this->conn->query("UPDATE `sample_list` set `visiting_privilege` = $vp where id = '{$id}' ");
		if($update){
			$resp['status'] = 'success';
			$resp['msg'] = " Sample Privilege has been updated.";
		}else{
			$resp['status'] = 'success';
			$resp['msg'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}
	function save_visit(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = $this->conn->real_escape_string(htmlspecialchars($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `visit_list` set {$data} ";
		}else{
			$sql = "UPDATE `visit_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Visitor Details successfully saved.";
			else
				$resp['msg'] = " Visitor Details successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
	function delete_visit(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `visit_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Visitor Details successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'delete_img':
		echo $Master->delete_img();
	break;
	case 'save_apparatus':
		echo $Master->save_apparatus();
	break;
	case 'delete_apparatus':
		echo $Master->delete_apparatus();
	break;
	case 'save_equipment':
		echo $Master->save_equipment();
	break;
	case 'delete_equipmment':
		echo $Master->delete_equipment();
	break;
	case 'save_status':
		echo $Master->save_status();
	break;
	case 'delete_status':
		echo $Master->delete_status();
	break;
	case 'save_sample':
		echo $Master->save_sample();
	break;
	case 'delete_sample':
		echo $Master->delete_sample();
	break;
	case 'save_serial':
		echo $Master->save_serial();
	break;
	case 'delete_serial':
		echo $Master->delete_serial();
	break;
	case 'save_record':
		echo $Master->save_record();
	break;
	case 'delete_record':
		echo $Master->delete_record();
	break;
	case 'update_privilege':
		echo $Master->update_privilege();
	break;
	case 'save_visit':
		echo $Master->save_visit();
	break;
	case 'delete_visit':
		echo $Master->delete_visit();
	break;
	default:
		// echo $sysset->index();
		break;
}