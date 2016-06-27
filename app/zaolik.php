<?php
\Zaolik\DIContainer::getInstance()->setFlyWeight('router', function(){
    return new \Hoimi\Router(array(
        '/' => '\Sample\actions\Index',
        '/index' => '\Sample\actions\Index',
        '/save' => '\Sample\actions\Save',
    ));
})->setFlyWeight('databaseSession', function(){
    return \Mahotora\DatabaseSessionFactory::build(
        \Zaolik\DIContainer::getInstance()->getFlyWeight('config')->get('database')
    );
})->setFlyWeight('messageBoardDao', function(){
    return new \Sample\classes\dao\MessageBoardDao(
        \Zaolik\DIContainer::getInstance()->getFlyWeight('databaseSession')
    );
});