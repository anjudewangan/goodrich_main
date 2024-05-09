/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
var base_url = "http://localhost/environmental/";
CKEDITOR.editorConfig = function( config ) {
	
	config.filebrowserBrowseUrl = base_url+'ckeditor/kcfinder-master/browse.php?opener=ckeditor&type=files'; 
	config.filebrowserImageBrowseUrl = base_url+'ckeditor/kcfinder-master/browse.php?opener=ckeditor&type=images'; 
	config.filebrowserFlashBrowseUrl = base_url+'ckeditor/kcfinder-master/browse.php?opener=ckeditor&type=flash'; 
	config.filebrowserUploadUrl = base_url+'ckeditor/kcfinder-master/upload.php?opener=ckeditor&type=files'; 
	config.filebrowserImageUploadUrl = base_url+'ckeditor/kcfinder-master/upload.php?opener=ckeditor&type=images'; 
	config.filebrowserFlashUploadUrl = base_url+'ckeditor/kcfinder-master/upload.php?opener=ckeditor&type=flash';
	
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
