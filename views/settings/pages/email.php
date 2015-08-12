<?php
/** @var Amoforms\Views\Interfaces\Base $this */
defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/** @var \Amoforms\Models\Forms\Form $form */
$form = $this->get('form');
$settings = $form->get_settings();
?>
<div class="amoforms_email_settings">
	<h2>Email settings</h2>

	<form action="?page=amoforms-settings-edit_email" method="post">
		<?php settings_fields($this->get('nonce_field')); ?>
		<input type="hidden" name="form[id]" value="<?= $form->id() ?>">

		<table>
			<tr>
				<th><label>Your Name</label></th>
				<td>
					<!--TODO: set current user name-->
					<input type="text" name="form[settings][email][name]" value="<?= $settings['email']['name'] ?>" title="Your Name" placeholder="John">
				</td>
			</tr>
			<tr>
				<th><label>Email Subject</label></th>
				<td>
					<input type="text" name="form[settings][email][subject]" value="<?= $settings['email']['subject'] ?>" title="Email Subject" placeholder="Call Back Request">
				</td>
			</tr>
			<tr>
				<th><label>Email To</label></th>
				<td>
					<!--TODO: set current user email-->
					<input type="email" name="form[settings][email][to]" value="<?= $settings['email']['to'] ?>" title="Email To" placeholder="john@gmail.com">
				</td>
			</tr>
		</table>

		<input type="hidden" name="action" value="update_email">
		<input type="submit" value="Save">
	</form>
</div>
