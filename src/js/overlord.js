/**
 * Created by Lionel on 31/07/2015.
 */

var $mouseX = 0, $mouseY = 0;
var $xp = 0, $yp =0;

$(document).mousemove(function(e){
    $mouseX = e.pageX;
});

var $loop = setInterval(function(){
// change 12 to alter damping higher is slower
    $xp += (($mouseX - $xp)/12);
    $yp += (($mouseY - $yp)/12);
    $(".overlord").css({left:$xp +'px', top:$yp +'px'});
}, 6);
