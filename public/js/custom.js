
// Site preloader
jQuery(document).ready(function($) {
    // site preloader -- also uncomment the div in the header and the css style for #preloader
    $(window).load(function(){
        $('#preloader').fadeOut('slow',function(){$(this).remove();});
    });
});


// Preview uploaded image
function previewImage(event){
    $("#preview").attr("src", URL.createObjectURL(event.target.files[0]));
};
