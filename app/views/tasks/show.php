<ul id="actions">
	<h4>Task Actions</h4>
	<li><a href="<?= base_url(); ?>tasks/add/<?= $task->id; ?>">Add Task</a></li>
	<li><a href="<?= base_url(); ?>tasks/edit/<?= $task->id; ?>">Edit Task</a></li>
	<?php if ($is_complete): ?>
		<li><a href="<?= base_url(); ?>tasks/mark_new/<?= $task->id; ?>">Mark New</a></li>
	<?php else: ?>
		<li><a href="<?= base_url(); ?>tasks/mark_complete/<?= $task->id; ?>">Mark Complete</a></li>
	<?php endif; ?>
	<li><a onclick="return confirm('Are you sure?')" href="<?= base_url(); ?>tasks/delete/<?= $task->list_id; ?>/<?= $task->id ?>">Delete Task</a></li>
</ul>

<h1><?= $task->name ?></h1>
<ul id="info">
	<li>Create on: <strong><?= date('d-m-Y', strtotime($task->created_at)) ?></strong></li>
	<?php if ($task->is_completed == 0): ?>
		<li>Status: <strong>Uncomplete</strong></li>
	<?php else: ?>
		<li>Status: <strong>Complete</strong></li>
	<?php endif; ?>
	<li>Due date: <strong><?= date('d-m-Y', strtotime($task->due_date)) ?></strong></li>
</ul>

<br><br>
<div style="max-width: 500px;">
	<?= $task->body ?>
</div>
<br><hr>
