// $('label.tree-toggler li a').click(function(){
//     $(this).next('ul').slideToggle('500');
//     $(this).find('i').toggleClass('fa-plus fa-minus');
// });

$(document).ready(function () {
    $('label.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
				$(this).find('i').toggleClass('fa-plus fa-minus');
    });
});

