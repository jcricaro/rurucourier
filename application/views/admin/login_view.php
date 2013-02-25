
<div class="row">
	<div class="span12">
		<div class="login">
		<?php echo form_open('login'); ?>
		<h3>Admin Login</h3>
		<hr />
		<table align="center">

			<tr>
				<td>
    			<?php echo form_input('user_name',set_value('user_name'), 'id="user_name" placeholder="Username" class="input-medium" tabindex="1"'); ?>
				</td>
				<td rowspan="2">
					<?php echo form_submit('submit', 'Login', 'class="btn btn-primary btnlogin" tabindex="3"'); ?>
				</td>
			</tr>
			<tr>
				<td>
	    <?php echo form_password('password','', 'id="password" placeholder="Password" class="input-medium" tabindex="2"'); ?>
	    		</td>
	    	</tr>
		</table>
    	<hr/>
    	<?php if($message): ?>
    	<small><span class="text-error help-inline"><?php echo $message; ?></span></small>
    	<?php endif; ?>
    	<small><span class="text-error help-inline"><?php echo validation_errors(); ?></span></small>    
		<?php echo form_close(); ?>

		</div>
	</div>
</div>

