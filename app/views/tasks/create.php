<h1>Add a List</h1>
<small>Please fill out the form below to create a new list.</small>

<?= form_open('lists/create'); ?>
	<div class="form-group">
		<?= form_label('Name:') ?>
		<?= form_input(['name' => 'name', 'placeholder' => 'Enter Your List Name', 'class' => 'form-control', 'value' => set_value('name'), 'autofocus' => 'autofocus']) ?>
		<?= form_error('name', '<span class="help-block">', '</span>'); ?>
	</div>
	<div class="form-group">
		<?= form_label('Body:') ?>
		<?= form_textarea(['name' => 'body', 'placeholder' => 'Enter Your List Body', 'class' => 'form-control', 'value' => set_value('body')]) ?>
	</div>
	<div class="form-group">
	  <?= form_button(['type' => 'submit', 'content' => 'Submit', 'class' => 'btn btn-primary']) ?>
	</div>
<?= form_close(); ?>
