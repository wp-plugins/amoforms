<?php defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');
/** @var Amoforms\Views\Interfaces\Base $this */
?>
<link rel="stylesheet" href="<?= AMOFORMS_CSS_URL . '/edit_form.css' ?>">

<div class="wrap amoforms_settings_page">
	<!--<h2>amoForms settings</h2>-->

	<form method="post" action="" novalidate="novalidate">
		<?php settings_fields($this->get('nonce_field')); ?>

		<!-- TODO: fill form id -->
		<input type="hidden" name="form_id" value="1">

		<div class="top_nav">
			<div class="active">Edit Fields</div>
			<div>Form Settings</div>
			<div>Email Settings</div>
			<div>Form Preview</div>
		</div>
		<div class="main_wrapper">
			<div class="main_content">
				<div class="settings">
					<div class="design_themes">
						<span></span>
						<p>Design themes</p>
					</div>
					<div class="name_position">
						<span><p>Text</p><div></div></span>
						<p>Name Position</p>
					</div>
					<div class="field_form">
						<span></span>
						<p>Field Form</p>
					</div>
					<div class="field_size">
						<span></span>
						<p>Field Size</p>
					</div>
					<div class="font">
						<span></span>
						<p>Font</p>
					</div>
					<div class="form_background">
						<span></span>
						<p>Form background</p>
					</div>
				</div>
				<!--  <div>
                    <table class="form-table">
                        <tbody>
                        <tr>
                            <th>Form title</th>
                            <td><input type="text" name="settings[form_title]" value="My Form"></td>
                        </tr>
                        <tr>
                            <th>Form active</th>
                            <td><input type="checkbox" name="settings[active]" value="on" checked></td>
                        </tr>
                    </table>
                </div>
               <div>
                    <table class="form-table">
                        <thead>
                        <tr>
                            <td>Type</td>
                            <td>Active</td>
                            <td>Required</td>
                            <td>Name</td>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th>
                                Textbox
                                <input type="hidden" name="settings[fields][0][type]" value="text">
                            </th>
                            <td><input type="checkbox" name="settings[fields][0][active]" value="on" checked></td>
                            <td><input type="checkbox" name="settings[fields][0][required]"></td>
                            <td><input type="text" name="settings[fields][0][name]" value="Text box"></td>
                        </tr>

                        <tr>
                            <th>
                                Textarea
                                <input type="hidden" name="settings[fields][1][type]" value="textarea">
                            </th>
                            <td><input type="checkbox" name="settings[fields][1][active]" value="on" checked></td>
                            <td><input type="checkbox" name="settings[fields][1][required]" value="on" checked></td>
                            <td><input type="text" name="settings[fields][1][name]" value="Text Area"></td>
                        </tr>

                        <tr>
                            <th>
                                Checkbox
                                <input type="hidden" name="settings[fields][2][type]" value="checkbox">
                            </th>
                            <td><input type="checkbox" name="settings[fields][2][active]" value="on" checked></td>
                            <td><input type="checkbox" name="settings[fields][2][required]"></td>
                            <td><input type="text" name="settings[fields][2][name]" value="Check Box"></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="amoforms_save_form_block">
                    <input type="submit" value="<?php /*_e('Save Changes') */ ?>">
                </div>
             </form>
            </div>-->
				<div class="main_form">
					<div class="top_form">
						<div class="row">
							<div class="inner_row">
								<input type="text" class="text_input" placeholder="Call Back Request">
							</div>
							<div class="input_buttons">
								<span>Edit</span>
								<span>Dublicate</span>
								<span>Delete</span>
							</div>
						</div>
						<div class="row">
							<p>Name</p>

							<div class="inner_row">
								<input type="text" class="text_input" placeholder="John Galt">
								<div class="input_buttons">
									<span>Edit</span>
									<span>Dublicate</span>
									<span>Delete</span>
								</div>
							</div>
							<p>Description text</p>
						</div>
						<div class="row">
							<p>Phone</p>
							<input type="text" class="text_input" placeholder="+1 234 56 78">
						</div>
					</div>
					<div class="second_form">
						<p>Field name</p>
						<input type="text" class="text_input" placeholder="">
						<p>Description</p>
						<textarea name="" id="" cols="30" rows="10" placeholder="Enter your phone number"></textarea>
						<div class="second_form_left">
							<p>Default Value</p>
							<input type="text" class="text_input" placeholder="">
							<p>Description Position</p>
							<input type="radio" class="radio_input" placeholder="" checked><span>After input</span>
							<input type="radio" class="radio_input" placeholder=""><span>Before input</span>
							<p>Default Country</p>
							<div class="select_wrapper">
								<select name="" id="">
									<option value="">United States (US)</option>
									<option value="">Russian Federation (RU)</option>
									<option value="">Ukraine (UA)</option>
								</select>
							</div>
						</div>
						<div class="second_form_right">
							<p>Placeholder</p>
							<input type="text" class="text_input" placeholder="+123 456 78 90">
							<p>Required</p>
							<input type="radio" class="radio_input" placeholder="" checked><span>Yes</span>
							<input type="radio" class="radio_input" placeholder=""><span>No</span>
							<p>Number Type</p>
							<div class="select_wrapper">
								<select name="" id="">
									<option value="">Mobile</option>
									<option value="">Work</option>
									<option value="">Home</option>
								</select>
							</div>
						</div>
						<div class="second_form_buttons">
							<span class="save_button">save</span>
							<span class="cancel_button">cancel</span>
						</div>
					</div>
					<div class="bottom_form">
						<p>Email</p>
						<div class="row">
							<input type="text" placeholder="yourmail@mail.com">
							<div class="input_buttons">
								<span>Edit</span>
								<span>Dublicate</span>
								<span>Delete</span>
							</div>
						</div>
						<p>Message</p>
						<textarea name="" id="" cols="30" rows="10" placeholder="What do you think?"></textarea>
						<p>Subject</p>
						<div class="list_wrapper">
							<select name="" id="">
								<option value="" disabled selected>Choose one</option>
								<option value="">United States (US)</option>
								<option value="">Russian Federation (RU)</option>
								<option value="">Ukraine (UA)</option>
							</select>
						</div>
						<div class="bottom_form_buttons">
							<span>Submit</span>
							<span>Edit</span>
						</div>
					</div>
				</div>
				<div class="main_content_submit_button">
					<span>Save changes</span>
				</div>
			</div>
			<div class="rightside">
				<div class="righside_head">
					<p class="rightside_head_text">Fields</p>
				</div>
				<div class="rightside_content">
					<p>Click or Drag to add fields</p>

					<div class="rightside_item">
						<span class ="heading_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg"
								 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 14 14" style="enable-background:new 0 0 14 14;" xml:space="preserve">
								<g>
									<rect y="12" width="14" height="2"/>
									<path
										d="M5.105,8.655h4.029L10,11h3.105L8.553,0H5.764L1,11h3.045L5.105,8.655z M7.137,3.432l1.164,2.97H5.957L7.137,3.432z"/>
								</g>
								</svg>
						</span>
						<p>Heading</p>
					</div>
					<div class="rightside_item">
						<span class ="name_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 16 11" style="enable-background:new 0 0 16 11;" xml:space="preserve">
							<g>
								<path d="M6.608,6.259c0,0,0.038-0.458-0.087-0.652c-0.139-0.215-0.604-0.35-1.064-0.541c-0.46-0.192-0.569-0.26-0.569-0.26
									L4.885,4.365c0,0,0.172-0.134,0.226-0.549c0.107,0.031,0.222-0.161,0.228-0.263c0.006-0.098-0.016-0.366-0.146-0.34
									c0.026-0.205,0.047-0.387,0.036-0.485C5.193,2.374,4.844,2,4.307,2C3.77,2,3.42,2.374,3.387,2.729
									c-0.01,0.099,0.01,0.28,0.036,0.485c-0.131-0.026-0.152,0.242-0.146,0.34c0.007,0.102,0.12,0.294,0.227,0.263
									c0.053,0.415,0.227,0.549,0.227,0.549L3.726,4.806c0,0-0.108,0.067-0.569,0.26C2.695,5.256,2.231,5.392,2.092,5.606
									C1.968,5.801,2.006,6.259,2.006,6.259H6.608z"/>
								<rect x="8" y="2" width="4" height="1"/>
								<rect x="8" y="4" width="6" height="1"/>
								<rect x="8" y="6" width="5" height="1"/>
								<path d="M0,0v11h16V0H0z M15,10h-2.092C12.964,9.843,13,9.676,13,9.5C13,8.671,12.328,8,11.5,8C10.672,8,10,8.671,10,9.5
									c0,0.176,0.036,0.343,0.092,0.5H5.908C5.964,9.843,6,9.676,6,9.5C6,8.671,5.328,8,4.5,8S3,8.671,3,9.5
									C3,9.676,3.036,9.843,3.092,10H1V1h14V10z"/>
							</g>
							</svg>
						</span>
						<p>Name</p>
					</div>
					<div class="rightside_item">
						<span class ="phone_image">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="11" height="16.031" viewBox="0 0 11 16.031">
								<defs>
									<filter id="color-overlay-1" filterUnits="userSpaceOnUse">
										<feFlood flood-color="#32424f"/>
										<feComposite operator="in" in2="SourceGraphic"/>
										<feBlend in2="SourceGraphic" result="solidFill"/>
									</filter>
								</defs>
								<path d="M8.989,16.031 L2.011,16.031 C0.901,16.031 0.000,15.132 0.000,14.023 L0.000,2.008 C0.000,0.899 0.901,-0.000 2.011,-0.000 L8.989,-0.000 C10.099,-0.000 11.000,0.899 11.000,2.008 L11.000,14.023 C11.000,15.132 10.099,16.031 8.989,16.031 ZM5.000,15.000 L6.000,15.000 L6.000,14.000 L5.000,14.000 L5.000,15.000 ZM7.000,1.000 L4.000,1.000 L4.000,2.000 L7.000,2.000 L7.000,1.000 ZM9.969,3.000 L1.031,3.000 L1.031,12.031 L9.969,12.031 L9.969,3.000 Z" class="cls-1"/>
							</svg>
						</span>
						<p>Phone</p>
					</div>
					<div class="rightside_item">
						<span class ="email_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 16 11" style="enable-background:new 0 0 16 11;" xml:space="preserve">
							<g>
								<path d="M0,0v11h16V0H0z M13.697,1L7.944,6.752L2.192,1H13.697z M15,8.95L12.051,6l-0.707,0.707L14.636,10H1.364l3.292-3.293
									L3.949,6L1,8.95V1.222L7.238,7.46l0.706,0.707L8.652,7.46L15,1.112V8.95z"/>
							</g>
							</svg>
						</span>
						<p>Email</p>
					</div>
					<div class="rightside_item">
						<span class ="company_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
							<g>
								<path d="M6.559,1l3,0.009C10.204,1.011,10.747,1.427,10.956,2H12c-0.235-1.132-1.237-1.987-2.439-1.991L6.562,0
									c-1.207-0.003-2.22,0.854-2.455,1.993l1.042,0.003C5.356,1.416,5.908,0.998,6.559,1z"/>
								<path d="M10,12c0,0.55-0.45,1-1,1H7c-0.55,0-1-0.45-1-1v-1.366L0,7.655V15.5C0,15.775,0.225,16,0.5,16h15
									c0.275,0,0.5-0.225,0.5-0.5V7.655l-6,2.978V12z"/>
								<path d="M15.5,4H13c0-0.55-0.45-1-1-1h-1c-0.55,0-1,0.45-1,1H6c0-0.55-0.45-1-1-1H4C3.45,3,3,3.45,3,4H0.5C0.225,4,0,4.225,0,4.5
									v1.704L6.276,9.32C6.459,9.126,6.714,9,7,9h2c0.286,0,0.541,0.126,0.724,0.32L16,6.204V4.5C16,4.225,15.775,4,15.5,4z"/>
								<rect x="7" y="11" width="2" height="1"/>
							</g>
							</svg>
						</span>
						<p>Company</p>
					</div>
					<div class="rightside_item">
						<span class ="textarea_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
							<g>
								<rect x="3" y="9" width="10" height="1"/>
								<rect x="3" y="11" width="6" height="1"/>
								<rect x="3" y="7" width="10" height="1"/>
								<rect x="3" y="5" width="10" height="1"/>
								<rect x="3" y="3" width="10" height="1"/>
								<path d="M0,0v16h16V0H0z M15,15H1V1h14V15z"/>
							</g>
							</svg>
						</span>
						<p>Text area</p>
					</div>
					<div class="rightside_item">
						<span class ="text_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 12.291 13.402" style="enable-background:new 0 0 12.291 13.402;" xml:space="preserve">
							<path d="M12.195,0c-0.3,0.031-0.597,0.055-0.89,0.066c-0.543,0.02-1.618,0.029-3.227,0.029H4.212c-1.563,0-2.619-0.01-3.168-0.029
								C0.705,0.055,0.387,0.031,0.087,0L0,0.096c0.045,0.326,0.077,0.629,0.096,0.91C0.103,1.172,0.118,1.91,0.144,3.219h0.796
								C0.952,2.663,1,2.162,1.083,1.715c0.031-0.186,0.07-0.297,0.115-0.336c0.031-0.031,0.152-0.057,0.363-0.076
								c0.524-0.045,1.131-0.066,1.82-0.066h1.37c0.02,0.185,0.028,1.06,0.028,2.625V9.6c0,1.379-0.035,2.206-0.104,2.48
								c-0.052,0.18-0.149,0.307-0.293,0.383c-0.144,0.077-0.599,0.129-1.365,0.154v0.785c1.18-0.058,2.223-0.086,3.128-0.086
								c0.849,0,1.891,0.028,3.128,0.086v-0.785c-0.766-0.025-1.223-0.078-1.37-0.158c-0.146-0.08-0.242-0.203-0.287-0.369
								c-0.07-0.281-0.105-1.111-0.105-2.49V3.861c0-1.527,0.01-2.402,0.029-2.625h1.37c0.734,0,1.363,0.025,1.887,0.076
								c0.166,0.013,0.269,0.035,0.307,0.066c0.045,0.045,0.086,0.183,0.125,0.412c0.069,0.454,0.111,0.93,0.124,1.428h0.795
								c0.019-1.348,0.032-2.047,0.039-2.098c0.013-0.294,0.048-0.636,0.104-1.025L12.195,0z"/>
							</svg>
						</span>
						<p>Text</p>
					</div>
					<div class="rightside_item">
						<span class ="number_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 15 4.92" enable-background="new 0 0 15 4.92" xml:space="preserve">
							<g>
								<polygon points="1.042,1.395 1.142,1.306 1.243,1.21 1.332,1.122 1.388,1.064 1.38,1.303 1.369,1.564 1.364,1.813 1.361,2.016
									1.361,4.785 2.372,4.785 2.372,0 1.542,0 0,1.227 0.492,1.837 	"/>
								<path d="M7.123,3.957l0.576-0.58c0.17-0.167,0.329-0.332,0.478-0.494c0.149-0.162,0.28-0.327,0.396-0.49
									C8.686,2.227,8.774,2.059,8.84,1.889c0.066-0.172,0.1-0.352,0.1-0.54c0-0.206-0.033-0.393-0.104-0.559
									C8.767,0.623,8.668,0.482,8.539,0.365C8.411,0.249,8.257,0.16,8.073,0.096C7.893,0.031,7.686,0,7.455,0
									C7.265,0,7.092,0.02,6.938,0.059S6.639,0.147,6.511,0.21C6.382,0.273,6.265,0.346,6.157,0.429L5.851,0.686l0.55,0.65
									c0.173-0.157,0.341-0.277,0.5-0.363c0.16-0.084,0.324-0.127,0.497-0.127c0.163,0,0.294,0.045,0.391,0.134
									c0.097,0.089,0.146,0.215,0.146,0.377c0,0.146-0.023,0.282-0.068,0.409c-0.047,0.125-0.109,0.25-0.193,0.373
									C7.589,2.26,7.489,2.385,7.374,2.514s-0.243,0.27-0.385,0.423L5.864,4.15v0.703h3.209V4.003h-1.95V3.957z"/>
								<path d="M13.827,2.353V2.334c0.147-0.035,0.28-0.085,0.406-0.151c0.125-0.067,0.235-0.151,0.327-0.249
									c0.094-0.1,0.167-0.216,0.22-0.347c0.055-0.132,0.081-0.281,0.081-0.448c0-0.18-0.039-0.341-0.112-0.48
									c-0.076-0.143-0.184-0.26-0.319-0.357c-0.139-0.098-0.304-0.172-0.498-0.223C13.741,0.027,13.526,0,13.291,0
									c-0.168,0-0.322,0.014-0.469,0.037c-0.146,0.023-0.283,0.058-0.408,0.1c-0.129,0.043-0.244,0.092-0.353,0.148l-0.299,0.187
									l0.511,0.675l0.175-0.113l0.213-0.105l0.251-0.079l0.293-0.029c0.23,0,0.397,0.047,0.503,0.144
									c0.107,0.096,0.159,0.228,0.159,0.397l-0.05,0.266l-0.167,0.218c-0.081,0.064-0.186,0.111-0.319,0.148
									c-0.134,0.035-0.302,0.055-0.503,0.055h-0.332v0.711h0.34c0.215,0,0.393,0.014,0.539,0.044c0.147,0.031,0.265,0.074,0.356,0.13
									l0.196,0.203L13.987,3.4l-0.048,0.29L13.78,3.918c-0.073,0.064-0.173,0.113-0.299,0.148c-0.123,0.033-0.28,0.052-0.466,0.052
									l-0.301-0.02l-0.322-0.061l-0.327-0.1l-0.312-0.137V4.66c0.196,0.088,0.408,0.153,0.636,0.195c0.229,0.043,0.469,0.064,0.726,0.064
									c0.322,0,0.6-0.037,0.838-0.11c0.235-0.073,0.432-0.175,0.589-0.307c0.154-0.131,0.272-0.285,0.346-0.462
									C14.963,3.863,15,3.67,15,3.46c0-0.316-0.097-0.567-0.296-0.754C14.505,2.52,14.212,2.4,13.827,2.353z"/>
							</g>
							</svg>
						</span>
						<p>Number</p>
					</div>
					<div class="rightside_item">
						<span class ="list_image">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="7" height="11" viewBox="0 0 7 11">
								<defs>
									<filter id="color-overlay-1" filterUnits="userSpaceOnUse">
										<feFlood flood-color="#32424f"/>
										<feComposite operator="in" in2="SourceGraphic"/>
										<feBlend in2="SourceGraphic" result="solidFill"/>
									</filter>
								</defs>
								<path d="M3.512,0.000 L7.000,3.938 L0.000,4.000 L3.512,0.000 ZM3.512,11.000 L0.000,7.000 L7.000,7.062 L3.512,11.000 Z" class="cls-1"/>
							</svg>
						</span>
						<p>List</p>
					</div>
					<div class="rightside_item">
						<span class ="select_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 15 15" style="enable-background:new 0 0 15 15;" xml:space="preserve">
							<polygon points="3.333,11.666 1.666,10 0,11.666 3.333,15 8.333,10 6.666,8.333 "/>
															<polygon points="3.333,3.333 1.666,1.666 0,3.333 3.333,6.666 8.333,1.666 6.666,0 "/>
															<rect x="10" y="3.333" width="5" height="1.667"/>
															<rect x="10" y="11.666" width="5" height="1.667"/>
							</svg>
						</span>
						<p>Select</p>
					</div>
					<div class="rightside_item">
						<span class ="date_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 15 16" style="enable-background:new 0 0 15 16;" xml:space="preserve">
							<g>
								<rect x="5" y="6" width="2" height="2"/>
								<rect x="8" y="6" width="2" height="2"/>
								<rect x="11" y="6" width="2" height="2"/>
								<rect x="2" y="9" width="2" height="2"/>
								<rect x="5" y="9" width="2" height="2"/>
								<rect x="8" y="9" width="2" height="2"/>
								<rect x="11" y="9" width="2" height="2"/>
								<rect x="2" y="12" width="2" height="2"/>
								<rect x="5" y="12" width="2" height="2"/>
								<rect x="8" y="12" width="2" height="2"/>
								<path d="M13,2V0.5C13,0.225,12.776,0,12.5,0h-2C10.224,0,10,0.225,10,0.5V2H5V0.5C5,0.225,4.776,0,4.5,0h-2C2.224,0,2,0.225,2,0.5
									V2H0v14h15V2H13z M11,1h1v2h-1V1z M3,1h1v2H3V1z M14,15H1V5h13V15z"/>
							</g>
							</svg>
						</span>
						<p>Date</p>
					</div>
					<div class="rightside_item">
						<span class ="url_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 15 14.999" style="enable-background:new 0 0 15 14.999;" xml:space="preserve">
							<g>
								<rect x="3.755" y="7.031" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 18.1071 7.4985)" width="7.491" height="0.937"/>
								<path d="M6.507,10.48l-2.648,2.648l-1.987-1.985l2.649-2.649l1.324-1.325c-0.729-0.729-1.921-0.729-2.648,0L0.545,9.818
									c-0.727,0.729-0.727,1.92,0.002,2.649l1.986,1.986c0.728,0.729,1.921,0.729,2.649,0l2.648-2.649c0.728-0.729,0.728-1.92,0-2.649
									L6.507,10.48z"/>
								<path d="M14.454,2.533l-1.987-1.986c-0.728-0.73-1.92-0.73-2.648-0.001L7.169,3.195c-0.728,0.728-0.729,1.921,0,2.65l1.324-1.325
									l1.986-1.987l0.662-0.662l1.987,1.986l-0.663,0.663l-3.311,3.31c0.729,0.729,1.921,0.729,2.648,0l2.649-2.648
									C15.181,4.454,15.183,3.262,14.454,2.533z"/>
							</g>
							</svg>
						</span>
						<p>URL</p>
					</div>
					<div class="rightside_item">
						<span class ="adress_image">
							<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 11 16" style="enable-background:new 0 0 11 16;" xml:space="preserve">
							<path d="M5.5,0C3.301,0,0,1,0,5c0,2,4.4,9,5.5,11C6.6,14,11,7,11,5C11,1,7.701,0,5.5,0z M5.5,6.75C4.533,6.75,3.75,5.967,3.75,5
								c0-0.967,0.783-1.75,1.75-1.75S7.25,4.033,7.25,5C7.25,5.967,6.467,6.75,5.5,6.75z"/>
							</svg>
						</span>
						<p>Adress</p>
					</div>
					<div class="rightside_item">
						<span class ="file_upload_image"></span>
						<p>File upload</p>
					</div>
					<div class="rightside_item">
						<span class ="instructions_image"></span>
						<p>Instructions</p>
					</div>
					<div class="rightside_item">
						<span class ="captcha_image"></span>
						<p>Captcha</p>
					</div>
					<div class="rightside_item">
						<span class ="line_image"></span>
						<p>Line</p>
					</div>
					<div class="rightside_item">
						<span class ="submit_image"></span>
						<p>Submit</p>
					</div>
					<div class="rightside_item">
						<span class ="checkbox_image"></span>
						<p>Checkbox</p>
					</div>
					<div class="rightside_item">
						<span class ="radio_image"></span>
						<p>Radio</p>
					</div>
				</div>
				<div class="rightside_bottom">
					<div class="shortcode">
						<p>Shortcode</p>
					</div>
					<div class="other_forms">
						<p>Other Forms</p>
					</div>
				</div>
			</div>
