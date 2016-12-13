
jQuery(document).ready(function($){
    //this is used for the video effect only
    if( $('.cd-bg-video-wrapper').length > 0 ) {
        var videoWrapper = $('.cd-bg-video-wrapper'),
            mq = window.getComputedStyle(document.querySelector('.cd-bg-video-wrapper'), '::after').getPropertyValue('content').replace(/"/g, "").replace(/'/g, "");
        if( mq == 'desktop' ) {
            // we are not on a mobile device
            var	videoUrl = videoWrapper.data('video'),
                video = $('<video loop><source src="'+videoUrl+'.mp4" type="video/mp4" /><source src="'+videoUrl+'.webm" type="video/webm" /></video>');
            video.appendTo(videoWrapper);
            video.get(0).play();
        }
    }

    $('stars').on('hover', function(){
        $(this).trigger('click');
    });

    if( $('.cd-stretchy-nav').length > 0 ) {
        var stretchyNavs = $('.cd-stretchy-nav');

        stretchyNavs.each(function(){
            var stretchyNav = $(this),
                stretchyNavTrigger = stretchyNav.find('.stretchy-nav-bg');

            stretchyNavTrigger.on('click', function(event){
                event.preventDefault();
                stretchyNav.toggleClass('nav-is-visible');
            });
        });

        $(document).on('click', function(event){
            ( !$(event.target).is('.stretchy-nav-bg') && !$(event.target).is('.stretchy-nav-bg span') ) && stretchyNavs.removeClass('nav-is-visible');
        });
    }

});

function visibleLogin() {
    $("#login-form").show();
}

function exitLogin() {
    $("#login-form").hide();
}

function visibleCreateAcc() {
    $("#createAcc-form").show();
}

function exitCreateAcc() {
    $("#createAcc-form").hide();
}

function exitUser() {
    session_destroy();
}

function openAnswerForm($idRev) {
    $('#form'+ $idRev).show();
}

$( function() {
    slider = $('#slider-range');

    slider.slider({
        range: true,
        min: 0,
        max: 150,
        values: [ slider.attr('min'), slider.attr('max') ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            var string = "searchRestaurants.php?priceMin=" + ui.values[0] + "&priceMax=" + ui.values[1];
            console.log(event);
        },
        stop: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            var string = "searchRestaurants.php?priceMin=" + ui.values[0] + "&priceMax=" + ui.values[1];
            console.log(event);
            minV=ui.values[0];
            maxV=ui.values[1];
            location.href=string;
        }
    });
    console.log(minValue());
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );


});

function minValue() {
    return  $( "#slider-range" ).slider( "values", 0 );
}

function maxValue() {
    return  $( "#slider-range" ).slider( "values", 1 );
}