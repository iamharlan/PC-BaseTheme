// General Functions

    (function($) {  // beginning wordpress function

    // Header Logo Shrink
        $(function() {
            //caches a jQuery object containing the header element
            var logo = $("header .logo");
            var nav = $("nav ul li");
            var height = logo.height();
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();

                if (scroll >= 50) {
                    logo.css('height', height*0.75).css('margin', '12px auto 4px');
                    nav.css('padding', '8px 8px 12px');
                } else {
                    logo.css('height', height*1).css('margin', '18px auto 8px');
                    nav.css('padding', '20px 8px');
                }
            });
        });


    // Mobile Menu
        $('#menutoggle, .navmask').click(function() {
          $('nav#mainnav').slideToggle();
          $('.navmask').fadeToggle();
          $('#menutoggle i').toggleClass('fa-times-circle fa-bars');
          $('#menutoggle i').toggleClass('far fas');
        });

        $(document).ready(function() {
          $( "header li:has(ul.sub-menu) > a" ).after( "<span class='togglesubmenu hidden-desktop'><i class='fas fa-angle-down'></i></span>" );
          $('.togglesubmenu').click(function() {
            $(this).closest('li').children('ul').slideToggle();
          });
        });        


    // iFrame Responsive Adjustments
        function adjustIframes() {
            $('iframe').each(function(){
                var
                $this = $(this),
                proportion = $this.data( 'proportion' ),
                w = $this.attr('width'),
                actual_w = $this.width();
                if ( ! proportion ) {
                    proportion = $this.attr('height') / w;
                    $this.data( 'proportion', proportion );
                }
                if ( actual_w != w ) {
                    $this.css( 'height', Math.round( actual_w * proportion ) + 'px' );
                }
            });
        }
        $(window).on('resize load',adjustIframes);


    // Internal Anchor Smooth Scrolling
        $(function() {
          $('a[href^="#"]').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top -20
                }, 1000);
                return false;
              }
            }
          });
        });


    // Change Footer Links for SEO MAGIC DUST
        $(document).ready(function(){
            $('footer a').not('.social-icon').each(function(){ 
                var oldUrl = $(this).attr("href");
                var newUrl = 'javascript:void(0)';
                // var onclick = 'window.location.href=' + \oldUrl\;
                $(this).attr("href", newUrl); // Set href value
                $(this).attr("onclick", "window.location.href='" + oldUrl + "'"); // Set href value
            });
        });


    })( jQuery );  // End of wordpress function
