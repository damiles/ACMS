tinyMCEPopup.requireLangPack();
tinyMCEPopup.onInit.add(onLoadInit);
 
var editor;
 
function saveContent() {
tinyMCEPopup.editor.setContent(editor.getCode());
tinyMCEPopup.close();
}
 
function onLoadInit() {
tinyMCEPopup.resizeToInnerSize();
 
// Remove Gecko spellchecking
if (tinymce.isGecko)
document.body.spellcheck = tinyMCEPopup.editor.getParam("gecko_spellcheck");
 
document.getElementById('htmlSource').value = tinyMCEPopup.editor.getContent({ source_view: true });
 
if (tinyMCEPopup.editor.getParam("theme_advanced_source_editor_wrap", true)) {
document.getElementById('wraped').checked = true;
}
 
resizeInputs();
 
editor = CodeMirror.fromTextArea('htmlSource', {
path: 'js/codemirror/',
parserfile: ["parsexml.js"],
stylesheet: "js/css/codemirror/xmlcolors.css",
textWrapping: true,
lineNumbers: true
});
}
 
function toggleWordWrap(elm) {
editor.setTextWrapping(elm.checked);
}
 
function resizeInputs() {
 
var vp = tinyMCEPopup.dom.getViewPort(window), el;
 
el = document.getElementById('htmlSource');
 
if (el) {
el.style.width  = (vp.w - 20) + 'px';
el.style.height = (vp.h - 65) + 'px';
}
 
}