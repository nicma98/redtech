function query(selector) {
    return document.querySelector(selector);
};
function queryAll(selector) {
    return document.querySelectorAll(selector);
};
function is(selector) {
    if (query(selector) == undefined) {
        return false;
    } else {
        return true;
    }
};
function resetHeight(selector){
    var maxHeight = 0
    jQuery(selector).each((index, element) => {
        var heightElement = jQuery(element).height()
        if (heightElement > maxHeight) {
            maxHeight = jQuery(element).height()
        }
    });
    jQuery(selector).each((index, element) => {
        jQuery(element).css("height", maxHeight + "px")
    });
};
jQuery(window).load(function () {
    if (is('.sec-caracteristicas-microbit')){
        jQuery('.btn-caracteristica').click(function () {
            var item = jQuery('.btn-caracteristica').index(jQuery(this));
            jQuery('.caracteristica-microbit').hide(1, 'linear', function(){
                jQuery('.caracteristica-microbit').eq(item).show();
            });
        });
    };
    jQuery('.slider-solution-computo').bxSlider({
        auto: false,
        pause: 1000,
        mode: 'fade',
        captions: true,
        controls: true
    });
    jQuery('.items-tips-aulas .slider-aulas-primaria').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<a class="slick-prev-arrow" href="">Prev</a>',
        nextArrow: '<a class="slick-next-arrow" href="">Next</a>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    jQuery('.items-tips-aulas .slider-aulas-secundaria').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<a class="slick-prev-arrow" href="">Prev</a>',
        nextArrow: '<a class="slick-next-arrow" href="">Next</a>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    jQuery('.slider-proyectos-makerspaces').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<a class="slick-prev-arrow" href="">Prev</a>',
        nextArrow: '<a class="slick-next-arrow" href="">Next</a>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    jQuery('.slider-logos-clientes').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<a class="slick-prev-arrow" href="">Prev</a>',
        nextArrow: '<a class="slick-next-arrow" href="">Next</a>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    jQuery('div.content-items-ambientes').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<a class="slick-prev-arrow" href="">Prev</a>',
        nextArrow: '<a class="slick-next-arrow" href="">Next</a>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    jQuery('.video-full-adap').fitVids();
    if (is('.get-call')){
        jQuery('.get-call').on('click', () => {
            jQuery('.llamado-accion').slideToggle("slow", () => {
            });
        });
    }
    jQuery("button.hamburger").on("click", ()=>{
        jQuery("button.hamburger").toggleClass("is-active")
        jQuery("nav.menu-principal").toggle()
    })
    jQuery("div.items-entornos").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 4000,
        prevArrow: '',
        nextArrow: '',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    resetHeight("div.items-entornos div.item-entorno");
    jQuery("div.items-sec-portada").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '',
        nextArrow: '',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    resetHeight("div.items-sec-portada div.item-sect");
    jQuery("div.slider-frases").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '',
        nextArrow: ''
    });
    jQuery("ul.ul-menu-principal li.menu-item").on("click", (e)=>{
        var sub_menu = e.currentTarget.children.length
        if (sub_menu > 1){
            jQuery(e.currentTarget.children[1]).toggle()
        }
    })
});
jQuery("form.wpcf7-form textarea").attr('rows', 5);