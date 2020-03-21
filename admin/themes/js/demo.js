$(function() {
    "use strict";
    skinChanger();
    CustomScrollbar();
    CustomJs();
});

//Skin changer
function skinChanger() {
    $('.right-sidebar .choose-skin li').on('click', function() {
        var $body = $('body');
        var $this = $(this);

        var existTheme = $('.right-sidebar .choose-skin li.active').data('theme');
        $('.right-sidebar .choose-skin li').removeClass('active');
        $body.removeClass('theme-' + existTheme);
        $this.addClass('active');

        $body.addClass('theme-' + $this.data('theme'));
    });
}

// All Custom Scrollbar JS
function CustomScrollbar() {
    $('.sidebar .menu .list').slimscroll({
        height: 'calc(100vh - 65px)',
        color: '#eeeeee',
        position: 'right',
        size: '1px',
        alwaysVisible: false,
        borderRadius: '3px',
        railBorderRadius: '0'
    });

    $('.navbar-right .dropdown-menu .body').slimscroll({
        height: '330px',
        color: 'rgba(0,0,0,0.2)',
        size: '3px',
        alwaysVisible: false,
        borderRadius: '3px',
        railBorderRadius: '0'
    });

    $('.chat-widget').slimscroll({
        height: '310px',
        color: 'rgba(0,0,0,0.4)',
        size: '2px',
        alwaysVisible: false,
        borderRadius: '3px',
        railBorderRadius: '2px'
    });

    $('.right-sidebar .slim_scroll').slimscroll({
        height: 'calc(100vh - 70px)',
        color: 'rgba(0,0,0,0.4)',
        size: '2px',
        alwaysVisible: false,
        borderRadius: '3px',
        railBorderRadius: '0'
    });   
}

function CustomJs() {
    // Theme Light and Dark  =======    
    $(".light_dark input").on('change',function() {
        var radio = $(this).val();
        if(radio == 'dark') {
            $("body").addClass('theme-dark');
        }else{
            $("body").removeClass('theme-dark');
        }
    });

    // RTL Support
    $(".rtl_support input").on('change',function() {
        var checkbox = $(this).val();
        if($(this).is(":checked")) {
            $("body").addClass('rtl');
        }else{
            $("body").removeClass('rtl');
        }
    });
    
    // Mini sidebar active
    $(".ms_bar input").on('change',function() {
        var checkbox = $(this).val();
        if($(this).is(":checked")) {
            $("body").addClass('ls-toggle-menu');
        }else{
            $("body").removeClass('ls-toggle-menu');
        }
    });

    //==========
    $(".ls-toggle-btn").on('click',function() {
        $("body").toggleClass("ls-toggle-menu");
    });

    $(".mobile_menu").on('click',function() {
        $(".sidebar").toggleClass("open");
    });    

    //======
    $(".boxs-close").on('click', function(){
        var element = $(this);
        var cards = element.parents('.card');
        cards.addClass('closed').fadeOut();
    });

    //==========
    $(".right_icon_toggle_btn").on('click',function() {
        $("body").toggleClass("right_icon_toggle");
    });

    // ===================
    $(".list_btn").on('click',function(){
        $(".chat_list").toggleClass("open");
    });
}

// Search open/close
$(function() {
    $('a[href="#search"]').on("click", function(event) {
        event.preventDefault();
        $("#search").addClass("open");
        $('#search > form > input[type="search"]').focus();
    });

    $("#search, #search #close").on("click keyup", function(event) {
        
        //if( !event ) event = window.event;
        if (
        event.target == this ||
        event.target.id == "close" ||
        event.keyCode == 27
        ) {
            $(this).removeClass("open");
        }
    });    
});

$(function() {
    if(location.hash=="#dark"){
        $('body').addClass('theme-dark');
        $("#darktheme").prop('checked', true);
        $('.menu ul.list a').each(function(){ 
            var newUrl = $(this).attr("href")+'#dark';
            $(this).attr("href", newUrl);
        });
    }
});

// Wraptheme Website live
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c6d4867f324050cfe342c69/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();