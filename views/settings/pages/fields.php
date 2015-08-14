<?php
/** @var Amoforms\Views\Interfaces\Base $this */
use Amoforms\Models\Fields\Types\Base_Field;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/** @var \Amoforms\Models\Forms\Form $form */
$form = $this->get('form');
$fields = $form->get_fields();
?>
<div class="amoforms_fields_settings">
	<h2>Form Fields</h2>

	<form method="post" action="" novalidate="novalidate"
		  class="amoforms_fields_form
		  <?= $form->id() ? 'amoforms_fields_form_saved' : 'amoforms_fields_form_not_saved' ?>
		  <?= (count($fields) <= 1) ? 'amoforms_no_delete_fields' : '' ?>
		  "
		>
		<?php settings_fields($this->get('nonce_field')); ?>
		<input type="hidden" name="form[id]" value="<?= $form->id() ?>">
		<input type="hidden" name="action" value="update_fields">

		<?php foreach ($fields as $field_id => $field) { ?>

		<div class="amoforms_field_wrapper">

			<div class="amoforms_field">

				<input type="hidden" name="form[fields][<?= $field_id ?>][type]" value="<?= $field['type'] ?>">

				<div><b><?= $field['name'] ?></b></div>

				<div>Field name</div>
				<div>
					<input type="text"
						   name="form[fields][<?= $field_id ?>][name]"
						   title="Field name"
						   value="<?= $field['name'] ?>"
						>
				</div>

				<div>Placeholder</div>
				<div>
					<input type="text"
						   name="form[fields][<?= $field_id ?>][placeholder]"
						   title="Placeholder"
						   value="<?= $field['placeholder'] ?>"
						>
				</div>

				<div>Description</div>
				<div>
					<input type="text"
						   name="form[fields][<?= $field_id ?>][description]"
						   title="Description"
						   value="<?= $field['description'] ?>"
						>
				</div>

				<?php /* temporary disabled
				<div>Description position</div>
				<div>
					<label>
						<input type="radio"
							   name="form[fields][<?= $field_id ?>][description_position]"
							   title="Description position"
							   value="<?= Base_Field::DESCRIPTION_POS_AFTER ?>"
							<?= $field['description_position'] === Base_Field::DESCRIPTION_POS_AFTER ? 'checked' : '' ?>
							>
						After
					</label>
					<label>
						<input type="radio"
							   name="form[fields][<?= $field_id ?>][description_position]"
							   title="Description position"
							   value="<?= Base_Field::DESCRIPTION_POS_BEFORE ?>"
							<?= $field['description_position'] === Base_Field::DESCRIPTION_POS_BEFORE ? 'checked' : '' ?>
							>
						Before
					</label>
				</div>
				*/?>

				<div>Default value</div>
				<div>
					<input type="text"
						   name="form[fields][<?= $field_id ?>][default_value]"
						   title="Default value"
						   value="<?= $field['default_value'] ?>"
						>
				</div>

				<div>Required</div>
				<div>
					<label>
						<input type="radio"
							   name="form[fields][<?= $field_id ?>][required]"
							   title="Required"
							   value="1"
							<?= $field['required'] ? 'checked' : '' ?>
							>
						Yes
					</label>
					<label>
						<input type="radio"
							   name="form[fields][<?= $field_id ?>][required]"
							   title="Required"
							   value="0"
							<?= !$field['required'] ? 'checked' : '' ?>
							>
						No
					</label>
				</div>

				<div class="amoforms_field_delete_button <?= !$form->id() ? 'hidden' : '' ?>">
					<a class="amoforms_field_delete_button_link" href="?page=amoforms&action=delete_field&form[id]=<?= $form->id() ?>&field[id]=<?= $field_id ?>">Delete field</a>
				</div>
			</div>
		</div>
		<?php
		}
		?>

		<div class="amoforms_save_form_block">
			<input type="submit" value="Save">
		</div>
	</form>


	<!-- Adding fields -->
	<?php if (!$form->id()) { ?>
		<h3>Save form for adding new fields</h3>
	<?php } else { ?>
		<form action="" method="post">
			<?php settings_fields($this->get('nonce_field')); ?>
			<h3>Add field</h3>
			<select name="field[type]" title="Fields selector">
				<?php
				foreach ($this->get('fields_types') as $type) { ?>
					<option value="<?= $type['value'] ?>" <?= ($type['selected'] ? 'selected' : '') ?>>
						<?= ucfirst($type['title']) ?>
					</option>
				<?php } ?>
			</select>
			<input type="hidden" name="form[id]" value="<?= $form->id() ?>">
			<input type="hidden" name="action" value="add_field">
			<input type="submit" value="Add">
		</form>
	<?php } ?>


	<!-- Form shortcode -->
	<?php if ($form->id()) { ?>
		<div class="amoforms_shortcode_block">
			<h2>Form shortcode</h2>
			<b>[amoforms id="<?= $form->id() ?>"]</b>
		</div>
	<?php } ?>
</div>
