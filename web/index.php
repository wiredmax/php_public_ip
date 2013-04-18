<?php
// web/index.php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

$app = new Silex\Application();


//GET PUBLIC IP ADDRESS
if ( isset($_SERVER["REMOTE_ADDR"]) )    { 
    $public_ip = '' . $_SERVER["REMOTE_ADDR"] . ' '; 
} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    { 
    $public_ip = '' . $_SERVER["HTTP_X_FORWARDED_FOR"] . ' '; 
} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    { 
    $public_ip = '' . $_SERVER["HTTP_CLIENT_IP"] . ' '; 
} 

$app->get('/text', function () use ($app,$public_ip) {
    return $public_ip;
});

$app->get('/json', function () use ($app,$public_ip) {
	$public_ip = array('ip' => trim($public_ip," "));
    return $app->json($public_ip);
});

$app->get('/', function () use ($app) {
    // redirect to /test
    $subRequest = Request::create('/text', 'GET');

    return $app->handle($subRequest, HttpKernelInterface::SUB_REQUEST);
});


$app->run();
?>
