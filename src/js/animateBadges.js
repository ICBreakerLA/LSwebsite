/**
 * Created by Lionel on 30/06/2015.
 */
var open = 0;
$(".latestBadges").click(function(){
    if(open == 0) {
        $(".badgesTreehouse").slideDown({easing:"easeOutBack", duration: 2000});
        open = 1;
    } else {
        $(".badgesTreehouse").slideUp({easing:"easeOutBack", duration: 2000});
        open = 0;
    }
})