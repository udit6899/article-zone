jQuery(document).ready(function($){

    $(".menu-area").sticky({
        topSpacing:0
    });

    $("body").scrollspy({
        target: ".navbar-collapse",
        offset: 95,
    });
});

// Site preloader
jQuery(document).ready(function($) {
    // site preloader -- also uncomment the div in the header and the css style for #preloader
    $(window).load(function(){
        $('#preloader').fadeOut('slow',function(){$(this).remove();});
    });
});

// Allow user to add the post to favourite list
function addToFavourite() {
    document.getElementById('add-to-favourite-form').submit();
}

// Remove post from favourite list
function removeFromFavourite() {
    document.getElementById('remove-from-favourite-form').submit();
}
