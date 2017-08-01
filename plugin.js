tinymce.create('tinymce.plugins.GameButton', {
	createControl: function(n, cm) {
		switch (n) {
			case 'mymenubutton':
				var c = cm.createMenuButton('mymenubutton', {
					title : '',
					image : 'img/example.gif',
					icons : false
				});

				c.onRenderMenu.add(function(c, m) {
					var sub;

					m.add({title : 'Some item 1', onclick : function() {
						tinyMCE.activeEditor.execCommand('mceInsertContent', false, 'Some item 1');
					}});

					m.add({title : 'Some item 2', onclick : function() {
						tinyMCE.activeEditor.execCommand('mceInsertContent', false, 'Some item 2');
					}});
				});

				// Return the new menu button instance
				return c;
		}

		return null;
	}
});

// Register plugin with a short name
tinymce.PluginManager.add('example', tinymce.plugins.GameButton);