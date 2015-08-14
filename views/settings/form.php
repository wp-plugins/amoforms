<?php
/** @var Amoforms\Views\Interfaces\Base $this */
defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/** @var \Amoforms\Models\Forms\Form $form */
$form = $this->get('form');
$settings = $this->get('settings');
$fields = $this->get('fields');
?>
<link rel="stylesheet" href="<?= AMOFORMS_CSS_URL . '/app.css' ?>">
<link rel="stylesheet" href="<?= AMOFORMS_CSS_URL . '/form_settings.css' ?>">

<script>
	(function($) {
		$(document).ready(function() {
			$('.amoforms__form-setting__check').change(function() {
				var el = $(this);
				var val = el.val();
				var parent = document.getElementById('amoforms__text');
				var child;
				switch (val) {
					case 'textarea' :
						child = document.getElementById('textarea-template').innerText;
						break;
					case 'select' :
						child = document.getElementById('select-template').innerText;
						break;
					case 'input-text' :
						child = document.getElementById('input-template').innerText;
						break; 
				}
				console.log(child);
				$(parent).html(child);
			});
		});
	})(jQuery);
</script>
<script type="text/template" id="textarea-template">
	<textarea style="border: 1px solid #ccc;">

	</textarea>
</script>
<script type="text/template" id="select-template">
	<select style="border: 1px solid #ccc;">	
		<option>Пункт 2</option>	
		<option>Пункт 3</option>	
		<option>Пункт 4</option>	
	</select>
</script>
<script type="text/template" id="input-template">
	<input type="text" style="border: 1px solid #ccc;">
</script>
<div class="amoforms">
	<div class="amoforms__top-nav">
		<div class="amoforms__top-nav__item">Edit Fields</div>
		<div class="amoforms__top-nav__item active">Form Settings</div>
		<div class="amoforms__top-nav__item">Email Settings</div>
		<div class="amoforms__top-nav__item">Form Preview</div>
	</div>
	<div class="wrap amoforms_form-setting_page">
		<h2>General Form Settings</h2>
		<div class="amoforms__section_top">
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Form Name</span>
				<input type="text" class="amoforms__form-setting__text-input" placeholder="Call Back Request"><br />
				<span class="amoforms__form-setting__row__inner__descr">This name is used for admin purposes</span>
			</div>
			<div class="amoforms__form-setting__row__inner">
				<div class="amoforms__radio_wrapper">
					<span class="amoforms__form-setting__row__inner__name">Form Status</span>
					<input name="form_status" type="radio" checked>Published</input>
					<input name="form_status" type="radio">Draft</input>
				</div>
				<span class="amoforms__form-setting__row__inner__descr">Change the status from Published to Draft to prevent form output without removing the shortcode.</span>
			</div>
		</div>
		<div class="amoforms__section_middle">
			<h2>Page Break Options</h2>
			<div class="amoforms__checkbox_wrapper">
				<input type="checkbox">Hides the Page Break titles <br>
				<input type="checkbox">Hides the Page Break numbers
			</div>
		</div>
		<div class="amoforms__section_bottom">
			<h2>Confirmation</h2>
			<span class="amoforms__form-setting__row__inner__descr">
				After someone submits a form, you can control what is displayed.
			</span><br>
			<span class="amoforms__form-setting__row__inner__descr">
				By default, it is a message but you can send them to another WordPress Page or a custom URL.
			</span><br>
			<div class="amoforms__radio_wrapper">
				<span class="amoforms__form-setting__row__inner__name">Type</span>
				<input class="amoforms__form-setting__check" name="type" type="radio" value="textarea" checked>Text
				<input class="amoforms__form-setting__check" name="type" type="radio" value="select">WordPressPage
				<input class="amoforms__form-setting__check" name="type" type="radio" value="input-text">Redirect
			</div>
			<div class="amoforms__text_editor" id="amoforms__text">
				<textarea name="" id="" cols="30" rows="10" class="" style="border: 1px solid #000;"></textarea>
			</div>
		</div>
	</div>
</div>
