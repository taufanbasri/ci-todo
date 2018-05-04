<h1>Edit List</h1>

<?= form_open('lists/edit/' . $list->id); ?>
	<div class="form-group">
		<?= form_label('Name:') ?>
		<?= form_input(['name' => 'name', 'placeholder' => 'Enter Your List Name', 'class' => 'form-control', 'value' => $list->name, 'autofocus' => 'autofocus']) ?>
		<?= form_error('name', '<span class="help-block">', '</span>'); ?>
	</div>
	<div class="form-group">
		<?= form_label('Body:') ?>
		<?= form_textarea(['name' => 'body', 'placeholder' => 'Enter Your List Body', 'class' => 'form-control', 'value' => $list->body]) ?>
	</div>
	<div class="form-group">
	  <?= form_button(['type' => 'submit', 'content' => 'Submit', 'class' => 'btn btn-primary']) ?>
	</div>
<?= form_close(); ?>
