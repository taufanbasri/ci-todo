<?php if ($this->session->flashdata('list_created')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('list_created') ?>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('list_updated')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('list_updated') ?>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('list_deleted')): ?>
	<div class="alert alert-danger">
		<?= $this->session->flashdata('list_deleted') ?>
	</div>
<?php endif; ?>

<a href="<?= base_url() ?>lists/create" class="pull-right">Create a New List</a>
<h1>Lists</h1>
<p>These are your current list</p>

<ul class="list-items">
	<?php foreach ($lists as $list): ?>
		<li>
			<div class="list-name">
				<a href="<?= base_url(); ?>lists/show/<?= $list->id ?>">
					<?php echo $list->name ?>
				</a>
			</div>
			<div class="list-body">
				<?php echo $list->body ?>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
