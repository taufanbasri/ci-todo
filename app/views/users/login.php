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
