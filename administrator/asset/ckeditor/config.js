/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	 config.uiColor = '#cececa';
	//config.uiColor = 'Violet';
	config.contentsLangDirection = 'rtl';
	config.language = 'fa';
	config.defaultLanguage = 'fa';
	config.dialog_buttonsOrder = 'rtl';
	
	config.dialog_backgroundCoverColor = 'rgb(240, 220, 253)';
	config.dialog_backgroundCoverOpacity = 0.4;
	config.undoStackSize = 750;	
        
	config.filebrowserImageUploadUrl = '../';
	//config.filebrowserWindowFeatures = 'location=no,menubar=no,toolbar=no,dependent=yes,minimizable=no,modal=yes ,alwaysRaised=yes,resizable=yes,scrollbars=yes';
	
	//config.filebrowserWindowWidth = 750;
        //config.filebrowserWindowHeight = '50%';
	
	//config.fontSize_sizes = '16/16px;24/24px;48/48px;';
	//config.fontSize_sizes = '12px;2.3em;130%;larger;x-small';
	//config.fontSize_sizes = '12 Pixels/12px;Big/2.3em;30 Percent More/130130%;Bigger/larger;Very Small/x-small';
	
	config.font_names =
            'Arial/Arial, Helvetica, sans-serif;' +
            'Times New Roman/Times New Roman, Times, serif;' +
            'BMitra;'    +
            'BNazanin;'    +
            'BYekan;';
  
	   
			
	config.toolbarGroups = [
		{ name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },	  
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },		
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'tools' },
		{ name: 'colors' },
		{ name: 'styles' },				
		{ name: 'others' }   
	];
        
};
