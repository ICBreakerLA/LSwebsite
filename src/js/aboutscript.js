/**
 * Created by Lionel on 16/07/2015.
 */

$(function () {
    $.getJSON("http://teamtreehouse.com/lionelsellam.json", function(data) {
        var array = $.map(data.badges, function(value, index) {
            return [value];
        });

        var dataTmp = (array.reverse());

        var badgesTreehouse = '<ul class="badges">';
        $.each(dataTmp, function(index, el){
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

        var tab = [];
        $.each(data.points, function (index, value) {
            if(index != 'total' && value != 0){
                var subtab = {};
                subtab.name = index;
                subtab.y = value;
                switch (index) {
                    case 'HTML':
                        subtab.color = '#39ADD1';
                        break;
                    case 'CSS':
                        subtab.color = '#3079AB';
                        break;
                    case 'JavaScript':
                        subtab.color = '#C25975';
                        break;
                    case 'Development Tools':
                        subtab.color = '#637a91';
                        break;
                    case 'Design':
                    subtab.color = '#E0AB18';
                    break;
                    case 'WordPress':
                        subtab.color = '#838CC7';
                        break;
                    case 'PHP':
                        subtab.color = '#7D669E';
                        break;
                    case 'Game Development':
                        subtab.color = '#20898c';
                        break;
                    case 'Digital Literacy':
                        subtab.color = '#c38cd4';
                        break;
                    }

                tab.push(subtab);
            }
        });

        var coolstuff = "";
        $.each(tab, function (index, value){
            coolstuff += '<li class="';
            coolstuff += value.name;
            coolstuff += ' mobile-grid">';
            coolstuff += '<span class="bullet" style="background-color:';
            coolstuff += value.color;
            coolstuff += '"></span>';
            coolstuff += '<span class="title">';
            coolstuff += value.y;
            coolstuff += '</span>';
            coolstuff += '<span class="desc">';
            coolstuff += value.name;
            coolstuff += '</span>';
            coolstuff += '</li>';
        });
        $("#belette-list").html(coolstuff);

        $('#highcharts').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: null,
                align: 'center',
                verticalAlign: 'middle',
                y: 40
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b><br>Overall: <b>{point.percentage}</b>'
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white',
                            textShadow: '0px 1px 2px black'
                        }
                    },
                    center: ['50%', '50%']
                }
            },
            series: [{
                type: 'pie',
                name: 'Points',
                innerSize: '50%',
                data: tab
            }],
            credits: {
                enabled: false
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            }
        });
    });
});