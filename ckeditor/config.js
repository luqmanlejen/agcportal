/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {

    config.toolbarGroups =
            [
                {name: 'document', groups: ['mode']},
                {name: 'clipboard', groups: ['clipboard', 'undo']},
                {name: 'editing'},
                {name: 'basicstyles'},
                {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
                {name: 'links'},
                {name: 'insert'},
                {name: 'styles'},
                {name: 'colors'},
                {name: 'tools'}
            ];

    config.removeButtons = 'Save,NewPage,Preview,Print,Paste,PasteFromWord,Strike,Subscript,Superscript,Blockquote,Language,Anchor,Flash,Smiley,SpecialChar,ShowBlocks';

    config.extraPlugins = "lineutils,widget,mjAccordion,mjTab";

    config.forcePasteAsPlainText = true;
    config.enterMode = CKEDITOR.ENTER_BR;
    config.filebrowserBrowseUrl = 'ckeditor/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'ckeditor/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = 'ckeditor/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
