/**
 * Created by Lionel on 29/06/2015.
 */

//Problem: I need a simple way to look at a my latest badges and points and display them
//Solution: Use jQuery to connect to Treehouse's API to get profile information to print out

$(document).ready(function () {
    $.getJSON("http://teamtreehouse.com/lionelsellam.json", function (data) {

        var badgesTreehouse = '<ul class="badges">';
        $.each(data.badges, function(index, el){
            badgesTreehouse += '<li class="badgesImg">';
            badgesTreehouse += '<img src="'+ el.icon_url +'" alt="" />';
            badgesTreehouse += '<span class="badgesName">';
            badgesTreehouse += el.name;
            badgesTreehouse += '</span>';
            badgesTreehouse += '<span class="badgesDate">';
            badgesTreehouse += el.earned_date;
            badgesTreehouse += '</span>' ;
            badgesTreehouse += '</li>' ;
        });
        badgesTreehouse += '</ul>';
        $('.badgesTreehouse').html(badgesTreehouse);

        $(".badges").mCustomScrollbar({
            theme: "dark"
        });

    });



});
