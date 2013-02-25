<div class="row">
<div class="span3">
	
	<?php
	if($module =='employee') {
	echo '
	<a href="'.base_url().'admin/filemanager/matrix"class="btn btn-block">Rate Matrix</a>
	<a href="'.base_url().'admin/filemanager/employee"class="btn btn-block btn-primary">Employee</a>
	<a href="'.base_url().'admin/filemanager/client" class="btn btn-block">Client</a>
	<a href="'.base_url().'admin/filemanager/content" class="btn btn-block">Content</a>
	
	';
	}
	/*else if($module =='area') {
	echo '
	
	<a href="'.base_url().'admin/filemanager/area"class="btn  btn-primary btn-block">Area of delivery</a>
	<a href="'.base_url().'admin/filemanager/matrix"class="btn btn-block">Rate Matrix</a>
	<a href="'.base_url().'admin/filemanager/employee" class="btn btn-block">Employee</a>
	<a href="'.base_url().'admin/filemanager/client" class="btn btn-block">Client</a>
	
	';
	}
	*/
	else if($module=='matrix') {
	echo '
	<a href="'.base_url().'admin/filemanager/matrix"class="btn  btn-primary btn-block">Rate Matrix</a>
	<a href="'.base_url().'admin/filemanager/employee" class="btn btn-block">Employee</a>
	<a href="'.base_url().'admin/filemanager/client" class="btn btn-block">Client</a>
	<a href="'.base_url().'admin/filemanager/content" class="btn btn-block">Content</a>
	
	';
	}
	else if($module=='client') {
	echo '
	<a href="'.base_url().'admin/filemanager/matrix"class="btn btn-block">Rate Matrix</a>
	<a href="'.base_url().'admin/filemanager/employee" class="btn btn-block">Employee</a>
	<a href="'.base_url().'admin/filemanager/client" class="btn btn-block btn-primary">Client</a>
	<a href="'.base_url().'admin/filemanager/content" class="btn btn-block">Content</a>
	
	';		
	}
	else if($module=='content') {
	echo '
	<a href="'.base_url().'admin/filemanager/matrix"class="btn btn-block">Rate Matrix</a>
	<a href="'.base_url().'admin/filemanager/employee" class="btn btn-block">Employee</a>
	<a href="'.base_url().'admin/filemanager/client" class="btn btn-block">Client</a>
	<a href="'.base_url().'admin/filemanager/content" class="btn btn-block btn-primary">Content</a>
	
	';	
	}
	else {
	echo '
	
	
	<a href="'.base_url().'admin/filemanager/matrix"class="btn btn-block">Rate Matrix</a>
	<a href="'.base_url().'admin/filemanager/employee" class="btn btn-block">Employee</a>
	<a href="'.base_url().'admin/filemanager/client" class="btn btn-block">Client</a>
	<a href="'.base_url().'admin/filemanager/content" class="btn btn-block">Content</a>
	
	';				
	}
	?>

</div>