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
<br>

<h3>My Latest Lists</h3>
<table class="table table-striped">
	<thead>
		<tr>
			<th>List Name</th>
			<th>Created On</th>
			<th>View</th>
		</tr>
	</thead>
	<tbody>
		<?php if (isset($lists)): ?>
			<?php foreach ($lists as $list): ?>
				<tr>
					<td><?= $list->name ?></td>
					<td><?= $list->created_at ?></td>
					<td>
						<a href="<?= base_url(); ?>lists/show/<?= $list->id ?>">View List</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>
