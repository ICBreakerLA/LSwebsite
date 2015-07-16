/**
 * Created by Lionel on 16/07/2015.
 */

$(function () {
    $.getJSON("http://teamtreehouse.com/lionelsellam.json", function(data) {
        console.log(data.points);
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
                    default:
                        subtab.color = 'red';
                        break;
                }

                tab.push(subtab);
            }
        });
        console.log(tab);
        $('#container').highcharts({
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
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
            }]
        });
    });
});