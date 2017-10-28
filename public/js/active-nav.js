'use strict'
$(document).ready(function () {
  let pathname = window.location.pathname
  $('#nav-list').find('a[href="' + pathname + '"]').parent().addClass('active')
})
