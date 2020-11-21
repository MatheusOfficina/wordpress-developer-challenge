
// videos-list
$('.videos-list-carousel').owlCarousel({
    loop: false,
    nav: false,
    dots: true,
    margin: 10,
    navText: [
        '<i class="glyphicon glyphicon-menu-left"></i>',
        '<i class="glyphicon glyphicon-menu-right"></i>'
    ],
    responsive: {
        0: {
            items: 2,
            stagePadding: 20,
        },
        768: {
            items: 1,
            center: true,
            stagePadding: 100,
        },
        992:{
            items: 4,
            stagePadding: 120,
        },
        1440: {
            items: 4,
            stagePadding: 210,
        },
        1880: {
            items:4,
            stagePadding: 410,
        }
    }
});

// open menu

$('.mainmenu').click(function(){
    $('.hidden-menu').fadeToggle();
    $(this).toggleClass('open-menu');
 });
