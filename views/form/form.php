<?php
/** @var Amoforms\Views\Interfaces\Base $this */
defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

use Amoforms\Libs\Locale\I18n;

/** @var \Amoforms\Models\Forms\Form $form */
$form = $this->get('form');
$result = $this->get('result');
?>
<link rel="stylesheet" href="<?= AMOFORMS_CSS_URL . '/v1/form.css' ?>">

<div class="amoforms_form_wrapper">
	<h2><?= $form->get('name') ?></h2>

	<?php if ($result) { ?>
		<b><?= $result ?></b>
	<?php } ?>

	<form action="<?= $this->get('submit_url') ?>" method="post">
		<input type="hidden" name="form[id]" value="<?= $form->id() ?>">
		<input type="hidden" name="action" value="submit_amoform">
		<?php // TODO: add form hash
		foreach ($form->get_fields() as $id => $field) { ?>
			<div class="amoforms_field amoforms_field_preview">
				<div class="amoforms_field_name_wrapper">
					<b class="amoforms_field_title"><?= $field['name'] ?></b>
				</div>
				<div class="amoforms_field_input_wrapper">
					<input
						type="text" <?php //TODO: set type based on field type ?>
						name="fields[<?= $id ?>]"
						value="<?= $field['default_value'] ?>"
						placeholder="<?= $field['placeholder'] ?>"
						<?= $field['required'] ? 'required="required"' : '' ?>"
						>
				</div>
				<div class="amoforms_field_description_wrapper">
					<?= $field['description'] ?>
				</div>
			</div>
			<?php
		} ?>
		<div class="amoforms_submit_button">
			<input type="submit" value="<?= I18n::get('Submit') ?>">
		</div>
	</form>
</div>
