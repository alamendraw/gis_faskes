     <!-- BEGIN Navigation-->
	 <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap/css/bootstrap.min.css">	
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow expanded">
    <div class="row" style="padding:10px;"> 
		<div class="col-md-12 form-group">
		<div class="col-md-12"> &nbsp; </div>
  
			<div class="form-group"> 
				<label for="kecamatan">Kecamatan</label> 
				<select class="form-control" id="kecamatan">				
					<option value=''></option>
					<option value='all'>Seluruh Kecamatan</option>
					<?php foreach($kecamatan as $row){;?>
					<option value='<?= $row['kecamatan'];?>'><?= $row['kecamatan'];?></option>
					<?php }?>
				</select> 
			</div>
			 
			<div class="col-md-12 komp" style="padding-bottom: 15px;"> 
				<div class="panel-body"> <span id="total_data"></span></div> 
				<input class="form-control" id="myInput" type="text" placeholder="Search..">  
			</div> 
			 
			
			<div>
				<div>   
					<ul class="list-group komp" >
						<li class='list-group-item'>  
							<div class='custom-control custom-checkbox' style="padding-left: 9px;padding-top: 5px;">
								<input type='checkbox' class='custom-control-input' name='checkAll' value='all' id='checkAll'>
								<label class='custom-control-label' for='checkAll'> &nbsp;Pilih Semua</label>
							</div>  
						</li>
					</ul> 
					<ul class="list-group komp" style="max-height: 300px; overflow:scroll; " id="myList"> </ul>  
				</div>  
			</div>
							
			</div> 
	</div>
    </div>
    <!-- END Navigation-->

 