(function($){

    var app = {
        onReady: function(){
        },	
        onLoad: function(){
            $(document).foundation();
            app.utils();
            
            AOS.init({
                easing: 'ease-out-back',
				duration: 1000,
                disable: 'phone',
            });
        },


		utils: function(){
            
            $('.review_slider').slick();

            
            $('.feat_slider').slick({
                variableWidth: true
            });

            $('.location_states').slick({
                infinite: false,
                slidesToShow: 7,
                slidesToScroll: 7,
                responsive: [
                    {
                      breakpoint: 1367,
                      settings: {
                        slidesToShow: 6,
                        slidesToScroll: 6
                      }
                    },
                    {
                      breakpoint: 1200,
                      settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5
                      }
                    },
                    {
                      breakpoint: 769,
                      settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                      }
                    },
                    {
                      breakpoint: 481,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    }
                  ]
            });

            
            $('.popup_btn > a, a.popup_btn').click(function(){
              if($(this).attr('href') == '#'+$('.popup_wrap').attr('id')) {
                $('.popup_wrap').addClass('show');
                $('body').addClass('popup-active');
              }
              return false;
            });
            $('.popup_box').append('<span class="pop_close" />');
            $('.pop_close').click(function(){
              $('.popup_wrap').removeClass('show');
              $('body').removeClass('popup-active');
            });

        }
        
        
    }


    document.addEventListener('DOMContentLoaded', app.onReady);
    window.addEventListener('load', app.onLoad);

})(jQuery);
