jQuery(document).ready(function($){

    $(".menu-area").sticky({
        topSpacing:0
    });

    $("body").scrollspy({
        target: ".navbar-collapse",
        offset: 95,
    });

    var userFeed = new Instafeed({
        get: 'user',
        limit: "8",
        userId: 11175379,
        accessToken: '11175379.467ede5.f5ec3337edc941678b80d5eac0310213',
        template: '<a href="{{link}}" target="_blank"><images src="{{image}}" /><div class="instagram-icon"><i class="fa fa-instagram"></i></div></a>'
    });
    userFeed.run();

});

// Site preloader
jQuery(document).ready(function($) {
    // site preloader -- also uncomment the div in the header and the css style for #preloader
    $(window).load(function(){
        $('#preloader').fadeOut('slow',function(){$(this).remove();});
    });
});
