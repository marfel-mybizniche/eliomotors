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
                slidesToScroll: 1
            });

        }
        
        
    }


    document.addEventListener('DOMContentLoaded', app.onReady);
    window.addEventListener('load', app.onLoad);

})(jQuery);
