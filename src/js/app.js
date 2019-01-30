var $ = require('jquery');
var chart_js = require('chart.js');

$(document).ready(function() {

    $.ajax({
        url: 'http://localhost/Boolean/milestone-1/server.php',
        method: 'GET',
        success: function(data) {
            var results = JSON.parse(data);

            console.log(results);

            if ($('#simple-line').length > 0)
            {
                printSimpleLine($('#simple-line'), results['simple-line']['labels'], results['simple-line']['data'], results['simple-line']['label']);
            }

            if ($('#pie').length > 0)
            {
                printPie($('#pie'), results['pie']['data'], results['pie']['labels'], results['pie']['colors']);
            }

            if ($('#multi-line').length > 0)
            {
                printMultiLine($('#multi-line'), results['multi-line']['labels'], results['multi-line']['datasets']);
            }
        },
        error: function() {
            alert('Si è verificato un errore');
        }
    });

});

function printSimpleLine(selettore, labels, data, title) {
    new Chart(selettore, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: title,
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: data,
            }]
        }
    });
}

function printPie(selettore, data, labels, colors) {
    new Chart(selettore, {
        type: 'pie',
        data: {
            datasets: [{
                data: data,
                backgroundColor: colors
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: labels
        },
    });
}

function printMultiLine(selettore, labels, datasets)
{
    new Chart(selettore, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        }
    });
}
