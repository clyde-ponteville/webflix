"use strict"

$(document).ready(function(){

    var lienActive = $(".nav-tabs li a");

    var sign = $('#signin');
    var create = $('#create').css("display", "none");

    var linkSign = $('#linkSign');
    linkSign.addClass('active');
    var linkCreate = $('#linkCreate');
    


    lienActive.on("click", function(){

        switch ($(this).attr('href')) {
            case '#connexion':
                create.css("display", "none");
                linkCreate.removeClass('active');

                sign.css("display", "block");
                linkSign.addClass('active');
                
                break;
            case '#sign_in':
                sign.css("display", "none");
                linkSign.removeClass('active');                

                create.css("display", "block");
                linkCreate.addClass('active');
                break;
        
            default:
                break;
        }
    })
    
    var pathname = window.location.pathname;
    pathname = pathname.substr(15);
    if (pathname == 'movie_single.php') {
        bgYoutube();        
    }

});

function bgYoutube(){

    var bg = $('#bg');
    var imageUrl = $('iframe');

    imageUrl = imageUrl.attr("src");

    imageUrl = imageUrl.substr(30, 11);


    bg.css({       
        "background":'url(https://img.youtube.com/vi/' + imageUrl + '/sddefault.jpg)',
        backgroundSize: "cover",
        "background-position": "center center"        
    });    
}