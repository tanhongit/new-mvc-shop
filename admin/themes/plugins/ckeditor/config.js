/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    config.language = 'vi';
    config.enterMode = CKEDITOR.ENTER_BR;
    // config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = '/new-mvc-shop/admin/themes/plugins/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '/new-mvc-shop/admin/themes/plugins/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = '/new-mvc-shop/admin/themes/plugins/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = '/new-mvc-shop/admin/themes/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/new-mvc-shop/admin/themes/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/new-mvc-shop/admin/themes/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};

