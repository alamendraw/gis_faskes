<?php   
    $g_id = userinfo('group_id'); 
    $group = $this->db->query("SELECT * FROM user_group WHERE id='$g_id'")->result()[0];
    $image = base_url().'assets/images/user/profiless.png';
;?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-extended.min.css">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                    
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
                                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i class="ficon feather icon-menu"></i></a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li class="nav-item mobile-menu d-xl-none mr-auto">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"><b> <?php echo userinfo('name');?></b></a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav bookmark-icons"> 
                                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"><b><h2 class="brand-text mb-0">Sistem Informasi Geografis Aset Faskes</h2></b></a></li>
                            </ul>
                            <ul class="nav navbar-nav"> </ul>
                        </div>

                        <ul class="nav navbar-nav float-right">
                           
                            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                             
                           
                            <li class="dropdown dropdown-user nav-item">
                                <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo userinfo('name');?></span><span class="user-status"><?php echo $group->title;?></span></div><span>
                                        <img class="round" src="<?php echo (userinfo('image')!='')? userinfo('image'):$image;?>" alt="avatar" height="40" width="40" /></span>
                                </a>
                                 
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo site_url('coming_soon')?>"><i class="feather icon-user"></i> Edit Profile</a> 
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo site_url('login/signout')?>"><i class="feather icon-power"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END: Header--> 