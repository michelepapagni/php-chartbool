<?php

    include 'database.php';
    include 'functions.php';

    $months = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

    $processedDatabaseForPie = [
        'labels' => [],
        'data' => [],
        'colors' => []
    ];

    foreach ($database['fatturato_by_agent']['data'] as $agente => $fatturatoAgente)
    {
        $processedDatabaseForPie['labels'][] = $agente;
        $processedDatabaseForPie['data'][] = $fatturatoAgente;
        $processedDatabaseForPie['colors'][] = generateColor();
    }

    $results = [
        'simple-line' => [
            'labels' => $months,
            'data' => $database['fatturato']['data'],
            'label' => 'Milestone 3 - Simple Line',
            'access' => $database['fatturato']['access']
        ],
        'pie' => [
            'labels' => $processedDatabaseForPie['labels'],
            'data' => $processedDatabaseForPie['data'],
            'colors' => $processedDatabaseForPie['colors'],
            'access' => $database['fatturato_by_agent']['access']
        ],
        'multi-line' => [
            'labels' => $months,
            'datasets' => [],
            'access' => $database['team_efficiency']['access']
        ],
    ];

    foreach ($database['team_efficiency']['data'] as $nomeTeam => $venditeTeam)
    {
        $results['multi-line']['datasets'][] = [
            'label' => $nomeTeam,
            'data' => $venditeTeam,
            'borderColor' => generateColor()
        ];
    }

    $json = json_encode($results);

    echo $json;

?>
