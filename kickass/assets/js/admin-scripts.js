// Get editor CSS
function getCustomEditorContent(){
	document.getElementById("ka_custom_editor_box").value = document.getElementById("ka_custom_editor_box_editable").innerText;
}

// Implement Highlight JS
jQuery(document).ready(function() {
	var c = jQuery(".ka-custom-editor-section pre code");
	c.each(function(i, block) {
		hljs.highlightBlock(block);
		hljs.lineNumbersBlock(block);
	});

	// add tab spaces
    c.keydown(function (e) {
      e = e || window.event;
      var keyCode = e.keyCode || e.which;

 	  if(e.keyCode == 9 || e.keyCode == 9 && e.shiftKey) {
 	  		console.log("key", e.keyCode);
            document.execCommand ( 'styleWithCSS', true, null );
            document.execCommand ( 'indent', true, null );

            var editor = document.getElementById("ka_custom_editor_box_editable");
            var doc = editor.ownerDocument.defaultView;
            var sel = doc.getSelection();
            var range = sel.getRangeAt(0);
            var tabNode = document.createTextNode("    ");

	 		// now insert four non-breaking spaces for the tab key
	 		range.insertNode(tabNode);
	        range.setStartAfter(tabNode);
	        range.setEndAfter(tabNode);
	        sel.removeAllRanges();
	        sel.addRange(range);
			e.preventDefault();
        }
    });
});