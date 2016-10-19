<?php

// Return a FontAwesome icon
function i($code)
{
    $icon = '<i class="fa fa-' . $code . '"></i>';

    return $icon;
}

function date_nice($date)
{
    return date('M j Y g:i', $date);
}

function time_nice($seconds)
{
    $h = floor(($seconds / 60) / 60);
    $m = round(($seconds / 60) - ($h * 60));

    return $h . ' hours : ' . $m . ' minutes : ';
}

function save($data)
{
    $json = json_encode($data);
    $file = fopen('data.json', 'w');
    fwrite($file, $json);
}