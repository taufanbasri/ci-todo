<?php if ($this->session->flashdata('registered')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('registered') ?>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('login_success')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('login_success') ?>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('logged_out')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('logged_out') ?>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('noaccess')): ?>
	<div class="alert alert-danger">
		<?= $this->session->flashdata('noaccess') ?>
	</div>
<?php endif; ?>

<h1>Welcome in To-Do App</h1>
<p class="lead">Simple task manager app.</p>
