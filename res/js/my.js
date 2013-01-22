$(document).ready(function () {
    $('.carousel').carousel({
        interval: 10000
    });

    $('.carousel').carousel('cycle');
});

$(document).ready(function() {
  $('#gallery a').fancybox({
    overlayOpacity: .9,
    overlayColor: '#000',
    openEffect  : 'elastic',
    closeEffect : 'elastic',
    showNavArrows        : true,
    closeBtn        : false,
    helpers     : { 
        title   : { type : 'inside' },
        buttons : {}
    }
  });
});

jQuery(document).ready(function() {
    $("ul.sf-menu").superfish({ 
        animation: {
            height:'show'
        },   // slide-down effect without fade-in 
        delay:     100               // 1.2 second delay on mouseout 
    }); 
});

 