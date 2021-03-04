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
                //infinite: true,
                slidesToShow: 7,
                slidesToScroll: 7,
                responsive: [
                    {
                      breakpoint: 1366,
                      settings: {
                        slidesToShow: 6,
                        slidesToScroll: 6
                      }
                    },
                    {
                      breakpoint: 1023,
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
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    }
                  ]
            });

        }
        
        
    }


    document.addEventListener('DOMContentLoaded', app.onReady);
    window.addEventListener('load', app.onLoad);

})(jQuery);
