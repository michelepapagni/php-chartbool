var $ = require('jquery');
require('chart.js');

var months = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

$(document).ready(function() {

    $.ajax({
        url: 'http://localhost/Boolean/milestone-1/server.php',
        method: 'GET',
        success: function(data)
        {
            var results = JSON.parse(data);

            printLineChart($('#milestone-1'), months, 'Milestone 1', results);
        },
        error: function()
        {
            alert('Si è verificato un errore');
        }
    });

    $.ajax({
        url: 'http://localhost/Boolean/milestone-1/server-2.php',
        method: 'GET',
        success: function(data)
        {
            var results = JSON.parse(data);

            printLineChart($('#milestone-2-line'), results.line.labels, 'Milestone 2 - Line', results.line.data);
            printPieChart($('#milestone-2-pie'), results.pie.labels, results.pie.data);
            //printChartMilestone2(results);
        },
        error: function()
        {
            alert('Si è verificato un errore');
        }
    });

});

function printChartMilestone2(results)
{
    var dataMilestone2Line = results['fatturato']['data'];
    printLineChart($('#milestone-2-line'), months, 'Milestone 2 - Line', dataMilestone2Line);

    var dataMilestone2Pie = results['fatturato_by_agent']['data'];
    var processedMilestone2Pie = processMilestone2Data(dataMilestone2Pie);
    printPieChart($('#milestone-2-pie'), processedMilestone2Pie.labels, processedMilestone2Pie.data);
}

function processMilestone2Data(results)
{
    var processedMilestone2Pie = {
        labels: [],
        data: []
    };

    for (var agente in results) {
        processedMilestone2Pie.labels.push(agente);
        processedMilestone2Pie.data.push(results[agente]);
    }

    return processedMilestone2Pie;
}

function printPieChart(selettore, labels, results)
{
    new Chart(selettore, {
        type: 'pie',
        data: {
            datasets: [{
                data: results
            }],
            labels: labels
        }
    });
}

function printLineChart(selettore, labels, title, results)
{
    new Chart(selettore, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: title,
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: results,
            }]
        }
    });
}
