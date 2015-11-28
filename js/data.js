$(function () {
    $('#container').highcharts({
        title: {
            text: 'Sensor Logging',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: ',
            x: -20
        },
        xAxis: {
            categories: ['6/23/2015 23:28', 
'6/23/2015 23:30',
'6/23/2015 23:32',
'6/23/2015 23:34',
'6/23/2015 23:36',
'6/23/2015 23:38',
'6/23/2015 23:40',
'6/23/2015 23:42',
'6/23/2015 23:44',
'6/23/2015 23:46',
'6/23/2015 23:48',
'6/23/2015 23:54',
'6/23/2015 23:56',
'6/23/2015 23:58',
]
        },
        yAxis: {
            title: {
                text: 'Values'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'SHT21temp',
            data: [22.37
,22.29
,22.27
,22.2
,22.18
,22.13
,22.12
,22.09
,22.09
,22.06
,22.06
,22.01
,21.99,
21.97
]
        }, {
            name: 'SHT21humid',
            data: [56.24
,56.43
,56.51
,56.57
,56.64
,56.52
,56.39
,56.58
,56.62
,56.47
,56.26
,56.29
,56.3
,56.19
]
        }, {
            name: 'AM2321temp',
            data: [22.8
,22.4
,22.4
,22.3
,22.2
,22.2
,22.2
,22.2
,22.1
,22.1
,22.1
,22.1
,22.1
,22
]
        }, {
            name: 'AM2321humid',
            data: [57.5,
52.7
,56.9
,57
,57
,57.1
,57.1
,57.2
,57.2
,57.3
,57.3
,57
,56.9
,56.9
]
        }, {
            name: 'BMP180temp',
            data: [21.9
,21.8
,21.8
,21.7
,21.7
,21.7
,21.6
,21.6
,21.6
,21.6
,21.6
,21.5
,21.5
,21.5
]
        }
		
		
		]
    });
});
		