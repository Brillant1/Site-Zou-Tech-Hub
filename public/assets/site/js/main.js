$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1.03
        },
        768:{
            items:2
        },
        820:{
            items:2
        },
        1200:{
            items:3
        },
        1360:{
            items:3
        }
    }
});

window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        // $recaptcha.setAttribute("required", "required");
    }
};


$(function() {


    $("nav  a").click(function() {
      //**Add class active to current clicked menu item  and remove class active from other menu item**//
      $(this).addClass('active').parent().siblings().children().removeClass('active');
      //** Smooth scroll Logic **?
    //   if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    //     var target = $(this.hash);
    //     target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    //     if (target.length) {
    //       $('html, body').animate({
    //         scrollTop: target.offset().top - 50
    //       }, 20);
    //       return false;
    //     }
    //   }
    });

    $(".menu a, nav  a").click(function() {
        //**Add class active to current clicked menu item  and remove class active from other menu item**//
        //** Smooth scroll Logic **?
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top - 50
            }, 20);
            return false;
          }
        }
    });

    $('.newsletter-form').submit(function(e){
        e.preventDefault();
        let data = $('.newsletter-form').serialize();

        $.ajax({
            url: "/subscribe-newsletter",
            method: "POST",
            data: data,
            beforeSend: function(){
                $(".newsletter-btn").prop('disabled', true);
            },
            success: function(response){
                $(".msg-newsletter").html(response.message);
                $(".msg-newsletter").css('display', 'flex');
                $(".newsletter-form input").val("");

                setTimeout(function() {
                    $(".msg-newsletter").css('display', 'none');
                }, 5000);
            },
            complete: function(){
                $(".newsletter-btn").prop('disabled', false);
            },
        })
    });

    $('#contact-form').submit(function(e){
        e.preventDefault();
        let data = $('#contact-form').serialize();

        $.ajax({
            url: "/contact",
            method: "POST",
            data: data,
            beforeSend: function(){
                $(".contact-btn").prop('disabled', true);
            },
            success: function(response){
                $(".msg-contact").html(response.message);
                $(".msg-contact").css('display', 'flex');
                $("#contact-form input").val("");
                $("#contact-form select").val("");
                $("#contact-form textarea").val("");


                setTimeout(function() {
                    $(".msg-contact").css('display', 'none');
                }, 5000);
            },
            complete: function(){
                $(".contact-btn").prop('disabled', false);
            },
        })
    });

  });
