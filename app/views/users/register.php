<h1>Register</h1>
<small>Please fill out the form below to create an account.</small>

<?= form_open('users/register'); ?>
	<div class="form-group">
		<?= form_label('First Name:') ?>
		<?= form_input(['name' => 'firstname', 'placeholder' => 'Enter Your First Name', 'class' => 'form-control', 'value' => set_value('firstname'), 'autofocus' => 'autofocus']) ?>
		<?= form_error('firstname', '<span class="help-block">', '</span>'); ?>
	</div>
	<div class="form-group">
		<?= form_label('Last Name:') ?>
		<?= form_input(['name' => 'lastname', 'placeholder' => 'Enter Your Last Name', 'class' => 'form-control', 'value' => set_value('lastname')]) ?>
		<?= form_error('lastname', '<span class="help-block">', '</span>'); ?>
	</div>
	<div class="form-group">
		<?= form_label('Email Address:') ?>
		<?= form_input(['type' => 'email', 'name' => 'email', 'placeholder' => 'Enter Your Email', 'class' => 'form-control', 'value' => set_value('email')]) ?>
		<?= form_error('email', '<span class="help-block">', '</span>'); ?>
	</div>
	<div class="form-group">
		<?= form_label('Username:') ?>
		<?= form_input(['name' => 'username', 'placeholder' => 'Enter Your Username', 'class' => 'form-control', 'value' => set_value('username')]) ?>
		<?= form_error('username', '<span class="help-block">', '</span>'); ?>
	</div>
	<div class="form-group">
		<?= form_label('Password:') ?>
		<?= form_password(['name' => 'password', 'class' => 'form-control', 'value' => set_value('password')]) ?>
		<?= form_error('password', '<span class="help-block">', '</span>'); ?>
	</div>
	<div class="form-group">
		<?= form_label('Password Confirmation:') ?>
		<?= form_password(['name' => 'password_confirmation', 'class' => 'form-control', 'value' => set_value('password_confirmation')]) ?>
		<?= form_error('password_confirmation', '<span class="help-block">', '</span>'); ?>
	</div>
	<div class="form-group">
	  <?= form_button(['type' => 'submit', 'content' => 'Register', 'class' => 'btn btn-primary btn-block']) ?>
	</div>
<?= form_close(); ?>
