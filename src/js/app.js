var $ = require('jquery');
require('chart.js');

$(document).ready(function() {

    $.ajax({
        url: 'http://localhost/Boolean/milestone-1/server.php',
        method: 'GET',
        success: function(data)
        {
            var results = JSON.parse(data);

            printChart(results);
        },
        error: function()
        {
            alert('Si è verificato un errore');
        }
    });

});

function printChart(results)
{
    var chart = new Chart($('#milestone-1'), {
        type: 'line',
        data: {
            labels: ["Gennaio", 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
            datasets: [{
                label: "My First dataset",
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: results,
            }]
        }
    });
}
