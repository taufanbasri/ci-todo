<h1>Add a Task</h1>
<span>List: <strong><?php echo $list->name ?></strong></span>

<br><br>
<?= form_open('tasks/add/' .$this->uri->segment(3)); ?>
	<div class="form-group">
		<?= form_label('Name:') ?>
		<?= form_input(['name' => 'name', 'placeholder' => 'Enter Your Task Name', 'class' => 'form-control', 'value' => set_value('name'), 'autofocus' => 'autofocus']) ?>
		<?= form_error('name', '<span class="help-block">', '</span>'); ?>
	</div>
	<div class="form-group">
		<?= form_label('Body:') ?>
		<?= form_textarea(['name' => 'body', 'placeholder' => 'Enter Your Task Body', 'class' => 'form-control', 'value' => set_value('body')]) ?>
	</div>
	<div class="form-group">
		<?= form_label('Due Date:') ?>
		<?= form_input(['type' => 'date', 'name' => 'due_date', 'class' => 'form-control', 'value' => set_value('due_date')]) ?>
	</div>
	<div class="form-group">
	  <?= form_button(['type' => 'submit', 'content' => 'Submit', 'class' => 'btn btn-primary']) ?>
	</div>
<?= form_close(); ?>
