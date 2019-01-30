<?php

function generateColor()
{
    $string = 'rgb(';

    for ($i = 0; $i < 3; $i++) {
        $string .= rand(0, 255);

        if ($i != 2)
        {
            $string .= ", ";
        }
        else {
            $string .= ")";
        }
    }

    return $string;
}

function checkAccess($userAccess, $chartAccess)
{
    $arrayValues = [
        'guest' => 1,
        'employee' => 2,
        'clevel' => 3
    ];

    $chartAccessNumber = $arrayValues[$chartAccess];
    $userAccessNumber = $arrayValues[$userAccess];

    return $userAccessNumber >= $chartAccessNumber;
}

?>
