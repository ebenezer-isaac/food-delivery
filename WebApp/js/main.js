/**
* Template Name: Appland - v2.0.0
* Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
!(function($) {
  "use strict";

  // Toggle .header-scrolled class to #header when page is scrolled
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
  }

  // Smooth scroll for the navigation menu and links with .scrollto classes
  $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      e.preventDefault();
      var target = $(this.hash);
      if (target.length) {
        var scrollto = target.offset().top;
        var scrolled = 20;
        if ($('#header').length) {
          scrollto -= $('#header').outerHeight()
          if (!$('#header').hasClass('header-scrolled')) {
            scrollto += scrolled;
          }
        }
        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }
        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');
        if ($(this).parents('.nav-menu, .mobile-nav').length) {
          $('.nav-menu .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Mobile Navigation
  if ($('.nav-menu').length) {
    var $mobile_nav = $('.nav-menu').clone().prop({
      class: 'mobile-nav d-lg-none'
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
    $('body').append('<div class="mobile-nav-overly"></div>');
    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
      $('.mobile-nav-overly').toggle();
    });
    $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
      e.preventDefault();
      $(this).next().slideToggle(300);
      $(this).parent().toggleClass('active');
    });
    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
      }
    });
  } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
  }

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

})(jQuery);

$('.message a').click(function ()
{
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

function transfer_data()
{
    var x = document.getElementById("email").value;
    document.getElementById("emailid").value = x;
}

$(".recaptcha_form").submit(function (event) {
    var recaptcha = $("#g-recaptcha-response").val();
    if (recaptcha === "")
    {
        event.preventDefault();
        $(".custom_modal_recaptcha").show();
    } else
    {
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "otp";
        var textbox = document.createElement("input");
        textbox.type = "hidden";
        textbox.value = document.getElementById("emailid").value;
        textbox.name = "emailadd";
        form.appendChild(textbox);
        document.body.appendChild(form);
        form.submit();
    }
    event.preventDefault();
    $.post("grecaptcha.php", {
        "secret": "6LcmWcoUAAAAADP_fXbw-uqDMKDQwmxtbAWtNHFX",
        "response": recaptcha
    }, function (ajaxResponse) {
        console.log(ajaxResponse);
    });

});

function check_password()
{
    var np = document.getElementById("newpass");
    var cp = document.getElementById("conpass");

    if (np.value === cp.value)
    {
        cp.setCustomValidity("");
    } else
    {
        cp.setCustomValidity("Passwords don't match");
    }
    np.onchange = check_password;
    cp.onkeyup = check_password;
}

//for close modal recaptcha
function closemodalrecaptcha()
{
    document.getElementById("modalrecaptcha").style.display = "none";
}

function showPassNew() {
    var x = document.getElementById("newpass");
    var y = document.getElementById("eyen");
    if (x.type === "password") {
        x.type = "text";
        y.innerHTML = "<i class='fa fa-eye'></i>";
    } else {
        x.type = "password";
        y.innerHTML = "<i class='fa fa-eye-slash'></i>";
    }
}

function showPassConf() {
    var x = document.getElementById("conpass");
    var y = document.getElementById("eyec");
    if (x.type === "password") {
        x.type = "text";
        y.innerHTML = "<i class='fa fa-eye'></i>";
    } else {
        x.type = "password";
        y.innerHTML = "<i class='fa fa-eye-slash'></i>";
    }
}