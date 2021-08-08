// ================== NOTE - CUSTOM JS ==================

$(function() {

  // main summernote with custom placeholder
  var $placeholder = $('.placeholder');
  $('#summernote').summernote({
    height: 300,
    codemirror: {
        mode: 'text/html',
        htmlMode: true,
        lineNumbers: true,
        theme: 'monokai'
    },
    callbacks: {
      onInit: function() {
        $placeholder.show();
            }
     
         }
    });
});