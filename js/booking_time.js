$(document).ready(function(){
    $('.bouncein').addClass('animated bounceIn');
    $('.btn-color').addClass('animated slideInRight');
    $('.fade_in').addClass('animated fadeInDownBig')
});


var timeSets = [];

$(function () {
    var isMouseDown = false;
    $("#timeTable td")
            .mousedown(function () {
                isMouseDown = true;
                $(this).toggleClass("highlighted");                  
                return false; 
            })
            .mouseover(function () {
                if (isMouseDown) {
                    $(this).toggleClass("highlighted");                        
                }
            });
    $(document).mouseup(function () {
                isMouseDown = false;
            });
    $('#btn-save-TS').on('click', function () {
        saveTimeSave();
        return false;
    });        
});

var saveTimeSave = function () {
    alert(1);
    
    for (i = 1; i < 7; i++) {
        for (j = 0; j < 7; j++) {
			
            if ($("#" + i + "" + j).css("backgroundColor") == "rgb(249, 177, 59)") {
                if (timeSets.indexOf(i + "" + j) == -1) {
                    timeSets.push(i + "" + j);
					
                }
				console.log(i + "+" + j );
            }else{
                realIndex = timeSets.indexOf(i + "" + j);
                if (realIndex != -1) {
                    timeSets.splice(realIndex, 1);
                }
				//console.log(i + "*" + j );
            }
        }
    }
    //console.log(timeSets);    
};