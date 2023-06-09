/**
 * Custom Scripts
 */

jQuery(function($){
    $('.recent-blog-content-wrapper .hentry-inner, .menu-content-wrapper .hentry-inner, .archive-content-wrap .hentry-inner, .reserve-content-wrapper .section-content-wrap.layout-two .hentry').matchHeight();

    // On load and on infinite scroll load.
    $( document.body ).on( 'post-load', function () {
        $('.recent-blog-content-wrapper .hentry-inner,.menu-content-wrapper .hentry-inner, .archive-content-wrap .hentry-inner').matchHeight();
    });

    /* Menu */
    var body, masthead, menuToggle, siteNavigation, socialNavigation, siteHeaderMenu, resizeTimer;

    function initMainNavigation( container ) {

        // Add dropdown toggle that displays child menu items.
        var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false })
            .append( catchFoodmaniaScreenReaderText.icon )
            .append( $( '<span />', { 'class': 'screen-reader-text', text: catchFoodmaniaScreenReaderText.expand }) );

        container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );

        // Toggle buttons and submenu items with active children menu items.
        container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
        container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

        // Add menu items with submenus to aria-haspopup="true".
        container.find( '.menu-item-has-children, .page_item_has_children' ).attr( 'aria-haspopup', 'true' );

        container.find( '.dropdown-toggle' ).on( 'click', function( e ) {
            var _this            = $( this ),
                screenReaderSpan = _this.find( '.screen-reader-text' );

            e.preventDefault();
            _this.toggleClass( 'toggled-on' );

            // jscs:disable
            _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
            // jscs:enable
            screenReaderSpan.text( screenReaderSpan.text() === catchFoodmaniaScreenReaderText.expand ? catchFoodmaniaScreenReaderText.collapse : catchFoodmaniaScreenReaderText.expand );
        } );
    }

    initMainNavigation( $( '.main-navigation' ) );

    masthead         = $( '#masthead' );
    menuToggle       = masthead.find( '.menu-toggle' );
    siteHeaderMenu   = masthead.find( '#site-header-menu' );
    siteNavigation   = masthead.find( '#site-navigation' );
    socialNavigation = masthead.find( '#social-navigation' );


    // Enable menuToggle.
    ( function() {

        // Adds our overlay div.
        $( '.below-site-header' ).prepend( '<div class="overlay">' );

        // Assume the initial scroll position is 0.
        var scroll = 0;

        // Return early if menuToggle is missing.
        if ( ! menuToggle.length ) {
            return;
        }

        menuToggle.on( 'click.nusicBand', function() {
            // jscs:disable
            $( this ).add( siteNavigation ).attr( 'aria-expanded', $( this ).add( siteNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
            // jscs:enable
        } );


        // Add an initial values for the attribute.
        menuToggle.add( siteNavigation ).attr( 'aria-expanded', 'false' );
        menuToggle.add( socialNavigation ).attr( 'aria-expanded', 'false' );

        // Wait for a click on one of our menu toggles.
        menuToggle.on( 'click.nusicBand', function() {

            // Assign this (the button that was clicked) to a variable.
            var button = this;

            // Gets the actual menu (parent of the button that was clicked).
            var menu = $( this ).parents( '.menu-wrapper' );

            // Remove selected classes from other menus.
            $( '.menu-toggle' ).not( button ).removeClass( 'selected' );
            $( '.menu-wrapper' ).not( menu ).removeClass( 'is-open' );

            // Toggle the selected classes for this menu.
            $( button ).toggleClass( 'selected' );
            $( menu ).toggleClass( 'is-open' );

            // Is the menu in an open state?
            var is_open = $( menu ).hasClass( 'is-open' );

            // If the menu is open and there wasn't a menu already open when clicking.
            if ( is_open && ! jQuery( 'body' ).hasClass( 'menu-open' ) ) {

                // Get the scroll position if we don't have one.
                if ( 0 === scroll ) {
                    scroll = $( 'body' ).scrollTop();
                }

                // Add a custom body class.
                $( 'body' ).addClass( 'menu-open' );

            // If we're closing the menu.
            } else if ( ! is_open ) {

                $( 'body' ).removeClass( 'menu-open' );
                $( 'body' ).scrollTop( scroll );
                scroll = 0;
            }
        } );

        // Close menus when somewhere else in the document is clicked.
        $( document ).on( 'click touchstart', function() {
            $( 'body' ).removeClass( 'menu-open' );
            $( '.menu-toggle' ).removeClass( 'selected' );
            $( '.menu-wrapper' ).removeClass( 'is-open' );
        } );

        // Stop propagation if clicking inside of our main menu.
        $( '.site-header-menu,.menu-toggle, .dropdown-toggle, .search-field, #site-navigation, #social-search-wrapper, #social-navigation .search-submit' ).on( 'click touchstart', function( e ) {
            e.stopPropagation();
        } );
    } )();

    // Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
    ( function() {
        if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
            return;
        }

        // Toggle `focus` class to allow submenu access on tablets.
        function toggleFocusClassTouchScreen() {
            if ( window.innerWidth >= 910 ) {
                $( document.body ).on( 'touchstart.nusicBand', function( e ) {
                    if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
                        $( '.main-navigation li' ).removeClass( 'focus' );
                    }
                } );
                siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart.nusicBand', function( e ) {
                    var el = $( this ).parent( 'li' );

                    if ( ! el.hasClass( 'focus' ) ) {
                        e.preventDefault();
                        el.toggleClass( 'focus' );
                        el.siblings( '.focus' ).removeClass( 'focus' );
                    }
                } );
            } else {
                siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.nusicBand' );
            }
        }

        if ( 'ontouchstart' in window ) {
            $( window ).on( 'resize.nusicBand', toggleFocusClassTouchScreen );
            toggleFocusClassTouchScreen();
        }

        siteNavigation.find( 'a' ).on( 'focus.nusicBand blur.nusicBand', function() {
            $( this ).parents( '.menu-item' ).toggleClass( 'focus' );
        } );

        $('.main-navigation button.dropdown-toggle').on( 'click',function() {
            $(this).toggleClass('active');
            $(this).parent().find('.children, .sub-menu').first().toggleClass('toggled-on');
        });
    } )();

    // Add the default ARIA attributes for the menu toggle and the navigations.
    function onResizeARIA() {
        if ( window.innerWidth < 910 ) {
            if ( menuToggle.hasClass( 'toggled-on' ) ) {
                menuToggle.attr( 'aria-expanded', 'true' );
            } else {
                menuToggle.attr( 'aria-expanded', 'false' );
            }

            if ( siteHeaderMenu.hasClass( 'toggled-on' ) ) {
                siteNavigation.attr( 'aria-expanded', 'true' );
                socialNavigation.attr( 'aria-expanded', 'true' );
            } else {
                siteNavigation.attr( 'aria-expanded', 'false' );
                socialNavigation.attr( 'aria-expanded', 'false' );
            }

            menuToggle.attr( 'aria-controls', 'site-navigation social-navigation' );
        } else {
            menuToggle.removeAttr( 'aria-expanded' );
            siteNavigation.removeAttr( 'aria-expanded' );
            socialNavigation.removeAttr( 'aria-expanded' );
            menuToggle.removeAttr( 'aria-controls' );
        }
    }

    $(document).ready(function() {
        /*Search and Social Container*/
        $('.toggle-top').on('click', function(e){
            $(this).toggleClass('toggled-on');
        });

        $('#search-toggle').on('click', function(){
            $('#header-menu-social, #share-toggle').removeClass('toggled-on');
            $('#header-search-container').toggleClass('toggled-on');
        });

        $('#share-toggle').on('click', function(e){
            e.stopPropagation();
            $('#header-search-container, #search-toggle').removeClass('toggled-on');
            $('#header-menu-social').toggleClass('toggled-on');
        });
    });


    /*Scroll Top*/
    var offset = 250;
    var duration = 300;

    $( window ).on( 'scroll', function() {
        if ($(this).scrollTop() >= offset) {
            $("#scrollup").fadeIn(duration);
        } else {
            $("#scrollup").fadeOut(duration);
        }
    });

    $('body').on('click','.scrollup', function(e){
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    })

    /*If body has class header-media-disabled */
    if ( $('body').hasClass('header-media-disabled') ) {
        var  mn = $("#masthead");
        mns = "main-nav-scrolled";
        hdr = $('#masthead').offset().top;

        $(window).on( 'scroll',function() {
          if( $(this).scrollTop() >= hdr ) {
            mn.addClass(mns);
          } else {
            mn.removeClass(mns);
          }
        });
    }

    // Add header video class after the video is loaded.
    $( document ).on( 'wp-custom-header-video-loaded', function() {
        $('body').addClass( 'has-header-video' );
    });


    /*Our Menu Script for mobile */
    $('.menu-content-wrapper .ui-nav-collapse a').on('click', function(e){
        e.preventDefault();

        if( ! $(this).parent().hasClass('ui-state-active') ) {
            $('.ui-tabs-panel').removeClass('active-tab').fadeOut(0);
            $('.ui-nav-collapse').removeClass('ui-state-active');
            $(this).parent().addClass('ui-state-active');

            var  getID = $(this).attr('href');

            $( getID ).addClass('active-tab');

            var anchoID = $(this).offset().top;

            $("html, body").animate({ scrollTop: anchoID - 15}, "slow");
        }
    });


    /*Our Menu Script for pc */
    $('.menu-content-wrapper .tabs-nav ul.ui-tabs-nav li a').on('click', function(e){
        e.preventDefault();

        if( !$(this).parent().hasClass('ui-state-active') ){
            $('.ui-tabs-tab').removeClass('ui-state-active');
            $('.ui-tabs-panel').removeClass('active-tab').fadeOut(0);

            $(this).parent().addClass('ui-state-active');


            var anchorAttr = $(this).attr('href');

            $(anchorAttr).addClass('active-tab').fadeOut(0).fadeIn(500);
        }
    });

    /*Fixed navigation*/
    var stickyNav = function(){
        var scrollTop = $(window).scrollTop();

        if (scrollTop > 1) {
            $('body').addClass('sticky-nav');
        } else {
            $('body').removeClass('sticky-nav');
        }
    };

    $( window ).on( 'load resize scroll', function() {
        stickyNav();
        // Add padding to top if all header media elements and slider is disabled.
        if ( $( 'body' ).hasClass( 'content-has-padding-top' ) ) {
            if( $( '.header-top-content' ).length < 0 ) {
                $( '.below-site-header' ).css( 'padding-top', $( '#masthead' ).outerHeight() );
            } else{
                if(window.scrollY==0){
                    setTimeout(function(){
                        $( '.below-site-header' ).css( 'padding-top', $( '#masthead' ).outerHeight() );
                    }, 300);
                }
            }

        }

        // Set height for contact section
        if ( $(window).width() > 667 ) {
            var boxHeight = $('.contact-section .entry-container').height();
            $('.contact-section .post-thumbnail').css('margin-top', - boxHeight/2);
        } else {
            $('.contact-section .post-thumbnail').removeAttr('style');
        }
    });
});

