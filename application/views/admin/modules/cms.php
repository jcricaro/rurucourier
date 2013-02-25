<div class="span9">
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#home">Home</a></li>
  <li><a href="#services">Services</a></li>
  <li><a href="#about">About Us</a></li>
  <li><a href="#contact">Contact Us</a></li>
</ul>
 




	<?php echo form_open('admin/filemanager/content'); ?>
	<div class="tab-content">
		<div class="tab-pane active" id="home">
		<?php
			$data = array(
				'name' => 'home',
				'id' => 'markItUp',
				'class' => 'span8',
				'value' => $content->home
				);
			echo form_textarea($data); ?>
		</div>

		<div class="tab-pane" id="about">
			<?php
			$data = array(
				'name' => 'about',
				'id' => 'markItUp1',
				'class' => 'span8',
				'value' => $content->about
				);
			
			echo form_textarea($data);
			?>
		</div>
		<div class="tab-pane" id="contact">
			<?php

			$data = array(
				'name' => 'contact',
				'id' => 'markItUp2',
				'class' => 'span8',
				'value' => $content->contact
				);
			
			echo form_textarea($data);
		?>
		</div>
		<div class="tab-pane" id="services">
		<?php $data = array(
				'name' => 'services',
				'id' => 'markItUp3',
				'class' => 'span8',
				'value' => $content->services
				);
			
			echo form_textarea($data);
			?>
		</div>
		<?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?>

	<?php echo form_close(); ?>

</div></div>