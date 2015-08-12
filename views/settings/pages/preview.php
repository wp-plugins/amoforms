<?php
/** @var Amoforms\Views\Interfaces\Base $this */
defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');
?>
<div class="amoforms_form_preview_block">
	<h2>Form preview</h2>

	<div class="amoforms_form_preview_form_wrapper">
		<?php $this->render('form/form') ?>
	</div>
</div>
