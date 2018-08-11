

$(document).ready(function () {
    
   			 $(window).scroll(function(){
			    if ($(window).scrollTop() >= 70) {
			        $('.mishtab').addClass('fixed');
			        $('.niner').addClass('floater');
			    }
			    else {
			        $('.mishtab').removeClass('fixed');
			        $('.niner').removeClass('floater');
			    }
			});

});