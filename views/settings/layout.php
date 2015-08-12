<?php
/** @var Amoforms\Views\Interfaces\Base $this */
defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');
?>
<link rel="stylesheet" href="<?= AMOFORMS_CSS_URL . '/v1/settings.css' ?>">

<div class="wrap amoforms_settings_page">
	<?php
	$this->render($this->get('path'));
	?>
</div>
