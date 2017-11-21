/* IconSetField
===================================================================================================================== */

import $ from 'jquery';

$(function() {
  
  $('.field.iconset').each(function() {
    
    var $self = $(this);
    var $list = $self.find('ul.iconset');
    
    var maxHeight = $list.data('max-height');
    
    if (maxHeight) {
      $list.css('max-height', maxHeight);
      $list.css('overflow-y', 'scroll');
    }
    
  });
  
});
