<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Form successfully submitted</title>
</head>
<body>

<h1>Form successfully submitted!</h1>

<div>
	<a href="<?= !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'javascript:history.back()' ?>">Go back</a>
</div>

<script>
	setTimeout(function () {
		<?php if (!empty($_SERVER['HTTP_REFERER'])) { ?>
		window.location = "<?= $_SERVER['HTTP_REFERER'] ?>";
		<?php } else { ?>
		history.back();
		<?php } ?>
	}, 2000);
</script>

</body>
</html>

