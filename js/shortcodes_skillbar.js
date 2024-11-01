jQuery(document).ready(function ($) {
    $('.skillbar').each(function () {
        $(this).find('.skillbar-bar').animate({
            width: $(this).attr('data-percent')
        }, 1500);
    });

    $(".skillbar-title em").html(function(index, old) {
        return old.replace(/(\b\w+)$/, '<span>$1</span>');
    });
});