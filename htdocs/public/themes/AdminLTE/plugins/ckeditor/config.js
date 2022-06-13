/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'en';
	config.defaultLanguage = 'en';
	config.extraPlugins = 'youtube';
	// config.uiColor = '#AADC6E';
	config.image_previewText = ' ';

	config.filebrowserBrowseUrl = '/admin/files/ckeditor';
	config.filebrowserImageBrowseUrl = '/admin/files/ckeditor?mode=image';
	config.filebrowserFlashBrowseUrl = '/admin/files/ckeditor?mode=flash';
};