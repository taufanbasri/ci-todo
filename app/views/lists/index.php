<h1>Lists</h1>
<p>These are your current list</p>

<ul class="list-items">
	<?php foreach ($lists as $list): ?>
		<li>
			<div class="list-name">
				<?php echo $list->name ?>
			</div>
			<div class="list-body">
				<?php echo $list->body ?>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
