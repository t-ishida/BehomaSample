<?php
require __DIR__  . '/../app/bootstrap.php';
$zaolik = \Zaolik\DIContainer::getInstance();
$router = $zaolik->getFlyWeight('router');
$config = $zaolik->getFlyWeight('config');
$request = new \Hoimi\Request($_SERVER, $_REQUEST);
$response = null;
try {
    list($action, $method) = $router->run($request);
    $action->setConfig($config);
    $action->setRequest($request);
    if ($action instanceof \Sample\classes\Injectable) {
        $action->setZaolik($zaolik);
    }
    if ($action->useSessionVariables()) {
        $session = new \Hoimi\Session($request, $config->get('session', array()));
        $action->setSession($session);
        $session->start();
        $response = $action->$method();
        $session->flush();
    } else {
        $response = $action->$method();
    }
} catch (\Hoimi\BaseException $e) {
    $response = $e->buildResponse();
} catch (\Exception $e) {
    $response = new \Hoimi\Response\Error($e);
}
foreach ($response->getHeaders() as $header) {
    header($header);
}
echo $response->getContent();
