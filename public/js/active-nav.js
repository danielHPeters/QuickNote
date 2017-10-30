'use strict';
$(document).ready(function () {
  var pathname = window.location.pathname;
  $('#nav-list').find('a[href="' + pathname + '"]').parent().addClass('active');
});
