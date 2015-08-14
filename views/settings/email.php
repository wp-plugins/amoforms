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

<div class="amoforms">
	<div class="amoforms__top-nav">
		<div class="amoforms__top-nav__item">Edit Fields</div>
		<div class="amoforms__top-nav__item">Form Settings</div>
		<div class="amoforms__top-nav__item active">Email Settings</div>
		<div class="amoforms__top-nav__item">Form Preview</div>
	</div>
	<div class="wrap amoforms_form-setting_page amoforms_email-setting_page">
		<h2>Notification</h2>
		<p class="amoforms_form-setting_desc">
			Receive an email of the submitted data when someone completes the form.
		</p>
		<div class="amoforms__section_top">
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Your Name</span>
				<input type="text" class="amoforms__form-setting__text-input" placeholder="John"><br />
				<span class="amoforms__form-setting__row__inner__descr">This option sets the "From" display name of the email that is sent.</span>
			</div>
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Email Subject</span>
				<input type="text" class="amoforms__form-setting__text-input" placeholder="Call Back Request"><br />
				<span class="amoforms__form-setting__row__inner__descr">This sets the subject of the email that is sent.</span>
			</div>
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Email To</span>
				<input type="email" class="amoforms__form-setting__text-input" placeholder="John@gmail.com"><br />
				<span class="amoforms__form-setting__row__inner__descr">Who to send the submitted data to.</span>
			</div>
		</div>
		<div class="amoforms__section_middle">
			<div class="amoforms__checkbox_wrapper">
				<input type="checkbox">If File uploads are present, include the uploaded files with the email.
				<p class="amoforms__section_middle__descr">
					NOTE: many severs restrict email attachment size to 25MB or even smaller. <br>
					if you experience trouble sendingor receiving emails with this setting on, reduce the File Upload max file size.
				</p>
			</div>
		</div>
		<h2>Autoresponder</h2>
		<p class="amoforms_form-setting_desc">
			Send an email to the person who completed the form.
		</p>
		<div class="amoforms__section_bottom">
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Your Name</span>
				<input type="text" class="amoforms__form-setting__text-input" placeholder="John"><br />
				<span class="amoforms__form-setting__row__inner__descr">This option sets the "From" display name of the email that is sent.</span>
			</div>
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Reply To Email</span>
				<input type="email" class="amoforms__form-setting__text-input" placeholder="John@gmail.com"><br />
				<span class="amoforms__form-setting__row__inner__descr">Replies to the submission email will go here.</span>
			</div>
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Email Subject</span>
				<input type="text" class="amoforms__form-setting__text-input" placeholder="Call Back Request"><br />
				<span class="amoforms__form-setting__row__inner__descr">This sets the subject of the email that is sent.</span>
			</div>
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Email To</span>
				<input type="email" class="amoforms__form-setting__text-input" placeholder="John@gmail.com"><br />
				<span class="amoforms__form-setting__row__inner__descr">Who to send the submitted data to.</span>
			</div>
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Message</span>
				<textarea class="amoforms__form-setting__textarea"></textarea>
			</div>
			<div class="amoforms__form-setting__row__inner">
				<span class="amoforms__form-setting__row__inner__name">Append Entry</span>
				<input type="email" class="amoforms__form-setting__text-input" placeholder=""><br />
				<span class="amoforms__form-setting__row__inner__descr">include a copy of the Users's Entry</span>
			</div>
			<div class="second_form_buttons">
				<span class="save_button">save</span>
				<span class="cancel_button">cancel</span>
			</div>
		</div>
	</div>
</div>
