<?php
\Zaolik\DIContainer::getInstance()->setFlyWeight('International', function (){
    return (new \Behoma\Core\Internationalization(__FILE__))
        ->setDefault('ja')
        ->setAccept(array('ja', 'en'))
        ->setLanguage($_SERVER['HTTP_ACCEPT_LANGUAGE']);
});
