<style>
  #system-cover{
    width:100%;
    height:35em;
    object-fit:cover;
    object-position:center center;
  }
</style>
<h1 class="">Welcome, <?php echo $_settings->userdata('firstname')." ".$_settings->userdata('lastname') ?>!</h1>
<hr>
<div class="row">
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-flask"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Type of Apparatus</span>
        <span class="info-box-number text-right h5">
          <?php 
            $prison = $conn->query("SELECT * FROM apparatus_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($prison);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-microscope"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Equipment Model List </span>
        <span class="info-box-number text-right h5">
          <?php 
            $cells = $conn->query("SELECT id FROM equipment_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($cells);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-cogs"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Equipment Status</span>
        <span class="info-box-number text-right h5">
          <?php 
            $status = $conn->query("SELECT id FROM status_list where  `status` =1 and delete_flag = 0")->num_rows;
            echo format_num($status);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-bars"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Serial Number Equipment </span>
        <span class="info-box-number text-right h5">
          <?php 
            $serial = $conn->query("SELECT id FROM serial_list where `status` =1 and delete_flag = 0")->num_rows;
            echo format_num($serial);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Sample Entry</span>
        <span class="info-box-number text-right h5">
        <?php 
            $sample = $conn->query("SELECT id FROM sample_list where date(date_to) <= '".date('Y-m-d')."'")->num_rows;
            echo format_num($sample);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"></span>
        <span class="info-box-number text-right h5">
         
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-file-alt"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"></span>
        <span class="info-box-number text-right h5">
        
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<div class="container-fluid text-center">
  <img src="<?= validate_image($_settings->info('cover')) ?>" alt="system-cover" id="system-cover" class="img-fluid">
</div>
