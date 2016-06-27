<?php
\Zaolik\DIContainer::getInstance()->setFlyWeight('config', function(){ 
    return new \Hoimi\Config(__FILE__);
});
