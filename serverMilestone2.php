<?php

    include 'database.php';

    $results = [];

    $results['line']['labels'] = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
    $results['line']['data'] = $data_milestone_2['fatturato']['data'];

    $results['pie']['labels'] = [];
    $results['pie']['data'] = [];

    $pieData = $data_milestone_2['fatturato_by_agent']['data'];

    foreach ($pieData as $agente => $fatturatoAgente)
    {
        $results['pie']['labels'][] = $agente;
        $results['pie']['data'][] = $fatturatoAgente;
    }

    $json = json_encode($results);

    echo $json;

    // $json = json_encode($data_milestone_2);
    //
    // echo $json;

?>
