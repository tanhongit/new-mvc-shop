if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

"use strict";
$.AdminAero = {};
$.AdminAero.options = {
    colors: {
        red: '#ec3b57',
        pink: '#E91E63',
        purple: '#ba3bd0',
        deepPurple: '#673AB7',
        indigo: '#3F51B5',
        blue: '#2196f3',
        lightBlue: '#03A9F4',
        cyan: '#00bcd4',
        green: '#4CAF50',
        lightGreen: '#8BC34A',
        yellow: '#ffe821',
        orange: '#FF9800',
        deepOrange: '#f83600',
        grey: '#9E9E9E',
        blueGrey: '#607D8B',
        black: '#000000',
        blush: '#dd5e89',
        white: '#ffffff'
    },
    leftSideBar: {
        scrollColor: 'rgba(0,0,0,0.5)',
        scrollWidth: '4px',
        scrollAlwaysVisible: false,
        scrollBorderRadius: '0',
        scrollRailBorderRadius: '0'
    },
    dropdownMenu: {
        effectIn: 'fadeIn',
        effectOut: 'fadeOut'
    }
}

/* Left Sidebar - Function ======
*  You can manage the left sidebar menu options  */
$.AdminAero.leftSideBar = {
    activate: function() {
        var _this = this;
        var $body = $('body');
        var $overlay = $('.overlay');

        //Close sidebar
        $(window).on('click',function(e) {
            var $target = $(e.target);
            if (e.target.nodeName.toLowerCase() === 'i') {
                $target = $(e.target).parent();
            }

            if (!$target.hasClass('bars') && _this.isOpen() && $target.parents('#leftsidebar').length === 0) {
                if (!$target.hasClass('js-right-sidebar')) $overlay.fadeOut();
                $body.removeClass('overlay-open');
            }
        });

        $.each($('.menu-toggle.toggled'), function(i, val) {
            $(val).next().slideToggle(0);
        });

        //When page load
        $.each($('.menu .list li.active'), function(i, val) {
            var $activeAnchors = $(val).find('a:eq(0)');

            $activeAnchors.addClass('toggled');
            $activeAnchors.next().show();
        });

        //Collapse or Expand Menu
        $('.menu-toggle').on('click', function(e) {
            var $this = $(this);
            var $content = $this.next();

            if ($($this.parents('ul')[0]).hasClass('list')) {
                var $not = $(e.target).hasClass('menu-toggle') ? e.target : $(e.target).parents('.menu-toggle');

                $.each($('.menu-toggle.toggled').not($not).next(), function(i, val) {
                    if ($(val).is(':visible')) {
                        $(val).prev().toggleClass('toggled');
                        $(val).slideUp();
                    }
                });
            }

            $this.toggleClass('toggled');
            $content.slideToggle(320);
        });

        //Set menu height

        _this.checkStatuForResize(true);
        $(window).resize(function() {

            _this.checkStatuForResize(false);
        });

        //Set Waves
        Waves.attach('.menu .list a', ['waves-block']);
        Waves.init();
    },
    checkStatuForResize: function(firstTime) {
        var $body = $('body');
        var $openCloseBar = $('.navbar .navbar-header .bars');
        var width = $body.width();

        if (firstTime) {
            $body.find('.content, .sidebar').addClass('no-animate').delay(1000).queue(function() {
                $(this).removeClass('no-animate').dequeue();
            });
        }

        if (width < 1170) {
            if (width > 767) {
                $body.addClass('ls-toggle-menu');
            }
            $body.addClass('ls-closed');
            $openCloseBar.fadeIn();
        } else {
            $body.removeClass('ls-closed ls-toggle-menu');
            $openCloseBar.fadeOut();
        }
    },
    isOpen: function() {
        return $('body').hasClass('overlay-open');
    }
};
//============

/* Right Sidebar - Function ========
 *  You can manage the right sidebar menu options  */
$.AdminAero.rightSideBar = {
    activate: function() {
        var _this = this;
        var $sidebar = $('#rightsidebar');
        var $overlay = $('.overlay');

        //Close sidebar
        $(window).on('click',function(e) {
            var $target = $(e.target);
            if (e.target.nodeName.toLowerCase() === 'i') {
                $target = $(e.target).parent();
            }

            if (!$target.hasClass('js-right-sidebar') && _this.isOpen() && $target.parents('#rightsidebar').length === 0) {
                if (!$target.hasClass('bars')) $overlay.fadeOut();
                $sidebar.removeClass('open');
            }
        });

        $('.js-right-sidebar').on('click', function() {
            $sidebar.toggleClass('open');
            if (_this.isOpen()) {
                $overlay.fadeIn();
            } else {
                $overlay.fadeOut();
            }
        });
    },
    isOpen: function() {
        return $('.right-sidebar').hasClass('open');
    }
}
//=========================

/* Navbar - Function =========
 *  You can manage the navbar */
$.AdminAero.navbar = {
    activate: function() {
        var $body = $('body');
        var $overlay = $('.overlay');

        //Open left sidebar panel
        $('.bars').on('click', function() {
            $body.toggleClass('overlay-open');
            if ($body.hasClass('overlay-open')) {
                $overlay.fadeIn();
            } else {
                $overlay.fadeOut();
            }
        });

        //Close collapse bar on click event
        $('.nav [data-close="true"]').on('click', function() {
            var isVisible = $('.navbar-toggle').is(':visible');
            var $navbarCollapse = $('.navbar-collapse');

            if (isVisible) {
                $navbarCollapse.slideUp(function() {
                    $navbarCollapse.removeClass('in').removeAttr('style');
                });
            }
        });
    }
}
//=========


/* Form - Select - Function =====
 *  You can manage the 'select' of form elements */
$.AdminAero.select = {
    activate: function() {
        if ($.fn.selectpicker) {
            $('select:not(.ms)').selectpicker();
        }
    }
}

/* Browser - Function ========
 *  You can manage browser */

var edge = 'Microsoft Edge';
var ie10 = 'Internet Explorer 10';
var ie11 = 'Internet Explorer 11';
var opera = 'Opera';
var firefox = 'Mozilla Firefox';
var chrome = 'Google Chrome';
var safari = 'Safari';

$.AdminAero.browser = {
    activate: function() {
        var _this = this;
        var className = _this.getClassName();

        if (className !== '') $('html').addClass(_this.getClassName());
    },
    getBrowser: function() {
        var userAgent = navigator.userAgent.toLowerCase();

        if (/edge/i.test(userAgent)) {
            return edge;
        } else if (/rv:11/i.test(userAgent)) {
            return ie11;
        } else if (/msie 10/i.test(userAgent)) {
            return ie10;
        } else if (/opr/i.test(userAgent)) {
            return opera;
        } else if (/chrome/i.test(userAgent)) {
            return chrome;
        } else if (/firefox/i.test(userAgent)) {
            return firefox;
        } else if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/)) {
            return safari;
        }

        return undefined;
    },
    getClassName: function() {
        var browser = this.getBrowser();

        if (browser === edge) {
            return 'edge';
        } else if (browser === ie11) {
            return 'ie11';
        } else if (browser === ie10) {
            return 'ie10';
        } else if (browser === opera) {
            return 'opera';
        } else if (browser === chrome) {
            return 'chrome';
        } else if (browser === firefox) {
            return 'firefox';
        } else if (browser === safari) {
            return 'safari';
        } else {
            return '';
        }
    }
}
//==========

$(function() {
    $.AdminAero.browser.activate();
    $.AdminAero.leftSideBar.activate();
    $.AdminAero.rightSideBar.activate();
    $.AdminAero.navbar.activate();
    $.AdminAero.select.activate();

    setTimeout(function() {
        $('.page-loader-wrapper').fadeOut();
    }, 50);
});

window.Aero= {
	colors: {
	    'blue': '#46b6fe',
	    'blue-darkest': '#2695dc',
	    'blue-darker': '#3da8ec',
	    'blue-dark': '#3866a6',
	    'blue-light': '#5ebcf9',
	    'blue-lighter': '#6fc6ff',
        'blue-lightest': '#9bd8ff',
        
	    'azure': '#45aaf2',
	    'azure-darkest': '#0e2230',
	    'azure-darker': '#1c4461',
	    'azure-dark': '#3788c2',
	    'azure-light': '#7dc4f6',
	    'azure-lighter': '#c7e6fb',
        'azure-lightest': '#ecf7fe',
        
	    'indigo': '#9988ff',
	    'indigo-darkest': '#141729',
	    'indigo-darker': '#282e52',
	    'indigo-dark': '#515da4',
	    'indigo-light': '#939edc',
	    'indigo-lighter': '#d1d5f0',
        'indigo-lightest': '#f0f1fa',
        
	    'purple': '#b588ff',
	    'purple-darkest': '#21132f',
	    'purple-darker': '#42265e',
	    'purple-dark': '#844bbb',
	    'purple-light': '#c08ef0',
	    'purple-lighter': '#e4cff9',
        'purple-lightest': '#f6effd',
        
	    'pink': '#ff4dab',
	    'pink-darkest': '#31161f',
	    'pink-darker': '#622c3e',
	    'pink-dark': '#c5577c',
	    'pink-light': '#f999b9',
	    'pink-lighter': '#fcd3e1',
        'pink-lightest': '#fef0f5',
        
	    'red': '#ee2558',
	    'red-darkest': '#2e0f0c',
	    'red-darker': '#5c1e18',
	    'red-dark': '#b93d30',
	    'red-light': '#ee8277',
	    'red-lighter': '#f8c9c5',
        'red-lightest': '#fdedec',
        
	    'orange': '#FF9948',
	    'orange-darkest': '#331e0e',
	    'orange-darker': '#653c1b',
	    'orange-dark': '#ca7836',
	    'orange-light': '#feb67c',
	    'orange-lighter': '#fee0c7',
        'orange-lightest': '#fff5ec',
        
	    'yellow': '#fdd932',
	    'yellow-darkest': '#302703',
	    'yellow-darker': '#604e06',
	    'yellow-dark': '#c19d0c',
	    'yellow-light': '#f5d657',
	    'yellow-lighter': '#fbedb7',
        'yellow-lightest': '#fef9e7',
        
	    'lime': '#82c885',
	    'lime-darkest': '#192a0b',
	    'lime-darker': '#315415',
	    'lime-dark': '#62a82a',
	    'lime-light': '#a3e072',
	    'lime-lighter': '#d7f2c2',
        'lime-lightest': '#f2fbeb',
        
	    'green': '#04BE5B',
	    'green-darkest': '#132500',
	    'green-darker': '#264a00',
	    'green-dark': '#4b9500',
	    'green-light': '#8ecf4d',
	    'green-lighter': '#cfeab3',
        'green-lightest': '#eff8e6',
        
	    'teal': '#2bcbba',
	    'teal-darkest': '#092925',
	    'teal-darker': '#11514a',
	    'teal-dark': '#22a295',
	    'teal-light': '#6bdbcf',
	    'teal-lighter': '#bfefea',
        'teal-lightest': '#eafaf8',
        
	    'cyan': '#5CC5CD',
	    'cyan-darkest': '#052025',
	    'cyan-darker': '#09414a',
	    'cyan-dark': '#128293',
	    'cyan-light': '#5dbecd',
	    'cyan-lighter': '#b9e3ea',
        'cyan-lightest': '#e8f6f8',
        
	    'gray': '#868e96',
	    'gray-darkest': '#1b1c1e',
	    'gray-darker': '#36393c',
	    'gray-dark': '#6b7278',
	    'gray-light': '#aab0b6',
	    'gray-lighter': '#dbdde0',
	    'gray-lightest': '#f3f4f5',
	    'gray-dark': '#343a40',
	    'gray-dark-darkest': '#0a0c0d',
	    'gray-dark-darker': '#15171a',
	    'gray-dark-dark': '#2a2e33',
	    'gray-dark-light': '#717579',
	    'gray-dark-lighter': '#c2c4c6',
        'gray-dark-lightest': '#ebebec',
        
        'gray-100': '#f8f9fa',
        'gray-200': '#E8E9E9',
        'gray-300': '#D1D3D4',
        'gray-400': '#BABDBF',
        'gray-500': '#808488',
        'gray-600': '#666A6D',
        'gray-700': '#4D5052',
        'gray-800': '#333537',
        'gray-900': '#1C1D1E',
        'black': '#000000',
	}
};