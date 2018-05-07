<ul id="actions">
	<li><a href="<?= base_url(); ?>tasks/add/<?= $list->id; ?>">Add Task</a></li>
	<li><a href="<?= base_url(); ?>lists/edit/<?= $list->id; ?>">Edit List</a></li>
	<li><a onclick="return confirm('Are you sure?')" href="<?= base_url(); ?>lists/delete/<?= $list->id; ?>">Delete List</a></li>
</ul>

<h1><?= $list->name ?></h1>

<?php if ($this->session->flashdata('task_created')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('task_created') ?>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('task_updated')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('task_updated') ?>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('task_deleted')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('task_deleted') ?>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('marked_complete')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('marked_complete') ?>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('marked_new')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('marked_new') ?>
	</div>
<?php endif; ?>

Create on: <strong><?= date('d-m-Y', strtotime($list->created_at)) ?></strong>
<br><br>
<div style="max-width: 500px;">
	<?= $list->body ?>
</div>
<br><br>

<?php if ($completed_task): ?>
	<ul>
		<?php foreach ($completed_task as $task): ?>
			<li>
				<a href="<?php echo base_url(); ?>tasks/show/<?php echo $task->id; ?>"><?php echo $task->name; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>There are no current task.</p>
<?php endif; ?>
