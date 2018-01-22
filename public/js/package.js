
  var c = new Client();
  
  $(document).on('click', 'a[href="#avd"]', function (event) {
    event.preventDefault();
    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top-140
  }, 500);
  });


$(document).ready(function(){
  $('.lightgallery').lightGallery({
    mode: 'lg-fade',
    thumbnail:false,
    animateThumb: false,
    showThumbByDefault: false,
    autoplayControls: false,
    share: false,
    zoom: false,
    download: false,
    pager: false,
    loadVimeoThumbnail: true,
    vimeoThumbSize: 'thumbnail_medium',
  });
});

$('[href="#photos"]').on('shown.bs.tab', function (e) {
  e.preventDefault();
  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: 0
  });
})
$('[href="#videos"]').on('shown.bs.tab', function (e) {
  e.preventDefault();
  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: 0
  });
})
$(function(){
  var stateObj = { page: 1 };
   window.history.pushState(stateObj, "adventure");
})

window.onpopstate = function() {
      window.location = "/adventures";
  }