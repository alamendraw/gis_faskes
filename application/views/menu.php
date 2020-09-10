    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo site_url();?>">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Gis Faskes</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

<?php   
                $g_id = userinfo('group_id'); 
                $pre = $this->db->query("SELECT privileges FROM user_group WHERE id='$g_id'")->row('privileges');
                 
                $data = $this->db->query("SELECT * FROM menu WHERE is_active='1' and parent IS NULL and id in ($pre) order by sort_by");
                foreach($data->result() as $row_m){;?>
                    <li class="nav-item <?php echo ($menu['menu'] == $row_m->name)?'active':''; ?>"><a href="<?php echo site_url($row_m->url);?>" ><i class="feather <?php echo $row_m->icon;?>"></i><span class="menu-title" ><?php echo $row_m->title;?></span></a>                        
<?php 
                        $data_sub = $this->db->query("SELECT * FROM menu WHERE is_active='1' and parent=$row_m->id and id in ($pre) order by sort_by");
                        if($data_sub->num_rows()>0){;?>
                        <ul class="menu-content">
<?php                       foreach($data_sub->result() as $row_s){ ;?>
                                <li class="<?php echo ($menu['submenu'] == $row_s->name)?'active':''; ?>"><a href="<?php echo site_url($row_s->url);?>"><i class="feather icon-circle"></i><span class="menu-item" ><?php echo $row_s->title;?></span></a>

<?php                               $data_sub2 = $this->db->query("SELECT * FROM menu WHERE is_active='1' and parent=$row_s->id and id in ($pre) order by sort_by");
                                    if($data_sub2->num_rows()>0){;?>
                                    <ul class="menu-content">
<?php                                   foreach($data_sub2->result() as $row_s2){ ;?>
                                        <li><a href="<?php echo site_url($row_s2->url);?>"><i class="feather icon-circle"></i><span class="menu-item" ><?php echo $row_s2->title;?></span></a>
                                        </li>
<?php                                   };?>
                                    </ul>
<?php                               };?> 

                                </li>
<?php                       };?>
                        </ul>
<?php                   } ;?>   
                        
                    </li>
<?php           };?>

            </ul>
        </div>
    </div> 



    
