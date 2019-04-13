$(document).ready(function(){
    'use strict';
    //alert('goo');
    $('.nav-item').on('click', function(){
        $(this).children('.nav-link').addClass('active').parent().siblings().children('.nav-link').removeClass('active');
        $('#userRole').val($(this).data('role'));
    });
    
});
