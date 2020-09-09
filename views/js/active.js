(function ($) {
    'use strict';

    var browserWindow = $(window);

    // :: 1.0 Preloader Active Code
    browserWindow.on('load', function () {
        $('.preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // :: 2.0 Nav Active Code
    if ($.fn.classyNav) {
        $('#nikkiNav').classyNav();
    }

    // :: 3.0 Sliders Active Code
    if ($.fn.owlCarousel) {
        var welcomeSlide = $('.hero-post-slides');

        welcomeSlide.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut'
        });

        welcomeSlide.on('changed.owl.carousel', function (event) {
            if (!event.namespace || event.property.name != 'position') return
            $('.page-count').html(event.relatedTarget.relative(event.item.index) + 1 + '<span>' + '/' + event.item.count + '</span>');
        })

        welcomeSlide.on('translate.owl.carousel', function () {
            var slideLayer = $("[data-animation]");
            slideLayer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });

        welcomeSlide.on('translated.owl.carousel', function () {
            var slideLayer = welcomeSlide.find('.owl-item.active').find("[data-animation]");
            slideLayer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });

        $("[data-delay]").each(function () {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });

        $("[data-duration]").each(function () {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });
    }

    // :: 4.0 ScrollUp Active Code
    if ($.fn.scrollUp) {
        browserWindow.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-angle-up"></i>'
        });
    }

    // :: 5.0 CounterUp Active Code
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    // :: 6.0 Sticky Active Code
    if ($.fn.sticky) {
        $(".nikki-main-menu").sticky({
            topSpacing: 0
        });
    }

    // :: 7.0 Tooltip Active Code
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    // :: 8.0 ScrollDown Active Code
    $("#scrollDown").on('click', function () {
        $('html, body').animate({
            scrollTop: $("#about").offset().top - 85
        }, 1500);
    });

    // :: 9.0 prevent default a click
    $('a[href="#"]').on('click', function ($) {
        $.preventDefault();
    });

    // :: 10.0 wow Active Code
    if (browserWindow.width() > 767) {
        new WOW().init();
    }

})(jQuery);
// cường nha
window.onscroll = function() {roll()};
var header = document.getElementById("profile");
var background = document.getElementById("img-background");
var sticky = header.offsetTop - 70;

function roll() {
  if (window.pageYOffset > sticky) {
    background.classList.add("sticky-background");
    header.classList.add("sticky");
    header.classList.remove("position-absolute");
  } else {
    header.classList.add("position-absolute");
    header.classList.remove("sticky");
  }
}
// cường edit
function myFunction() {
    var btn = document.getElementById("mybtn");
    var x = document.getElementById("myInput").value;
    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    if (x == null || x == "") {
        document.getElementById("demo").innerHTML = "The name cannot be empty!";
        btn.disabled = true;
    } else {
        if (format.test(x) == true) {
            document.getElementById("demo").innerHTML = "The name accepts only letters and spaces";
            btn.disabled = true;
        }
        else {
        document.getElementById("demo").innerHTML = "valid name";
        btn.disabled = false;
    }
    }

}
$(document).ready(function(){
    // edit avatar
    var btn_edit = document.getElementById("btn-edit");
    var edit = document.getElementById("edit");
    // edit introduce
    var btn_introduce = document.getElementById("btn-introduce");
    var introduce = document.getElementById("introduce");
    // edit name
    var btn_name = document.getElementById("btn-name");
    var name = document.getElementById("name");
    // edit background
    var btn_background = document.getElementById("btn-background");
    var background = document.getElementById("background");

    $(btn_name).click(function(){
        $(name).toggle("linear");
      });
      $(btn_introduce).click(function(){
        $(introduce).toggle("linear");
      });
    $(btn_edit).click(function(){
      $(edit).toggle("linear");
    });
    $(btn_background).click(function(){
        $(background).toggle("linear");
      });
  });