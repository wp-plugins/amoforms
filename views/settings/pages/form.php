<?php
/** @var Amoforms\Views\Interfaces\Base $this */
defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/** @var \Amoforms\Models\Forms\Form $form */
$form = $this->get('form');
$settings = $form->get_settings();
?>
<div class="amoforms_form_settings">
	<h2>Form settings</h2>

	<form method="post" action="" novalidate="novalidate">
		<?php settings_fields($this->get('nonce_field')); ?>
		<input type="hidden" name="form[id]" value="<?= $form->id() ?>">
		<input type="hidden" name="action" value="update_form">

		<table>
			<tr>
				<th>Form name</th>
				<td>
					<input type="text" title="Form name" name="form[settings][name]" value="<?= $settings['name'] ?>">
				</td>
			</tr>

			<?php /* FIXME: temporary disabled;
			<tr>
				<th><label>Form title</label></th>
				<td>
					<input type="text" name="form[settings][title][value]" value="<?= $settings['title']['value'] ?>" title="Form title">
				</td>
			</tr>

			<tr>
				<th><label>Form title type</label></th>
				<td>
					<?php foreach ($this->get('title_types') as $type) { ?>
						<label>
							<input type="radio" name="form[settings][title][type]" value="<?= $type['value'] ?>"
								   title="<?= $type['title'] ?>" <?= $type['selected'] ? 'checked' : '' ?>
								>
							<?= $type['title'] ?>
						</label>
					<?php } ?>
				</td>
			</tr>

			<tr>
				<th>Form status</th>
				<td>
					<?php foreach ($this->get('statuses_types') as $type) { ?>
						<label>
							<input type="radio" name="form[settings][status]" value="<?= $type['value'] ?>"
								   title="<?= $type['title'] ?>" <?= $type['selected'] ? 'checked' : '' ?>
								>
							<?= $type['title'] ?>
						</label>
					<?php } ?>
				</td>
			</tr>
 		*/
			?>

		</table>

		<?php /* FIXME: temporary disabled
		<h2>Page Break options</h2>
		<table>
			<tr>
				<th><label>Hides the Page Break titles</label></th>
				<td>
					<input type="checkbox" name="form[settings][page][hide_titles]" value="1" <?= $settings['page']['hide_titles'] ? 'checked="checked"' : '' ?> title="Hides the Page Break titles">
				</td>
			</tr>
			<tr>
				<th><label>Hides the page Break numbers</label></th>
				<td>
					<input type="checkbox" name="form[settings][page][hide_numbers]" value="1" <?= $settings['page']['hide_numbers'] ? 'checked="checked"' : '' ?> title="Hides the Page Break numbers">
				</td>
			</tr>
		</table>

		<h2>Confirmation</h2>
		<table>
			<?php foreach($form->get_confirmation_types() as $type) { ?>
				<tr>
					<th><label><?= $type ?></label></th>
					<td>
						<input type="radio" name="form[settings][confirmation][type]" value="<?= $type ?>" <?= $settings['confirmation']['type'] === $type ? 'checked="checked"' : '' ?> title="text">
					</td>
				</tr>
			<?php } ?>
			<tr>
				<th><label>Text</label></th>
				<td>
					<?php
					$editor_settings = [
						'wpautop'       => 1,
						'textarea_name' => 'form[settings][confirmation][value]',
						'dfw'           => TRUE,
						'quicktags'     => FALSE,
						'media_buttons' => FALSE,
						'textarea_rows' => 10,
					];
					wp_editor($settings['confirmation']['value'],'truewpeditor',$editor_settings)  ?>

				</td>
			</tr>
			<tr>
				<td>
					<select name="form[settings][confirmation][value]" title="Pages">
						<?php
						foreach (get_all_page_ids() as $page_id) {
							echo '<option value="' . get_permalink($page_id) . '">' . get_the_title($page_id) . "</option>";
						} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="form[settings][confirmation][value]" placeholder="http://" value="<?= $settings['confirmation']['value'] ?>" title="text area">
				</td>
			</tr>

		</table>
		*/?>

		<div class="amoforms_save_form_block">
			<input type="submit" value="Save">
		</div>

	</form>
</div>

