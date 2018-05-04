<ul id="actions">
	<li><a href="<?= base_url(); ?>tasks/add/<?= $list->id; ?>">Add Task</a></li>
	<li><a href="<?= base_url(); ?>lists/<?= $list->id; ?>/edit">Edit List</a></li>
	<li><a onclick="return confirm('Are you sure?')" href="<?= base_url(); ?>lists/<?= $list->id; ?>/delete">Delete List</a></li>
</ul>

<h1><?= $list->name ?></h1>
Create on: <strong><?= date('d-m-Y', strtotime($list->created_at)) ?></strong>
<br><br>
<div style="max-width: 500px;">
	<?= $list->body ?>
</div>
