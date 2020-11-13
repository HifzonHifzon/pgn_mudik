<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="index.html" class="navbar-brand nav-link">
              <img alt="branding logo" src="<?php echo base_url().'assets/images/pgn.png' ?>" data-expand="<?php echo base_url().'assets/images/pgn.png' ?>" data-collapse="<?php echo base_url().'assets/images/pgn.png' ?>" class="brand-logo" height="80px"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
              <li class="nav-item hidden-sm-down"><a href="https://pixinvent.com/bootstrap-admin-template/robust/" target="_blank" class="btn btn-success upgrade-to-pro">Upgrade to PRO $24</a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
             
              <li class="dropdown dropdown-user nav-item">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
              <i></i></span><span class="user-name">Logout</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    
                  <div class="dropdown-divider"></div><a href="<?php echo base_url().'login/logout' ?>" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
