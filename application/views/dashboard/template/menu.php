
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">

      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content" style="margin-top:20px">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        
    <?php if ($this->session->userdata('email') == 'admin') { ?>
          <li class=" nav-item">
              <a href="<?php echo base_url().'dashboard/transportasi' ?>">
                  <i class="icon-share"></i>
                        <span data-i18n="nav.support_documentation.main" class="menu-title">Master Transportasi</span>
              </a>
          </li>

          <li class=" nav-item">
              <a href="<?php echo base_url().'dashboard/Rute' ?>">
              <i class="icon-share"></i>
                        <span data-i18n="nav.support_documentation.main" class="menu-title">Master Rute </span>
              </a>
          </li>


          <li class=" nav-item">
              <a href="<?php echo base_url().'dashboard/JenisTransportasi' ?>">
              <i class="icon-share"></i>
                        <span data-i18n="nav.support_documentation.main" class="menu-title">Master Jenis Transportasi</span>
              </a>
          </li>

          <li class=" nav-item">
              <a href="<?php echo base_url().'dashboard/JadwalBerangkat' ?>">
              <i class="icon-share"></i>
                        <span data-i18n="nav.support_documentation.main" class="menu-title">Jadwal Keberangkatan</span>
              </a>
          </li>

          <li class=" nav-item">
              <a href="<?php echo base_url().'dashboard/TransaksiBerangkat' ?>">
              <i class="icon-share"></i>
                        <span data-i18n="nav.support_documentation.main" class="menu-title">Transaksi Keberangkatan</span>
              </a>
          </li>
    <?php } else { ?>

        <li class=" nav-item">
              <a href="<?php echo base_url().'dashboard/MonitorTransaksi' ?>">
              <i class="icon-share"></i>
                        <span data-i18n="nav.support_documentation.main" class="menu-title">Monitrong Transaski</span>
              </a>
          </li>
    <?php } ?>
        </ul>
      </div>

    </div>