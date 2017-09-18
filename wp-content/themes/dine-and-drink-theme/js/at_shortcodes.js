(function(){
	
    tinymce.create('tinymce.plugins.toggle1', {
        init : function(ed, url){
			ed.addCommand('cmd_toggle1', function(){
                ilc_sel_content = tinyMCE.activeEditor.selection.getContent();
				ilc_sel_content = 'Your Content Here';
                tinyMCE.activeEditor.selection.setContent('[toggle style="style1"]<br />[toggle_title]Title Here[/toggle_title]<br />[toggle_content]' + ilc_sel_content + '[/toggle_content]<br />[/toggle]');
            });
            ed.addButton('toggle1', {
                title: 'Add Toggle Style 1',
                image: url+'/images/toggle1.png',
                cmd: 'cmd_toggle1'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	
	 tinymce.create('tinymce.plugins.toggle2', {
        init : function(ed, url){
			ed.addCommand('cmd_toggle2', function(){
                ilc_sel_content = tinyMCE.activeEditor.selection.getContent();
				ilc_sel_content = 'Your Content Here';
                tinyMCE.activeEditor.selection.setContent('[toggle style="style2"]<br />[toggle_title]Title Here[/toggle_title]<br />[toggle_content]' + ilc_sel_content + '[/toggle_content]<br />[/toggle]');
            });
            ed.addButton('toggle2', {
                title: 'Add Toggle Style 2',
                image: url+'/images/toggle2.png',
                cmd: 'cmd_toggle2'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	
	tinymce.create('tinymce.plugins.tabs', {
        init : function(ed, url){
			ed.addCommand('cmd_tabs', function(){
                ilc_sel_content = tinyMCE.activeEditor.selection.getContent();
				ilc_sel_content = 'Your Content Here';
				set_content = '[tab_container]<br />[tab_title]Tab Title 1[/tab_title]&nbsp;[tabs]Tab 1 '+ilc_sel_content+'[/tabs]<br />[tab_title]Tab Title 2[/tab_title]&nbsp;[tabs]Tab 2 '+ilc_sel_content+'[/tabs]<br />[tab_title]Tab Title 3[/tab_title]&nbsp;[tabs]Tab 3 '+ilc_sel_content+'[/tabs]<br />[/tab_container]';
                tinyMCE.activeEditor.selection.setContent(set_content);
            });
            ed.addButton('tabs', {
                title: 'Add Tab',
                image: url+'/images/tab.png',
                cmd: 'cmd_tabs'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	
	tinymce.create('tinymce.plugins.collapses', {
        init : function(ed, url){
			ed.addCommand('cmd_collapses', function(){
                ilc_sel_content = tinyMCE.activeEditor.selection.getContent();
				ilc_sel_content = 'Your Content Here';
				set_content = '[collapse_container]<br />[collapse_title]collapse Title 1[/collapse_title]&nbsp;[collapses]collapse 1 '+ilc_sel_content+'[/collapses]<br />[collapse_title]collapse Title 2[/collapse_title]&nbsp;[collapses]collapse 2 '+ilc_sel_content+'[/collapses]<br />[collapse_title]collapse Title 3[/collapse_title]&nbsp;[collapses]collapse 3 '+ilc_sel_content+'[/collapses]<br />[/collapse_container]';
                tinyMCE.activeEditor.selection.setContent(set_content);
            });
            ed.addButton('collapses', {
                title: 'Add collapse',
                image: url+'/images/collapse.png',
                cmd: 'cmd_collapses'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	
	tinymce.create('tinymce.plugins.slider', {
        init : function(ed, url){
			ed.addCommand('cmd_slider', function(){
                ilc_sel_content = tinyMCE.activeEditor.selection.getContent();
				ilc_sel_content = 'Your content show here...';
                tinyMCE.activeEditor.selection.setContent('[slider]<br />[panel]'+ilc_sel_content+'[/panel]<br />[panel]'+ilc_sel_content+'[/panel]<br />[panel]'+ilc_sel_content+'[/panel]<br />[/slider]');
            });
            ed.addButton('slider', {
                title: 'Add Slider',
                image: url+'/images/slider.png',
                cmd: 'cmd_slider'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	tinymce.create('tinymce.plugins.leftquote', {
        init : function(ed, url){
			ed.addCommand('cmd_leftquote', function(){
                ilc_sel_content = tinyMCE.activeEditor.selection.getContent();
				ilc_sel_content = 'Your Content Here';
                tinyMCE.activeEditor.selection.setContent('[pullquote style="left"]'+ilc_sel_content+'[/pullquote]');
            });
            ed.addButton('leftquote', {
                title: 'Pull Left Quote',
                image: url+'/images/leftquote.png',
                cmd: 'cmd_leftquote'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	tinymce.create('tinymce.plugins.rightquote', {
        init : function(ed, url){
			ed.addCommand('cmd_rightquote', function(){
                ilc_sel_content = tinyMCE.activeEditor.selection.getContent();
				ilc_sel_content = 'Your Content Here';
                tinyMCE.activeEditor.selection.setContent('[pullquote style="right"]'+ilc_sel_content+'[/pullquote]');
            });
            ed.addButton('rightquote', {
                title: 'Pull Right Quote',
                image: url+'/images/rightquote.png',
                cmd: 'cmd_rightquote'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	
	tinymce.create('tinymce.plugins.contactform', {
        init : function(ed, url){
			ed.addCommand('cmd_contactform', function(){
                tinyMCE.activeEditor.selection.setContent('[contactform]');
            });
            ed.addButton('contactform', {
                title: 'Contact Form',
                image: url+'/images/contact.png',
                cmd: 'cmd_contactform'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	
    
	
	// Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.columns', {
        createControl: function(n, cm) {
            switch (n) {
                case 'columns':
                    var mlb = cm.createListBox('columns', {
                        title : 'Columns',
                        onselect : function(v) {
							// Set focus to WordPress editor
							tinyMCE.activeEditor.focus(); 
						
							// Get selected text
							var sel_txt = tinyMCE.activeEditor.selection.getContent();
						
							// If no text selected
							if( '' == sel_txt)
								sel_txt="Column Content";	
						
							tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '['+v+']'+sel_txt+'[/'+v+']');

						}
					});

                    // Add some values to the list box
                    mlb.add('One Third', 'one_third');
                    mlb.add('One Third (last)', 'one_third_last');
                    mlb.add('Two Thirds', 'two_third');
					mlb.add('Two Thirds (last)', 'two_third_last');
					mlb.add('One Half', 'one_half');
					mlb.add('One Half (last)', 'one_half_last');
					mlb.add('One Fourth', 'one_fourth');
					mlb.add('One Fourth (last)', 'one_fourth_last');
					mlb.add('Three Fourths', 'three_fourth');
					mlb.add('Three Fourths (last)', 'three_fourth_last');
					mlb.add('One Fifth', 'one_fifth');
					mlb.add('One Fifth (last)', 'one_fifth_last');
					mlb.add('Two Fifths', 'two_fifth');
					mlb.add('Two Fifths (last)', 'two_fifth_last');
					mlb.add('Three Fifths', 'three_fifth');
					mlb.add('Three Fifths (last)', 'three_fifth_last');
					mlb.add('Four Fifths', 'four_fifth');
					mlb.add('Four Fifths (last)', 'four_fifth_last');
					mlb.add('One Sixth', 'one_sixth');
					mlb.add('One Sixth (last)', 'one_sixth_last');
					mlb.add('Five Sixths', 'five_sixth');
					mlb.add('Five Sixths (last)', 'five_sixth_last');					

                // Return the new listbox instance
                return mlb;
               
            }
            return null;
        }
    });	
	
	tinymce.create('tinymce.plugins.buttons', {
        createControl: function(n, cm) {
            switch (n) {
                case 'buttons':
                    var mlb = cm.createListBox('buttons', {
                        title : 'Buttons',
                        onselect : function(v) {
							// Set focus to WordPress editor
							tinyMCE.activeEditor.focus(); 
						
							// Get selected text
							var sel_txt = tinyMCE.activeEditor.selection.getContent();
						
							// If no text selected
							if( '' == sel_txt)
								sel_txt="button content";	
								
							if(v == "")
								v= ['small','black'];
						
							tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[button link="The URL of the button" size="'+v[0]+'" color="'+v[1]+'" target="blank"]'+sel_txt+'[/button]');

						}
					});

                    // Add some values to the list box
                    mlb.add('small - black', ['small','black']);
					mlb.add('small - brown', ['small','brown']);
					mlb.add('small - red', ['small','red']);
					mlb.add('small - orange', ['small','orange']);
					mlb.add('small - yellow', ['small','yellow']);
					mlb.add('small - green', ['small','green']);
					mlb.add('small - blue', ['small','blue']);
					mlb.add('small - violet', ['small','violet']);
					mlb.add('small - grey', ['small','grey']);
					mlb.add('small - white', ['small','white']);
					
					mlb.add('medium - black', ['medium','black']);
					mlb.add('medium - brown', ['medium','brown']);
					mlb.add('medium - red', ['medium','red']);
					mlb.add('medium - orange', ['medium','orange']);
					mlb.add('medium - yellow', ['medium','yellow']);
					mlb.add('medium - green', ['medium','green']);
					mlb.add('medium - blue', ['medium','blue']);
					mlb.add('medium - violet', ['medium','violet']);
					mlb.add('medium - grey', ['medium','grey']);
					mlb.add('medium - white', ['medium','white']);
					
					mlb.add('large - black', ['large','black']);
					mlb.add('large - brown', ['large','brown']);
					mlb.add('large - red', ['large','red']);
					mlb.add('large - orange', ['large','orange']);
					mlb.add('large - yellow', ['large','yellow']);
					mlb.add('large - green', ['large','green']);
					mlb.add('large - blue', ['large','blue']);
					mlb.add('large - violet', ['large','violet']);
					mlb.add('large - grey', ['large','grey']);
					mlb.add('large - white', ['large','white']);
					
                return mlb;
               
            }
            return null;
        }
    });
	
	tinymce.create('tinymce.plugins.list', {
        createControl: function(n, cm) {
            switch (n) {
                case 'list':
                    var mlb = cm.createListBox('list', {
                        title : 'List',
                        onselect : function(v) {
							// Set focus to WordPress editor
							tinyMCE.activeEditor.focus(); 
						
							// Get selected text
							var sel_txt = tinyMCE.activeEditor.selection.getContent();
						
							if(v == "")
								v=['angle-right','#FFFFFF']
						
							// If no text selected
							if( '' == sel_txt)
								sel_txt=' li content';	
								
							tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[list]<br />[list_item icon="'+v[0]+'" color="'+v[1]+'"] '+sel_txt+'[/list_item]<br />[list_item icon="'+v[0]+'" color="'+v[1]+'"] '+sel_txt+'[/list_item]<br />[list_item icon="'+v[0]+'" color="'+v[1]+'"] '+sel_txt+'[/list_item]<br />[/list]');

						}
					});

                    // Add some values to the list box
                    mlb.add('angle-right', ['icon-angle-right', '#FFFFFF']);
					mlb.add('ok', ['icon-ok', '#FFFFFF']);
					mlb.add('plus', ['icon-plus', '#FFFFFF']);
					mlb.add('lightbulb', ['icon-lightbulb', '#FFFFFF']);
					mlb.add('star', ['icon-star', '#FFFFFF']);
					mlb.add('heart', ['icon-heart', '#FFFFFF']);
					mlb.add('warning-sign', ['icon-warning-sign', '#FFFFFF']);
					mlb.add('circle', ['icon-circle', '#FFFFFF']);
					mlb.add('hand-right', ['icon-hand-right', '#FFFFFF']);
					
					

                // Return the new listbox instance
                return mlb;
               
            }
            return null;
        }
    });
	
	tinymce.create('tinymce.plugins.boxstyle', {
        createControl: function(n, cm) {
            switch (n) {
                case 'boxstyle':
                    var mlb = cm.createListBox('boxstyle', {
                        title : 'Messge Box',
                        onselect : function(v) {
							// Set focus to WordPress editor
							tinyMCE.activeEditor.focus(); 
						
							// Get selected text
							var sel_txt = tinyMCE.activeEditor.selection.getContent();
						
							// If no text selected
							if( '' == sel_txt)
								sel_txt="Content";
							if(v == "")
								v= ['exclamation','red'];
						
							tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[messagebox type="'+v[0]+'" color="'+v[1]+'"]your description show here...[/messagebox]');

						}
					});

                    // Add some values to the list box
                    mlb.add('red - no icon', ['no-icon','red']);
				   	mlb.add('red - exclamation', ['icon-exclamation-sign','red']);
                    mlb.add('red - warning', ['icon-warning-sign','red']);
                    mlb.add('red - heart', ['icon-heart','red']);
                    mlb.add('red - star', ['icon-star','red']);
					
					mlb.add('green - no icon', ['no-icon','green']);
					mlb.add('green - exclamation', ['icon-exclamation-sign','green']);
                    mlb.add('green - warning', ['icon-warning-sign','green']);
                    mlb.add('green - heart', ['icon-heart','green']);
                    mlb.add('green - star', ['icon-star','green']);
					
					mlb.add('yellow - no icon', ['no-icon','yellow']);
					mlb.add('yellow - exclamation', ['icon-exclamation-sign','yellow']);
                    mlb.add('yellow - warning', ['icon-warning-sign','yellow']);
                    mlb.add('yellow - heart', ['icon-heart','yellow']);
                    mlb.add('yellow - star', ['icon-star','yellow']);
					
					mlb.add('blue - no icon', ['no-icon','blue']);
					mlb.add('blue - exclamation', ['icon-exclamation-sign','blue']);
                    mlb.add('blue - warning', ['icon-warning-sign','blue']);
                    mlb.add('blue - heart', ['icon-heart','blue']);
                    mlb.add('blue - star', ['icon-star','blue']);
					
					mlb.add('orange - no icon', ['no-icon','orange']);
					mlb.add('orange - exclamation', ['icon-exclamation-sign','orange']);
                    mlb.add('orange - warning', ['icon-warning-sign','orange']);
                    mlb.add('orange - heart', ['icon-heart','orange']);
                    mlb.add('orange - star', ['icon-star','orange']);
					
					mlb.add('gray - no icon', ['no-icon','gray']);
					mlb.add('gray - exclamation', ['icon-exclamation-sign','gray']);
                    mlb.add('gray - warning', ['icon-warning-sign','gray']);
                    mlb.add('gray - heart', ['icon-heart','gray']);
                    mlb.add('gray - star', ['icon-star','gray']);
					
					mlb.add('black - no icon', ['no-icon','black']);
					mlb.add('black - exclamation', ['icon-exclamation-sign','']);
                    mlb.add('black - warning', ['icon-warning-sign','black']);
                    mlb.add('black - heart', ['icon-heart','black']);
                    mlb.add('black - star', ['icon-star','black']);
					

                return mlb;
               
            }
            return null;
        }
    });
	
	tinymce.create('tinymce.plugins.divider', {
        createControl: function(n, cm) {
            switch (n) {
                case 'divider':
                    var mlb = cm.createListBox('divider', {
                        title : 'Divider',
                        onselect : function(v) {
							// Set focus to WordPress editor
							tinyMCE.activeEditor.focus(); 
						
							// Get selected text
							var sel_txt = tinyMCE.activeEditor.selection.getContent();
						
							// If no text selected
							if( '' == sel_txt)
								sel_txt="Content";
							if(v == "")
								v= 'solid';
						
							tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[divider style="'+v+'"]');

						}
					});

                    // Add some values to the list box
                    mlb.add('Solid', 'solid');
					mlb.add('Light-Solid', 'light-solid');
					mlb.add('Dashed', 'dashed');
					mlb.add('Light-dashed', 'light-dashed');
					mlb.add('Dotted', 'dotted');
					mlb.add('Light-Dotted', 'light-dotted');
					mlb.add('Double', 'double');
					

                return mlb;
               
            }
            return null;
        }
    });
	
	tinymce.create('tinymce.plugins.googlemap', {
        init : function(ed, url){
			ed.addCommand('cmd_googlemap', function(){
                tinyMCE.activeEditor.selection.setContent('[googlemap coords="YOUR COORDINATE HERE"]');
            });
            ed.addButton('googlemap', {
                title: 'Google Map',
                image: url+'/images/gmap.png',
                cmd: 'cmd_googlemap'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	
	tinymce.create('tinymce.plugins.reservationform', {
        init : function(ed, url){
			ed.addCommand('cmd_reservationform', function(){
                tinyMCE.activeEditor.selection.setContent('[reservationform]');
            });
            ed.addButton('reservationform', {
                title: 'Reservation Form',
                image: url+'/images/reservation.png',
                cmd: 'cmd_reservationform'
            });
        },
        createControl : function(n, cm){
            return null;
        },
    });
	
	
	tinymce.PluginManager.add('toggle1', tinymce.plugins.toggle1);
	tinymce.PluginManager.add('toggle2', tinymce.plugins.toggle2);
	tinymce.PluginManager.add('tabs', tinymce.plugins.tabs);
	tinymce.PluginManager.add('collapses', tinymce.plugins.collapses);
	tinymce.PluginManager.add('slider', tinymce.plugins.slider);
	tinymce.PluginManager.add('leftquote', tinymce.plugins.leftquote);
	tinymce.PluginManager.add('rightquote', tinymce.plugins.rightquote);
	tinymce.PluginManager.add('contactform', tinymce.plugins.contactform);
	tinymce.PluginManager.add('reservationform', tinymce.plugins.reservationform);
	tinymce.PluginManager.add('googlemap', tinymce.plugins.googlemap);
	tinymce.PluginManager.add('columns', tinymce.plugins.columns);
	tinymce.PluginManager.add('buttons', tinymce.plugins.buttons);
	tinymce.PluginManager.add('list', tinymce.plugins.list);
	tinymce.PluginManager.add('boxstyle', tinymce.plugins.boxstyle);
	tinymce.PluginManager.add('divider', tinymce.plugins.divider);
	
	
})();

