import $ from 'jquery';
let sidebarStatus = localStorage.getItem('sidebar_status');

$(document).ready(function(){
    if(sidebarStatus==='hide'){
        hideSidebar()
    }
})

function hideSidebar(){
    $("body").addClass("sidebar-toggled");
    $("#accordionSidebar").addClass("toggled");
    sidebarStatus = 'hide'
    localStorage.setItem('sidebar_status', sidebarStatus)
}

function showSidebar(){
    $("body").removeClass("sidebar-toggled");
    $("#accordionSidebar").removeClass("toggled");
    sidebarStatus = 'show'
    localStorage.setItem('sidebar_status', sidebarStatus)
}
// Toggle the side navigation
$("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    if ($(".sidebar").hasClass("toggled")) {
        showSidebar()
    }else{
        hideSidebar()
    }
});

// Close any open menu accordions when window is resized below 768px
$(window).resize(function() {
if ($(window).width() < 768) {
  $('.sidebar .collapse').toggle('hide');
};

// Toggle the side navigation when window is resized below 480px
if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
  $("body").addClass("sidebar-toggled");
  $(".sidebar").addClass("toggled");
  $('.sidebar .collapse').toggle('hide');
};
});

// Prevent the content wrapper from scrolling when the fixed side navigation hovered over
$('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
if ($(window).width() > 768) {
  var e0 = e.originalEvent,
    delta = e0.wheelDelta || -e0.detail;
  this.scrollTop += (delta < 0 ? 1 : -1) * 30;
  e.preventDefault();
}
});

// Scroll to top button appear
$(document).on('scroll', function() {
var scrollDistance = $(this).scrollTop();
if (scrollDistance > 100) {
  $('.scroll-to-top').fadeIn();
} else {
  $('.scroll-to-top').fadeOut();
}
});

// Smooth scrolling using jQuery easing
$(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
});
