
<style>
  .sidebar a.nav-link.active{
    color:#fff !important
  }
</style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-navy navbar-dark elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>admin" class="brand-link bg-navy text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 1.5rem;height: 1.5rem;max-height: unset">
        <span class="brand-text font-weight-light text-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-1">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a href="./?page=sample" class="nav-link nav-sample">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                          Sample List
                        </p>
                      </a>
                    </li> 
					 
					
					
                    
                    <?php if($_settings->userdata('type') == 1): ?>
                    <li class="nav-header">Master List</li>
                    <li class="nav-item dropdown">
                      
                    <li class="nav-item dropdown">
                      <a href="./?page=actions" class="nav-link nav-actions">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                          Serial Number Equipment List
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                          Reports
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                          <a href="./?page=reports/record_history" class="nav-link tree-item nav-reports_record_history">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Laboratory Records</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./?page=reports/visitor_report" class="nav-link tree-item nav-reports_visitor_report">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Client Reports</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-header">Maintenance</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                          User List
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                          System Information
                        </p>
                      </a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      page = page.replace(/\//g,'_');
      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
      $('.nav-link.active').addClass('bg-gradient-navy')
      $('.main-sidebar .nav-link').each(function(){
        var text = $(this).text()
        $(this).attr('title', text)
      })
    })
  </script>