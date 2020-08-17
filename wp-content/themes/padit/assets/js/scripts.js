(function ($) {

    var ajaxurl = admin_url + 'admin-ajax.php';

    $(function () {

        $('.footer-search-form').submit(function (e) {
            e.preventDefault();
            var form = $(".footer-search-form").serialize();
            var data = {
                action: "padit_search",
                data: form,
                security: security_search
            };
            $.post(ajaxurl, data, function (response) {
                var obj = $.parseJSON(response);
                if (obj.answer =='true') {
                    if(obj.url!=''){
                        window.location.href = obj.url;
                    }
                }
            });
        });

        $('.header-search-form').submit(function (e) {
            e.preventDefault();
            var form = $(".header-search-form").serialize();
            var data = {
                action: "padit_search",
                data: form,
                security: security_search
            };
            $.post(ajaxurl, data, function (response) {
                var obj = $.parseJSON(response);
                if (obj.answer =='true') {
                    if(obj.url!=''){
                        window.location.href = obj.url;
                    }
                }
            });
        });

        $('select').select2();

        jQuery(window).load(function () {
            var url = window.location.hash;
            if (url) {
                jQuery('html, body').animate({scrollTop: jQuery(url).offset().top}, 1000);
            }
        });

        var ishome = is_home;
        var homeurl = home_url;
        var ajaxurl = admin_url + 'admin-ajax.php';
        var datamap = data_map;
        // HEADER fixed
        var alto = {val: 0};
        alto.val = parseInt(($("header.site-header").height()));
        $("header.site-header").css('min-height', alto.val + 'px');

        var footer_logo_left = parseInt($('.footer-options .row').position().left);
        $(".footer-contact-form").css('margin-left', footer_logo_left + 'px');
        $(window).resize(function () {
            var footer_logo_left = parseInt($('.footer-options .row').position().left);
            $(".footer-contact-form").css('margin-left', footer_logo_left + 'px');
        });

        $('.search-form button').click(function (e) {
            if ($(this).hasClass('closed-search')) {
                $(this).removeClass('closed-search');
                $(this).parent().find('.input-search-field').addClass('open');
                e.preventDefault();
            } else {
                if ($(this).parent().find('.input-search-field').val() == '') {
                    $(this).addClass('closed-search');
                    $(this).parent().find('.input-search-field').removeClass('open');
                    e.preventDefault();
                }
            }
        });

        if ($('.slide-herramientas-desarrollo').hasClass('slide-herramientas-desarrollo')) {
            $('.slide-herramientas-desarrollo').owlCarousel({
                margin: 25,
                responsiveClass: true,
                nav: true,
                items: 3,
                loop: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    575: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    }
                }
            });
        }

        $('.pretty-embed').prettyEmbed();

        if ($('.slide-herramientas-planificacion').hasClass('slide-herramientas-planificacion')) {
            $('.slide-herramientas-planificacion').owlCarousel({
                margin: 25,
                responsiveClass: true,
                nav: true,
                items: 3,
                loop: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    575: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    }
                }
            });
        }

        if ($('.slide-formacion-cursos').hasClass('slide-formacion-cursos')) {
            $('.slide-formacion-cursos').owlCarousel({
                margin: 25,
                responsiveClass: true,
                nav: true,
                items: 3,
                loop: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    575: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    }
                }
            });
        }

        if ($('.slide-territorios-home').hasClass('slide-territorios-home')) {
            $('.slide-territorios-home').owlCarousel({
                margin: 15,
                responsiveClass: true,
                nav: true,
                items: 4,
                loop: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    575: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 4,
                    }
                }
            });
        }

        if ($('.noticias-owl-carousel').hasClass('owl-carousel')) {
            $('.noticias-owl-carousel').owlCarousel({
                items: 3,
                loop: false,
                margin: 40,
                nav: false,
                autoHeight: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    }
                }
            });
            /*var numItems = 100 / $('.row-noticias-home .owl-dots button').length;
            $(".row-noticias-home .owl-dots button").css('flex', '0 0 ' + numItems + '%');
            $(".row-noticias-home .owl-dots button").css('-ms-flex', '0 0 ' + numItems + '%');
            $(".row-noticias-home .owl-dots button").css('width', numItems + '%');*/
        }

        if ($('.slide-container').hasClass('slide-container')) {
            $('.slide-container').owlCarousel({
                margin: 0,
                responsiveClass: true,
                nav: true,
                items: 1,
                loop: true,
                autoplay: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
            });
            $('.slide-container .owl-nav, .slide-container .owl-dots').wrapAll("<div class='owl-controls'></div>");
            $('.owl-controls').wrapAll("<div class='owl-controls-imagen-portada'></div>");
        }

        if ($('.slide-historias-container').hasClass('slide-historias-container')) {
            $('.slide-historias-container').owlCarousel({
                margin: 0,
                responsiveClass: true,
                nav: true,
                items: 1,
                loop: true,
                autoplay: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
            });
            $('.slide-historias-container .owl-nav, .slide-historias-container .owl-dots').wrapAll("<div class='owl-controls'></div>");
            $('.slide-historias-container .owl-controls').wrapAll("<div class='owl-controls-imagen-portada'></div>");
        }


        if ($('.slide-territorio-container').hasClass('owl-carousel')) {
            $('.slide-territorio-container').owlCarousel({
                margin: 0,
                responsiveClass: true,
                nav: true,
                items: 1,
                loop: false,
                autoplay: true,
            });
            $('.slide-territorio-container .owl-nav, .slide-territorio-container .owl-dots').wrapAll("<div class='owl-controls'></div>");
            $('.slide-territorio-container .owl-controls').wrapAll("<div class='owl-controls-imagen-portada'></div>");
        }

        if($('div').hasClass('mapa-territorio-inner')){
            var map_items = $.parseJSON(datamap);
            $.each(map_items, function (i, item) {
                $('.mapa-territorio-inner #'+i).addClass('map-path');
                $('.mapa-territorio-inner #'+i).addClass(item.fase);
                $('.mapa-territorio-inner #'+i).attr('title',item.title);
                $('.mapa-territorio-inner #'+i).attr('data-url',item.url);
                if(item.color!='null'){
                    $('.mapa-territorio-inner #'+i).attr('fill',item.color);
                }
                $('.mapa-territorio-inner #image'+i).addClass(item.pin+'-mostrar-pin');
            });
        }

        $('.map-path').tooltipster({
            theme: 'tooltipster-punk',
            'maxWidth': 270,
            contentAsHTML: true,
            trigger: 'custom',
            triggerOpen: {
                click: true,
                tap: true,
                mouseenter: true
            },
            triggerClose: {
                click: true,
                scroll: false,
                tap: true,
                mouseleave: true
            }
        });

        $('.mapa-territorio-inner .map-path').click(function () {
            if($(this).attr('data-url')!=''){
                window.location = $(this).attr('data-url');
            }
        });

        $('.share-document').click(function (e) {
            e.preventDefault();
            $('.item-herramienta-opciones-open').removeClass('open');
            $(this).parent().next().addClass('open');
        });

        $(document).on("click", function (event) {
            if ($(event.target).closest(".item-herramienta-opciones-open").length === 0 && $(event.target).closest(".share-document").length === 0) {
                $('.item-herramienta-opciones-open').removeClass('open');
            }
        });

        $('.item-herramienta-opciones-open-inner .close').click(function (e) {
            e.preventDefault();
            $(this).parent().parent().removeClass('open');
        });

        $('.button-municipio').click(function () {
            if($(this).hasClass('active')){

            }else{
                $('.mapa-territorio-municipios').addClass('active');
                $(this).addClass('active');
                $('.button-provincia').removeClass('active');
            }
        });

        $('.button-provincia').click(function () {
            if($(this).hasClass('active')){

            }else{
                $('.mapa-territorio-municipios').removeClass('active');
                $(this).addClass('active');
                $('.button-municipio').removeClass('active');
            }
        });

        var svgPanZoomprov = $("svg#provincias").svgPanZoom();
        $('.mapa-territorio-provincias .map-zoom-icon.icon-plus').click(function () {
            svgPanZoomprov.zoomIn();
        });
        $('.mapa-territorio-provincias .map-zoom-icon.icon-minus').click(function () {
            svgPanZoomprov.zoomOut();
        });
        $('.mapa-territorio-provincias .map-zoom-icon.icon-left').click(function () {
            svgPanZoomprov.panLeft();
        });
        $('.mapa-territorio-provincias .map-zoom-icon.icon-right').click(function () {
            svgPanZoomprov.panRight();
        });
        $('.mapa-territorio-provincias .map-zoom-icon.icon-up').click(function () {
            svgPanZoomprov.panUp();
        });
        $('.mapa-territorio-provincias .map-zoom-icon.icon-bottom').click(function () {
            svgPanZoomprov.panDown();
        });

        var svgPanZoommuni = $("svg#municipios").svgPanZoom();
        $('.mapa-territorio-municipios .map-zoom-icon.icon-plus').click(function () {
            svgPanZoommuni.zoomIn();
        });
        $('.mapa-territorio-municipios .map-zoom-icon.icon-minus').click(function () {
            svgPanZoommuni.zoomOut();
        });
        $('.mapa-territorio-provincias .map-zoom-icon.icon-left').click(function () {
            svgPanZoommuni.panLeft();
        });
        $('.mapa-territorio-provincias .map-zoom-icon.icon-right').click(function () {
            svgPanZoommuni.panRight();
        });
        $('.mapa-territorio-provincias .map-zoom-icon.icon-up').click(function () {
            svgPanZoommuni.panUp();
        });
        $('.mapa-territorio-provincias .map-zoom-icon.icon-bottom').click(function () {
            svgPanZoommuni.panDown();
        });

        $('li.sub-governanza').each(function () {
            var href = $(this).find('a').attr('href');
            var new_href = homeurl + 'gobernanza' +$(this).find('a').attr('href');
            $(this).find('a').attr('href',new_href);
        });

        $('li.sub-home').each(function () {
            var href = $(this).find('a').attr('href');
            var new_href = homeurl + '' +$(this).find('a').attr('href');
            $(this).find('a').attr('href',new_href);
        });

        $('li.sub-formacion').each(function () {
            var href = $(this).find('a').attr('href');
            var new_href = homeurl + 'formacion' +$(this).find('a').attr('href');
            $(this).find('a').attr('href',new_href);
        });

        $('.menu-icon-open').click(function (e) {
            $('.row-main-menu').addClass('active');
            $('.row-main-menu').fadeIn();
        });

        $('.menu-icono-close').click(function (e) {
            $('.row-main-menu').removeClass('active');
            $('.row-main-menu').fadeOut();
        });

        $('#footer-contact-form button').click(function (e) {
            e.preventDefault();
            $('.error-meessages').slideUp();
            $('.success-meessages').slideUp();
            $("#footer-contact-form button").text('Espere...');
            $("#footer-contact-form button").attr('disabled','');
            var form = $("#footer-contact-form").serialize();
            var data = {
                action: "contact_form",
                data: form,
                security: security
            };
            $.post(ajaxurl, data, function(response) {
                var obj = $.parseJSON(response);
                $('.form-group-inner-input-btn input').removeAttr('disabled');
                if (obj.answer=='false') {
                    $('.error-meessages').html(obj.message);
                    $('.error-meessages').slideDown();
                    $('.form-group-inner-input-load').fadeOut();
                } else {
                    $('.success-meessages').html(obj.message);
                    $('.success-meessages').slideDown();
                    $('.form-group-inner-input-load').fadeOut();
                }
                $("#footer-contact-form button").text('Enviar');
                $("#footer-contact-form button").removeAttr('disabled');
            });
        });
        $("#footer-contact-form").submit(function(e){
            e.preventDefault();
        });

        if(window.location.hash) {
            if(window.location.hash=='#apoyo-cooperacion-internacional'){
                $('#apoyo-instituciones-asociadas').removeClass('in active show');
                $('#apoyo-cooperacion-internacional').addClass('in active show');
                $('.tab-instituciones-asociadas').removeClass('active');
                $('.tab-instituciones-asociadas a').removeClass('active');
                $('.tab-apoyo-cooperacion-internacional').addClass('active');
                $('.tab-apoyo-cooperacion-internacional a').addClass('active');
            }
        } else {

        }

        $('.categoria_herramienta_select').select2({
            multiple: true,
            placeholder: "Seleccione una categoría",
            minimumResultsForSearch: -1,
        });

        $(".categoria_select_elements_item").click(function() {
            if($(this).hasClass('active')){
                $(this).removeClass('active');
            }else{
                $(this).addClass('active');
            }
            var selectedValues = new Array();
            $.each($(".categoria_select_elements_item.active"), function(i, element){
                selectedValues[i] = $(this).attr('target_id');
            });
            $('.categoria_herramienta_select').val(selectedValues).change();
            search_herrmientas();
        });


        $("form.search-herramientas-form").submit(function (e) {
            e.preventDefault();
            search_herrmientas();
        });

        $("form.search-herramientas-form select").change(function (e) {
            e.preventDefault();
            search_herrmientas();
        });

        $(".load__more").click(function (e) {
            e.preventDefault();
            add_herrmientas();
        });


    });

    function search_herrmientas(){
        $('.pagination__button').addClass('loading');
        $('.pagination__button').removeClass('load__more');
        $(".pagination__button span").html('Cargando...');
        $("[name='pager']").val(1);
        $(".search-results .row").html('');
        var form = $(".search-herramientas-form").serialize();
        var data = {
            action: "load_herramientas",
            data: form,
            security: security_search_herramientas
        };
        $.post(ajaxurl, data, function(response) {
            var obj = $.parseJSON(response);
            if (obj.count != 0) {
                if ($(".search-results .row").html(obj.html)) {
                    if (obj.more!=0) {
                        $(".pagination__button").addClass('load__more');
                        $(".pagination__button").removeClass('loading');
                        $(".pagination__button span").html('Mostrar más herramientas');
                    }else{
                        $(".pagination__button").addClass('all-loaded');
                        $(".pagination__button span").html('Todas las herramientas mostradas');
                        $(".pagination__button").removeClass('loading');
                    }
                }
            }else{
                $(".pagination__button").addClass('all-loaded');
                $(".pagination__button span").html('No se encontraron herramientas.');
                $(".pagination__button").removeClass('loading');
            }
        });
    }

    function add_herrmientas(){
        $('.pagination__button').addClass('loading');
        $('.pagination__button').removeClass('load__more');
        $(".pagination__button span").html('Cargando...');
        var paged = parseInt($("[name='pager']").val()) +1;
        $("[name='pager']").val(paged);
        var form = $(".search-herramientas-form").serialize();
        var data = {
            action: "load_herramientas",
            data: form,
            security: security_search_herramientas
        };
        $.post(ajaxurl, data, function(response) {
            var obj = $.parseJSON(response);
            if (obj.count != 0) {
                if ($(".search-results .row").append(obj.html)) {
                    if (obj.more!=0) {
                        $(".pagination__button").addClass('load__more');
                        $(".pagination__button").removeClass('loading');
                        $(".pagination__button span").html('Mostrar más herramientas');
                    }else{
                        $(".pagination__button").addClass('all-loaded');
                        $(".pagination__button span").html('Todas las herramientas mostradas');
                        $(".pagination__button").removeClass('loading');
                    }
                }
            }else{
                $(".pagination__button").addClass('all-loaded');
                $(".pagination__button span").html('Todas las herramientas mostradas');
                $(".pagination__button").removeClass('loading');
            }
        });
    }

    $(window).resize(function () {
        var alto = {val: 0};
        alto.val = parseInt(($("header.site-header").height()));
        $("header.site-header").css('min-height',alto.val+'px');
    });

    // HEADER fixed
    $(window).on("scroll", function () {
            if ($(window).scrollTop() > 0) {
                $('header .header-inner').addClass('header-fixed');
            } else {
                $('header  .header-inner').removeClass('header-fixed');
            }
    });



})(jQuery);

