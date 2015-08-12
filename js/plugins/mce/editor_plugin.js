(function () {

  console.log('load editor_plugin');
  var plugin_code = 'amoforms';

  // Load plugin specific language pack
  tinymce.PluginManager.requireLangPack(plugin_code); //TODO: check it

  tinymce.create('tinymce.plugins.AmoformsPlugin', {
    /**
     * Initializes the plugin, this will be executed after the plugin has been created.
     * This call is done before the editor instance has finished it's initialization so use the onInit event
     * of the editor instance to intercept that event.
     *
     * @param {tinymce.Editor} editor Editor instance that the plugin is initialized in.
     * @param {string} url Absolute URL to where the plugin is located.
     */
    init: function (editor, url) {

      console.log('init');
      console.log('editor', editor);
      console.log('url', url);

      // Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceAmoformsAddForm');
      editor.addCommand('mceAmoformsAddForm',
        function () {
          var content = tinyMCE.activeEditor.selection.getContent({format: 'raw'});
          tinyMCE.activeEditor.selection.setContent('[amoforms]' + content + '[/amoforms]');
        }
      );

      // Register button
      editor.addButton('amoforms_add_form',
        {
          title: 'Add amoForm',
          cmd: 'mceAmoformsAddForm',
          image: url + '/img/userinfo.gif'
        }
      );
    },

    /**
     * Creates control instances based in the incomming name. This method is normally not
     * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
     * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
     * method can be used to create those.
     *
     * @param {String} n Name of the control to create.
     * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
     * @return {tinymce.ui.Control} New control instance or null if no control was created.
     */
    createControl: function (n, cm) {
      console.log('mce createControl');
      return null;
    },

    /**
     * Returns information about the plugin as a name/value array.
     * The current keys are longname, author, authorurl, infourl and version.
     *
     * @return {Object} Name/value array containing information about the plugin.
     */
    getInfo: function () {
      console.log('mce getInfo');
      return {
        longname: 'Amoforms plugin',
        author: 'amoCRM',
        authorurl: 'http://www.amocrm.com',
        infourl: 'http://www.amocrm.com',
        version: "1.0"
      };
    }
  });

  // Register plugin
  tinymce.PluginManager.add(plugin_code, tinymce.plugins.AmoformsPlugin);
})();
