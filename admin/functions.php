<?php

function sanatizeInput($var, $type)
{
    $flags = NULL;
    switch($type)
    {
        case 'url':
            $filter = FILTER_SANITIZE_URL;
            break;
        case 'int':
            $filter = FILTER_SANITIZE_NUMBER_INT;
            break;
        case 'float':
            $filter = FILTER_SANITIZE_NUMBER_FLOAT;
            $flags = FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND;
            break;
        case 'email':
            $var = substr($var, 0, 254);
            $filter = FILTER_SANITIZE_EMAIL;
            break;
        case 'string':

        default:
            $filter = FILTER_SANITIZE_STRING;
            $flags = FILTER_FLAG_NO_ENCODE_QUOTES;
            break;

    }
    $output = filter_var($var, $filter, $flags);
    return($output);
}


function randomGen($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}


function flashMessage($message, $messageType='success') {
    $htmls = file_get_contents('alert-error-html-template.php');
    $htmls = str_replace('{{message}}', $message, $htmls);
    $htmls = str_replace('{{type}}', $messageType, $htmls);
    return $htmls;
}

function sessionCheck() {
    if(empty($_SESSION['auth'])) {
        header('location:index.php');
    }

}




?>