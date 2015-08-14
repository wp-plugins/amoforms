<?php defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');
/** @var Amoforms\Views\Interfaces\Base $this */
?>
<script data-main="<?= AMOFORMS_JS_URL ?>/config" src="<?= AMOFORMS_JS_URL ?>/vendor/requirejs/require.js"></script>
<script>require(['app/app'])</script>

<link rel="stylesheet" href="<?= AMOFORMS_CSS_URL . '/app.css' ?>">

<div class="amoforms">
  <div class="amoforms__top-nav">
    <div class="amoforms__top-nav__item active">Edit Fields</div>
    <div class="amoforms__top-nav__item">Form Settings</div>
    <div class="amoforms__top-nav__item">Email Settings</div>
    <div class="amoforms__top-nav__item">Form Preview</div>
  </div>

  <div class="amoforms__content" id="amoforms_content">
    <div class="amoforms__fields name-inside-1 name-before-1">
      <div class="amoforms__fields__main">
        <!--<div class="amoforms__fields__main__top">
          <div class="design_themes">
            <span></span>
            <p>Design themes</p>
          </div>
          <div class="name_position">
            <span><p>Text</p><div></div></span>
            <p>Name Position</p>
          </div>
        </div>-->

        <div class="amoforms__fields__editor clearfix" id="amoforms_fields">
          <!-- Heading -->
          <div class="amoforms__fields__row">
            <div class="amoforms__fields__row__inner">
              <div class="amoforms__fields__row__inner__control">
                <div class="amoforms__heading">
                  <input type="text" class="amoforms__text-input" placeholder="Call Back Request">
                </div>

                <div class="amoforms__fields__editor__row__actions input_buttons">
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-edit">Edit</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-dublicate">Dublicate</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-delete">Delete</span>
                </div>
              </div>
            </div>
            <div class="amoforms__fields__row__inner__descr">Description text</div>
          </div>

          <!-- Input -->
          <div class="amoforms__fields__row">
            <div class="amoforms__fields__row__inner">
              <div class="amoforms__fields__row__inner__name">Text</div>
              <div class="amoforms__fields__row__inner__control">
                <input type="text" class="amoforms__text-input" placeholder="Call Back Request">

                <div class="amoforms__fields__editor__row__actions input_buttons">
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-edit">Edit</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-dublicate">Dublicate</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-delete">Delete</span>
                </div>
              </div>
            </div>
            <div class="amoforms__fields__row__inner__descr">Description text</div>
          </div>
          <div class="amoforms__fields__edit">
            <div class="amoforms__fields__edit__row">
              <div class="amoforms__fields__edit__descr">Description text</div>
              <input type="text" class="amoforms__text-input amoforms__fields__edit__input" placeholder="Call Back Request">
            </div>

            <div class="amoforms__fields__edit__row">
              <div class="amoforms__fields__edit__descr">Description</div>
              <textarea class="amoforms__text-input amoforms__fields__edit__textarea" placeholder="Call Back Request"></textarea>
            </div>

            <div class="amoforms__fields__edit__row clearfix">
              <div class="amoforms__fields__edit__row__left">
                <div class="amoforms__fields__edit__descr">Description Position</div>
                <div class="amoforms__fields__edit__row__left__radios">
                  <label><span class="amoforms__radio"><input type="radio" name="descr_position"><b></b></span><b>After input</b></label>
                  <label><span class="amoforms__radio"><input type="radio" name="descr_position"><b></b></span><b>Before input</b></label>
                </div>

                <div class="amoforms__fields__edit__descr amoforms__fields__edit__descr-default-value">Default Value</div>
                <input type="text" class="amoforms__text-input amoforms__fields__edit__input">
              </div>
              <div class="amoforms__fields__edit__row__right">
                <div class="amoforms__fields__edit__descr">Required</div>
                <div class="amoforms__fields__edit__row__left__radios">
                  <label><span class="amoforms__radio"><input type="radio" name="required"><b></b></span><b>Yes</b></label>
                  <label><span class="amoforms__radio"><input type="radio" name="required"><b></b></span><b>No</b></label>
                </div>
                <div class="amoforms__fields__edit__descr amoforms__fields__edit__descr-placeholder">Placeholder</div>
                <input type="text" class="amoforms__text-input amoforms__fields__edit__input">
              </div>
            </div>

            <div class="amoforms__fields__edit__row">
              <div class="amoforms__fields__edit__descr">Options</div>
              <div class="amoforms__fields__edit__row__options">
                <div class="amoforms__fields__edit__row__options__item">
                  <input type="text" class="amoforms__text-input amoforms__fields__edit__input" placeholder="Name">
                  <span class="amoforms__fields__edit__row__options__item__move"></span>
                  <span class="amoforms__fields__edit__row__options__item__trash"></span>
                </div>
                <div class="amoforms__fields__edit__row__options__item">
                  <input type="text" class="amoforms__text-input amoforms__fields__edit__input" placeholder="Name">
                  <span class="amoforms__fields__edit__row__options__item__move"></span>
                  <span class="amoforms__fields__edit__row__options__item__trash"></span>
                </div>
              </div>
              <div class="amoforms__fields__edit__row__options__add-wrapper">
                <button class="amoforms__fields__edit__row__options__add"><span>Add Option</span></button>
              </div>
            </div>

            <div class="amoforms__fields__edit__actions">
              <button class="button-input">Save</button>
            </div>
          </div>

          <!-- Textarea -->
          <div class="amoforms__fields__row">
            <div class="amoforms__fields__row__inner">
              <div class="amoforms__fields__row__inner__name">Textarea</div>
              <div class="amoforms__fields__row__inner__control">
                <textarea class="amoforms__text-input" placeholder="What do you think?"></textarea>

                <div class="amoforms__fields__editor__row__actions input_buttons">
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-edit">Edit</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-dublicate">Dublicate</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-delete">Delete</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Date -->
          <div class="amoforms__fields__row">
            <div class="amoforms__fields__row__inner no-border">
              <div class="amoforms__fields__row__inner__name">Date</div>
              <div class="amoforms__fields__row__inner__control">
                <div class="amoforms__date">
                  <input type="text" class="amoforms__text-input">
                  <b></b>
                </div>

                <div class="amoforms__fields__editor__row__actions input_buttons">
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-edit">Edit</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-dublicate">Dublicate</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-delete">Delete</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Select -->
          <div class="amoforms__fields__row">
            <div class="amoforms__fields__row__inner no-border">
              <div class="amoforms__fields__row__inner__name">Select</div>
              <div class="amoforms__fields__row__inner__control">
                <div class="amoforms__select">
                  <select class="amoforms__select__input" placeholder="Choose one">
                    <option value="1">Choose 1</option>
                    <option value="2">Choose 2</option>
                    <option value="3">Choose 3</option>
                    <option value="4">Choose 4</option>
                    <option value="5">Choose N</option>
                  </select>
                </div>

                <div class="amoforms__fields__editor__row__actions input_buttons">
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-edit">Edit</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-dublicate">Dublicate</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-delete">Delete</span>
                </div>
              </div>
            </div>
          </div>

          <!-- MultiSelect -->
          <div class="amoforms__fields__row">
            <div class="amoforms__fields__row__inner no-border">
              <div class="amoforms__fields__row__inner__name">MultiSelect</div>
              <div class="amoforms__fields__row__inner__control">
                <div class="amoforms__select multiple">
                  <select class="amoforms__select__input" placeholder="Choose one" multiple>
                    <option value="1">Choose 1</option>
                    <option value="2">Choose 2</option>
                    <option value="3">Choose 3</option>
                    <option value="4">Choose 4</option>
                    <option value="5">Choose 5</option>
                    <option value="6">Choose 6</option>
                    <option value="7">Choose 7</option>
                    <option value="8">Choose 8</option>
                    <option value="9">Choose 9</option>
                    <option value="10">Choose 10</option>
                    <option value="11">Choose 11</option>
                    <option value="12">Choose 12</option>
                    <option value="13">Choose 13</option>
                    <option value="14">Choose 14</option>
                    <option value="15">Choose 15</option>
                    <option value="16">Choose N</option>
                  </select>
                </div>

                <div class="amoforms__fields__editor__row__actions input_buttons">
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-edit">Edit</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-dublicate">Dublicate</span>
                  <span class="amoforms__fields__editor__row__actions__action amoforms__fields__editor__row__actions__action-delete">Delete</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <button class="button-input">Save changes</button>
      </div>

      <div class="amoforms__fields__rightside">
        <div class="amoforms__fields__rightside__item expanded">
          <div class="amoforms__fields__rightside__item__head">
            <p class="amoforms__fields__rightside__item__head__text">Fields</p>
          </div>
          <div class="amoforms__fields__rightside__item__content">
            <p>Click or Drag to add fields</p>

            <div class="amoforms__fields__rightside__item__content__fields">
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
              <div class="amoforms__fields__rightside__item__content__fields__field">
                <span></span>
                <p>Heading</p>
              </div>
            </div>
          </div>
        </div>

        <div class="amoforms__fields__rightside__item">
          <div class="amoforms__fields__rightside__item__head">
            <p class="amoforms__fields__rightside__item__head__text">Shortcode</p>
          </div>
          <div class="amoforms__fields__rightside__item__content">
            
          </div>
        </div>

        <div class="amoforms__fields__rightside__item">
          <div class="amoforms__fields__rightside__item__head">
            <p class="amoforms__fields__rightside__item__head__text">Other forms</p>
          </div>
          <div class="amoforms__fields__rightside__item__content">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
