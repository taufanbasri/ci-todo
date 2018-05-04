<?php if ($this->session->userdata('logged_in')): ?>
	<p>You are loggin as <strong class="text-primary"><?= ucfirst($this->session->userdata('username')); ?></strong></p>

	<?= form_open('users/logout', ['id' => 'logout_form', 'class' => 'form-horizontal']); ?>
	  <?= form_button(['type' => 'submit', 'content' => 'Logout', 'class' => 'btn btn-primary btn-block']) ?>
	<?= form_close(); ?>
<?php else: ?>
	<h3 class="text-center">Login Form</h3>
	<?= form_open('users/login', ['id' => 'login_form', 'class' => 'form-horizontal']); ?>
		<div class="form-group">
			<?= form_label('Username:') ?>
	    	<?= form_input(['name' => 'username', 'placeholder' => 'Enter Username', 'class' => 'form-control', 'value' => set_value('username'), 'autofocus' => 'autofocus']) ?>
		</div>
		<div class="form-group">
			<?= form_label('Password:') ?>
	    	<?= form_password(['name' => 'password', 'class' => 'form-control', 'value' => set_value('password')]) ?>
		</div>
		<div class="form-group">
		  <?= form_button(['type' => 'submit', 'content' => 'Login', 'class' => 'btn btn-primary btn-block']) ?>
		</div>
	<?= form_close(); ?>
<?php endif; ?>
