<?php
/** @var Amoforms\Views\Interfaces\Base $this */
defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');
$data = $this->get('data');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?= $data['form']['name'] ?></title>
</head>
<body>
<div class="email-body-wrapper">
	<h1><?= $data['form']['name'] ?></h1>
	<div class="fields-container">
		<?php
		foreach ($data['fields'] as $field) { ?>
			<div class="field-wrapper" style="margin-top: 20px">
				<div class="field-name">
					<b><?= $field['name'] ?></b>
				</div>
				<div class="field-value">
					<?= $field['value'] ?>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</div>
</body>
</html>